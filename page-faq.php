<?php
/**
 * Template Name: FAQ
 */
get_header();

// FAQ data - used for both display and schema
$faq_sections = [
    [
        'title' => 'About Our Products',
        'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 2v7.527a2 2 0 0 1-.211.896L4.72 20.55a1 1 0 0 0 .9 1.45h12.76a1 1 0 0 0 .9-1.45l-5.069-10.127A2 2 0 0 1 14 9.527V2"/><path d="M8.5 2h7"/><path d="M7 16h10"/></svg>',
        'items' => [
            [
                'q' => 'What are peptides?',
                'a' => 'Peptides are short chains of amino acids, typically ranging from 2 to 50 amino acids in length. They play critical roles in biological processes including cell signaling, immune response, and tissue repair. ARC Biologics supplies peptide compounds for <strong>laboratory and research use only</strong>.',
            ],
            [
                'q' => 'What does "professional-grade" mean?',
                'a' => 'Every compound we sell meets a 99%+ purity standard, verified through our <a href="/quality/">three-checkpoint testing process</a>: Certificate of Authenticity (identity and purity), sterility screening, and mycotoxin analysis. Each batch ships with documentation tied to that specific lot.',
            ],
            [
                'q' => 'How should peptides be stored?',
                'a' => 'Lyophilized (freeze-dried) peptides should be stored in a cool, dry place. Refrigeration between 2-8 degrees C is ideal for long-term storage. Once reconstituted with bacteriostatic water, peptides should be refrigerated and used within 30 days. Avoid repeated freeze-thaw cycles.',
            ],
            [
                'q' => 'What is reconstitution?',
                'a' => 'Reconstitution is the process of dissolving a lyophilized peptide powder with bacteriostatic water to create a solution for research use. The amount of water determines the concentration. Use our <a href="/calculator/">Peptide Dosing Calculator</a> for precise measurements.',
            ],
            [
                'q' => 'Are your products intended for human use?',
                'a' => 'No. All ARC Biologics products are sold strictly for laboratory and research purposes. They are not intended for human consumption, veterinary use, or for the diagnosis, treatment, cure, or prevention of any disease. All buyers must acknowledge our <a href="/research-use-policy">Research Use Policy</a> during registration.',
            ],
        ],
    ],
    [
        'title' => 'Ordering & Accounts',
        'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
        'items' => [
            [
                'q' => 'Why do I need to create an account to view products?',
                'a' => 'Our registration process ensures compliance with research-use regulations. During signup, you verify that you are 18 or older, acknowledge the research-only intended use, and accept the associated risks. This takes less than a minute and grants immediate access to our full catalog.',
            ],
            [
                'q' => 'What payment methods do you accept?',
                'a' => 'We accept four payment methods: <strong>eCheck / Bank Transfer</strong> (via our secure banking integration), <strong>Cash App</strong>, <strong>Zelle</strong>, and <strong>Pay by SMS Link</strong> (a secure payment link sent to your phone via text message). Detailed instructions are provided at checkout and in your confirmation email.',
            ],
            [
                'q' => 'Can I place an order without creating an account?',
                'a' => 'No. Account creation is required for all purchases. This is a compliance measure, not a barrier. Registration takes under a minute and your account is approved instantly. <a href="/waiver/">Create your account here</a>.',
            ],
            [
                'q' => 'Do you offer bulk or wholesale pricing?',
                'a' => 'Yes. For bulk orders or institutional purchasing, contact us at <a href="mailto:info@arcbiologics.com">info@arcbiologics.com</a> with your requirements and we will provide a custom quote.',
            ],
        ],
    ],
    [
        'title' => 'Shipping & Delivery',
        'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
        'items' => [
            [
                'q' => 'What are your shipping rates?',
                'a' => '<strong>Standard Shipping:</strong> $12.49 flat rate (free on orders $500+)<br><strong>Expedited Shipping:</strong> $24.99 flat rate (free on orders $1,000+)<br>All orders ship within the continental United States via USPS or UPS.',
            ],
            [
                'q' => 'How quickly are orders processed?',
                'a' => 'Orders placed Monday through Friday before 12:00 PM EST are processed and shipped the same day. Orders placed after noon or on weekends are processed the next business day.',
            ],
            [
                'q' => 'Do you ship internationally?',
                'a' => 'We currently ship within the United States only. We do not offer international shipping at this time.',
            ],
            [
                'q' => 'How are peptides packaged for shipping?',
                'a' => 'All orders are packaged with proper handling procedures to maintain compound integrity during transit. Each shipment includes appropriate documentation for your records.',
            ],
        ],
    ],
    [
        'title' => 'Quality & Testing',
        'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>',
        'items' => [
            [
                'q' => 'What testing do you perform on each batch?',
                'a' => 'Every batch undergoes our three-checkpoint testing process:<br><strong>1. Certificate of Authenticity</strong> - Identity and purity verification tied to the specific compound<br><strong>2. Sterility Testing</strong> - Screening for bacterial and microbial contamination<br><strong>3. Mycotoxin Testing</strong> - Detection of mold and fungi toxins that leave no visible trace<br>Learn more on our <a href="/quality/">Quality & Testing page</a>.',
            ],
            [
                'q' => 'Can I view test results for my specific batch?',
                'a' => 'Yes. Every compound ships with a lot number. Enter your lot number into our <a href="/coa-lookup/">COA Lookup tool</a> to view the third-party lab results for your specific batch, including purity analysis and contamination screening results.',
            ],
            [
                'q' => 'Where are your peptides sourced?',
                'a' => 'All compounds are sourced from established domestic laboratories within the United States. We work directly with trusted U.S. suppliers to ensure consistent quality and full supply chain transparency.',
            ],
        ],
    ],
    [
        'title' => 'Returns & Support',
        'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
        'items' => [
            [
                'q' => 'What is your refund policy?',
                'a' => 'Due to the nature of our products, all sales are final. Orders may be cancelled within 2 hours of placement if they have not yet been processed. If your order arrives damaged, report it within 48 hours with photos to <a href="mailto:info@arcbiologics.com">info@arcbiologics.com</a>. See our full <a href="/refund-policy">Refund Policy</a> for details.',
            ],
            [
                'q' => 'How do I contact support?',
                'a' => 'Email us at <a href="mailto:info@arcbiologics.com">info@arcbiologics.com</a>. We respond to all inquiries within one business day.',
            ],
            [
                'q' => 'What if my order arrives damaged?',
                'a' => 'Contact us within 48 hours of delivery at <a href="mailto:info@arcbiologics.com">info@arcbiologics.com</a> with your order number and photos of the damage. We will evaluate and, if warranted, arrange a replacement at no additional cost.',
            ],
        ],
    ],
];
?>

  <!-- ======== FAQ HERO ======== -->
  <section class="ab-faq-hero">
    <div class="ab-hero-gradient"></div>
    <div class="ab-hero-noise"></div>
    <div class="ab-container">
      <div class="ab-faq-hero-content ab-reveal">
        <p class="ab-label ab-label-decorated">Support</p>
        <h1>Frequently Asked Questions</h1>
        <p class="ab-hero-sub">Everything you need to know about our products, ordering, and shipping.</p>
      </div>
    </div>
  </section>

  <!-- ======== FAQ CONTENT ======== -->
  <section class="ab-section ab-section-dark">
    <div class="ab-container ab-faq-container">

      <?php foreach ($faq_sections as $section) : ?>
      <div class="ab-faq-category">
        <div class="ab-faq-category-header ab-reveal">
          <span class="ab-faq-category-icon"><?php echo $section['icon']; ?></span>
          <h2><?php echo esc_html($section['title']); ?></h2>
        </div>
        <div class="ab-faq-list ab-stagger">
          <?php foreach ($section['items'] as $i => $item) : ?>
          <div class="ab-faq-item ab-reveal">
            <button class="ab-faq-trigger" aria-expanded="false">
              <span class="ab-faq-question"><?php echo esc_html($item['q']); ?></span>
              <span class="ab-faq-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
              </span>
            </button>
            <div class="ab-faq-answer">
              <div class="ab-faq-answer-inner">
                <p><?php echo $item['a']; ?></p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </section>

  <!-- ======== CTA ======== -->
  <section class="ab-section ab-section-dark ab-section-cta">
    <div class="ab-container">
      <div class="ab-cta-bar ab-reveal">
        <div>
          <h3>Still Have Questions?</h3>
          <p>Our team is here to help. Reach out and we will get back to you within one business day.</p>
          <p class="ab-cta-email">Contact us at <a href="mailto:info@arcbiologics.com">info@arcbiologics.com</a></p>
        </div>
        <a href="/shop/" class="ab-btn ab-btn-primary">Shop Now</a>
      </div>
    </div>
  </section>

  <!-- FAQ Accordion Script -->
  <script>
  (function() {
    document.querySelectorAll('.ab-faq-trigger').forEach(function(btn) {
      btn.addEventListener('click', function() {
        var item = this.closest('.ab-faq-item');
        var expanded = this.getAttribute('aria-expanded') === 'true';

        // Close all others in the same category
        var category = item.closest('.ab-faq-list');
        category.querySelectorAll('.ab-faq-item.active').forEach(function(open) {
          if (open !== item) {
            open.classList.remove('active');
            open.querySelector('.ab-faq-trigger').setAttribute('aria-expanded', 'false');
            open.querySelector('.ab-faq-answer').style.maxHeight = null;
          }
        });

        // Toggle current
        if (expanded) {
          item.classList.remove('active');
          this.setAttribute('aria-expanded', 'false');
          item.querySelector('.ab-faq-answer').style.maxHeight = null;
        } else {
          item.classList.add('active');
          this.setAttribute('aria-expanded', 'true');
          var answer = item.querySelector('.ab-faq-answer');
          answer.style.maxHeight = answer.scrollHeight + 'px';
        }
      });
    });
  })();
  </script>

<?php
// FAQPage JSON-LD Schema
$faq_schema_items = [];
foreach ($faq_sections as $section) {
    foreach ($section['items'] as $item) {
        $faq_schema_items[] = [
            '@type' => 'Question',
            'name' => $item['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => wp_strip_all_tags($item['a']),
            ],
        ];
    }
}
$faq_schema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => $faq_schema_items,
];
echo '<script type="application/ld+json">' . wp_json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
?>

<?php get_footer(); ?>
