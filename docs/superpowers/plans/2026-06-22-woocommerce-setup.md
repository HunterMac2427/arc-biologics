# ARC Biologics WooCommerce Setup Plan

> **For agentic workers:** Use superpowers:subagent-driven-development to implement this plan task-by-task.

**Goal:** Create all 23 WooCommerce products, convert hardcoded shop/homepage to WC loops, add single-product template with theme styling.

**Architecture:** Products created via WP-CLI on the server. Theme templates converted to use WC_Query loops instead of hardcoded arrays. Product categories map to existing filter tabs. Single product page uses WooCommerce template override styled with existing `ab-` design system.

**Tech Stack:** WordPress, WooCommerce 10.8.1, WP-CLI, PHP, CSS

---

### Task 1: Create WooCommerce Product Categories via WP-CLI

**Files:** None (server-side WP-CLI commands)

Create 6 product categories matching existing filter system:

- [ ] SSH into server (157.245.9.12, master_ebgvcszbtu/DvSaZWrsXD6X)
- [ ] Create categories: Recovery & Healing, Cognitive & Neuro, Anti-Aging & Longevity, Body Composition, Blends & Stacks, Performance
- [ ] Note the term IDs for use in Task 2

### Task 2: Create All 23 WooCommerce Products via WP-CLI

**Files:** None (server-side WP-CLI commands)

For each product:
- [ ] Create simple product with name, regular price, short description (dosage info), and status=publish
- [ ] Assign to correct category
- [ ] Upload product image from theme assets and set as featured image

Full product list with category mappings:

| Product | Price | Description | Category |
|---------|-------|-------------|----------|
| GHK-cu | 200 | 100mg - 3ml | Anti-Aging & Longevity |
| BPC-157 | 250 | 15mg - 3ml | Recovery & Healing |
| BPC-157/TB4 | 320 | 10/10mg - 3ml | Recovery & Healing |
| GLOW | 390 | BPC-157/GHK-cu/TB-500 — 10/70/10mg - 5ml | Blends & Stacks |
| Duo Blend | 240 | Tesa/Ipa - 3ml | Blends & Stacks |
| BPC-157/TB5/MGF/KPV | 380 | 5/2/1/2mg - 3ml | Blends & Stacks |
| Mots-C | 340 | 50mg - 5ml | Performance |
| Dihexa | 290 | 10mg - 30 Tablets | Cognitive & Neuro |
| AOD 9604 | 220 | 5mg - 3ml | Body Composition |
| Triple G (Reta) | 680 | 15mg - 3ml | Body Composition |
| Ibutamoren (MK-677) | 310 | 25mg - 30 Tablets | Body Composition |
| Selank | 160 | 11mg - 3ml | Cognitive & Neuro |
| Semax | 120 | 11mg - 3ml | Cognitive & Neuro |
| DSIP | 260 | 5mg - 3ml | Cognitive & Neuro |
| TB-500 | 250 | 10mg - 3ml | Recovery & Healing |
| NAD+ | 200 | 1000mg - 10ml | Anti-Aging & Longevity |
| Epithalon | 220 | 50mg - 3ml | Anti-Aging & Longevity |
| SS-31 | 190 | 10mg - 3ml | Anti-Aging & Longevity |
| Thymosin Alpha 1 | 270 | 10mg - 3ml | Anti-Aging & Longevity |
| NAD+/BDNF/Alpha GPC | 440 | 100/10/100mg - 3ml | Anti-Aging & Longevity |
| SLU-PP-332 | 300 | 0.25mg - 60 Tablets | Body Composition |
| IGF-1/LR3 | 550 | 1mg - 3ml | Performance |
| Follistatin 344 | 650 | 1mg - 3ml | Performance |

### Task 3: Convert page-shop.php to WooCommerce Loop

**Files:**
- Modify: `page-shop.php`
- Modify: `functions.php` (add WC helpers)

- [ ] Replace hardcoded $products array with WC_Query fetching published products
- [ ] Keep filter tabs — generate from `product_cat` terms dynamically
- [ ] Keep existing `ab-product-card` HTML structure but populate from WC product data
- [ ] Product cards link to single product page (get_permalink)
- [ ] Add `data-cat` attribute from product category slug for JS filtering

### Task 4: Convert Homepage Featured Products to WC Loop

**Files:**
- Modify: `front-page.php` (lines 46-98, Featured Products section)

- [ ] Replace 4 hardcoded product cards with WC_Query for 4 featured/recent products
- [ ] Keep identical `ab-product-card` markup, populate from WC data
- [ ] "View All" link stays as /shop

### Task 5: Create Single Product Template

**Files:**
- Create: `woocommerce/single-product.php`

- [ ] Product detail page matching theme design system
- [ ] Hero area with product image (left) and details (right): name, price, description, add-to-cart
- [ ] Uses ab- class system, dark theme, Outfit/Inter fonts
- [ ] Product gating notice already handled by existing functions.php hook
- [ ] Related products section at bottom

### Task 6: Add WooCommerce CSS Overrides

**Files:**
- Modify: `assets/css/main.css` (append WooCommerce section)

- [ ] Single product page layout styles
- [ ] Cart and checkout basic theme styling (dark bg, ab- button styles, form inputs)
- [ ] WooCommerce notice/message styling
- [ ] Quantity input, add-to-cart button styling
- [ ] Cart table, checkout form styling (keep minimal — WC defaults with theme colors)

### Task 7: WooCommerce Configuration

**Files:** None (WP-CLI + functions.php)

- [ ] Set shop page to the existing "Shop" page (ID 14)
- [ ] Configure WooCommerce settings: currency USD, no shipping (digital/local), no tax
- [ ] Ensure cart/checkout/my-account pages are assigned
