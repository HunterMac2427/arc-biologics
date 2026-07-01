# ARC Biologics

## Stage
wordpress

## Deployment Method
Git-deployed (dedicated Cloudways server)

## Brand
- **Name:** ARC Biologics — peptide research e-commerce
- **Domain:** arcbiologics.com
- **Logo:** LogoV2.png (white bg), LogoV2-transparent.png (transparent)
- **No mention of Aspire Rejuvenation anywhere**

## Colors
- Primary: Deep Teal `#0B8F68`
- Accent: Deep Violet `#7452A0`
- Dark BG: `#0C0C10`
- Dark Surface: `#161618`
- Light BG: `#F4F2F7`
- Light Surface: `#FFFFFF`
- Text Primary (dark): `#FFFFFF`
- Text Primary (light): `#1a1a1a`
- Text Secondary: `rgba(255,255,255,0.4)` / `rgba(0,0,0,0.4)`
- Ghost borders: `rgba(255,255,255,0.06)` / `rgba(0,0,0,0.06)`

## Typography
- Headings: Outfit (200–800)
- Body: Inter (300–600)
- Google Fonts via wp_enqueue

## CSS Prefix
`ab-`

## Design System (from 3PLGuys reference)
- Floating glass nav: fixed top-12px, backdrop-blur-16px, bg rgba(255,255,255,0.06)
- Scroll reveal: `perspective(1200px) rotateX(8deg)` → `rotateX(0)`, `cubic-bezier(0.22, 1, 0.36, 1)`, 1.2s
- Stagger: ~100ms between siblings via transition-delay
- Dark/light section alternation
- Cards: ghost borders, no heavy shadows, colored shadows in brand color
- One accent color system
- Stats row with large numbers
- Gradient text shimmer for emphasis
- Colored shadow buttons: `box-shadow: 0 10px 25px rgba(11,143,104,0.25)`
- Full design reference: `docs/design-references/3plguys-breakdown.md`

## Infrastructure
- Server: 1635339 (157.245.9.12, 2GB DO NYC3)
- App: 6478705, sys user yhrctcnwrp
- GitHub: github.com/HunterMac2427/arc-biologics
- WP Admin: huntermacbiz@gmail.com / HuTU9Jwr2w

## Pages
- Home (hero, featured products, how it works, trust signals, about, blog preview, CTA)
- Shop (WooCommerce archive)
- Product pages (WooCommerce single)
- Blog archive + single posts
- About
- COAs
- Privacy Policy, Terms, Refund Policy, Shipping Policy
