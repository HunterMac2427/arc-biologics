# Account Registration Overhaul — Design Spec

## Goal
Replace the Jotform/Zapier waiver system with a native WooCommerce registration flow. Customers create accounts with personal info, address, and compliance checkboxes. Accounts are auto-approved. Product pages are locked behind login (not behind a special role). Shop archive remains public.

## Registration Form

### Location
Replaces the current `/waiver/` page (`page-waiver.php`). All existing "Complete Waiver" CTAs already point here — they get updated to "Create Account" / "Shop Now" language.

### Fields (all required unless noted)

**Personal:**
- First name (text)
- Last name (text)
- Email (email, validated)
- Phone (tel)
- Date of birth (date input, validated 18+)

**Address:**
- Street address (text)
- Apt/Unit (text, optional)
- City (text)
- State (select dropdown, US states)
- ZIP code (text, 5-digit validated)

**Compliance checkboxes (all three required):**
1. "I am 18 years of age or older" — links to `/age-policy/`
2. "I understand these products are intended for research purposes only" — links to `/research-use-policy/`
3. "I acknowledge the risks associated with peptide research compounds and accept full responsibility for their use" — links to `/risk-acknowledgment/`

**Password:** Not on the form. WooCommerce auto-generates and emails a set-password link.

### On Submit
1. Server-side validation (all required fields, email unique, DOB confirms 18+, all checkboxes checked)
2. Create WP user with `approved_buyer` role
3. Save all fields to user meta (phone, DOB) and WooCommerce billing fields (name, address, email, phone)
4. Store compliance acknowledgment timestamps in user meta
5. Auto-login the user
6. Redirect to the page they were trying to access (stored in `redirect_to` param), or `/shop/` by default

### Error handling
- Email already exists: "An account with this email already exists. Log in instead?" with login link
- DOB under 18: "You must be 18 or older to create an account."
- Missing required fields: inline validation messages

## Product Page Gating (New Behavior)

### Not logged in
- `template_redirect` hook on `is_singular('product')` checks `is_user_logged_in()`
- If not logged in: display a full-page dark overlay/modal with:
  - Lock icon
  - "Create an account to view this product"
  - "Create Account" button → `/waiver/?redirect_to={current_url}`
  - "Already have an account? Log in" link → `wp_login_url(current_url)`
- Implementation: PHP redirect to a gate page, OR inject a blocking overlay via PHP (no JS dependency). Recommend PHP redirect approach — redirect to `wp_login_url()` with `redirect_to` set to the product URL. Simple, reliable, no modal CSS needed.

### Logged in (any registered user)
- Page renders normally. The `approved_buyer` role is auto-granted at registration, so all registered users can purchase.

### Shop archive page
- Fully visible to everyone (logged in or not)
- Product cards link to product pages normally
- No "Complete Waiver" CTAs — remove the gating buttons entirely from archive

## Site-Wide CTA Changes

### front-page.php
- **How It Works Step 1:** "Complete the Waiver" → "Create an Account" / "Sign up in under a minute. Just your basic info and a few quick acknowledgments."
- **How It Works Step 2:** "Once approved, the full catalog opens..." → "Browse our full catalog of 20+ compounds. Select what you need and check out."
- **Bottom CTA:** "Complete the research waiver..." / "Start Waiver" → "Create your free account and start shopping." / "Shop Now"

### page-shop.php / archive-product.php
- Bottom CTA: "Complete the waiver..." / "Start Waiver" → "Create your free account to get started." / "Get Started"

### woocommerce/single-product.php
- Remove the waiver gate block entirely (the `ab-product-gate` div). Product pages are now gated at the template_redirect level — non-logged-in users never reach the template.

### functions.php
- `ab_replace_cart_button()`: Remove or change — no longer shows "Complete Waiver to Purchase" on archive. Instead, if not logged in, the product card links to the product page which redirects to login. If logged in, add-to-cart works normally.
- `ab_product_waiver_notice()`: Remove — no longer needed on single product pages.
- `ab_block_add_to_cart()`: Change to check `is_user_logged_in()` instead of `ab_is_approved_buyer()` — but since non-logged-in users are redirected before reaching the product page, this is a safety net only.
- Remove the `/arc/v1/approve-buyer` REST webhook entirely.
- Remove or repurpose `ab_approve_buyer_webhook()` function.
- Keep `ab_is_approved_buyer()` for backward compat but it now just checks `is_user_logged_in()` since all registered users are approved.

## Nav Menu Changes
- Remove "Waiver" from primary nav menu (via WP-CLI)
- "Quality" already added earlier today

## Address Auto-Population at Checkout
No custom code needed. WooCommerce natively reads `billing_*` user meta fields and auto-fills checkout. By saving address data to these fields during registration, checkout is pre-populated.

Fields saved during registration:
- `billing_first_name`, `billing_last_name`
- `billing_email`, `billing_phone`
- `billing_address_1`, `billing_address_2`
- `billing_city`, `billing_state`, `billing_postcode`
- `billing_country` = 'US' (hardcoded)

## Three Policy Pages
Created as simple WordPress pages via WP-CLI with basic content:

1. `/age-policy/` — "You must be 18 years or older to purchase from ARC Biologics..." (short policy text)
2. `/research-use-policy/` — "All products sold by ARC Biologics are intended for research purposes only..." (research use disclaimer)
3. `/risk-acknowledgment/` — "Peptide research compounds carry inherent risks..." (risk/liability text)

These are minimal legal-style pages, not long-form content. 2-3 paragraphs each.

## SEO Meta Updates (functions.php)
- Update `is_page('waiver')` meta to reflect "Create Account" instead of "Research Waiver"

## page-waiver-complete.php Updates
- Heading: "You're Approved." → "Account Created."
- Sub: "Your research waiver has been received..." → "Your account is ready. You're now logged in."
- Steps: Remove waiver steps, show "Browse Compounds" CTA directly
- This page may not even be needed if we redirect directly to shop after registration. Consider removing.

## Files Changed

| File | Action |
|------|--------|
| `page-waiver.php` | Full rewrite — registration form |
| `page-waiver-complete.php` | Update copy or remove |
| `front-page.php` | How It Works copy, bottom CTA copy |
| `page-shop.php` | Bottom CTA copy |
| `woocommerce/archive-product.php` | Bottom CTA copy |
| `woocommerce/single-product.php` | Remove waiver gate block |
| `functions.php` | Registration handler, auto-approve, product redirect, remove webhook, update gating, SEO meta |
| `assets/css/main.css` | Registration form styles |

## What Gets Removed
- Jotform/Zapier webhook endpoint (`/arc/v1/approve-buyer`)
- `ab_approve_buyer_webhook()` function
- All "Complete Waiver" / "Start Waiver" copy
- `ab_product_waiver_notice()` function
- `ab_replace_cart_button()` function (or simplified)
- "Waiver" nav menu item
