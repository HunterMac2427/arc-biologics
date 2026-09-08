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
- FAQ (/faq/, page ID 154, page-faq.php template, FAQPage schema)
- Blog archive + single posts
- Quality & Testing (/quality/)
- COA Lookup (/coa-lookup/)
- Calculator (/calculator/)
- Privacy Policy, Terms, Refund Policy, Shipping Policy, Age Policy, Research Use Policy, Risk Acknowledgment

## Blog Citation Workflow (MANDATORY)

Every blog post MUST include PubMed or authoritative citations. This is non-negotiable for a YMYL health-adjacent site.

### Requirements for every blog post:
1. **No unsupported claims.** Every statement about a peptide's effects, mechanisms, or research findings must have a citation.
2. **PubMed preferred.** Use PubMed URLs (https://pubmed.ncbi.nlm.nih.gov/PMID/) as the primary citation source.
3. **Vancouver citation style.** Author(s) et al., Title. *Journal.* Year;Volume(Issue):Pages.
4. **Inline superscripts.** Use `<sup class="ab-cite"><a href="#ref-N">[N]</a></sup>` after each cited claim.
5. **References section at bottom.** Use the `ab-references` div with ordered list. Each reference links to PubMed.
6. **Minimum 3 citations per post.** Comparison posts should have 5+.
7. **Research-only language.** Never use "therapeutic" in titles or body. Use "research applications" instead.
8. **Publish as draft** for Hunter's review before going live.

### Reference HTML template:
```html
<div class="ab-references">
<h3>References</h3>
<ol>
<li id="ref-1">Author et al. Title. <em>Journal.</em> Year;Vol(Issue):Pages. <a href="https://pubmed.ncbi.nlm.nih.gov/PMID/" target="_blank" rel="noopener">PubMed</a></li>
</ol>
</div>
```

### CSS for references (already in main.css):
The `.ab-references` and `sup.ab-cite` styles are in main.css. No inline styles needed.
