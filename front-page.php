<?php get_header(); ?>

  <!-- ======== HERO ======== -->
  <section class="ab-hero">
    <div class="ab-hero-gradient"></div>
    <div class="ab-hero-noise"></div>
    <div class="ab-container">
      <div class="ab-hero-grid">
        <div class="ab-hero-content">
          <p class="ab-label ab-label-decorated ab-reveal">Advanced Research Compounds</p>
          <h1 class="ab-hero-heading ab-reveal">
            <span class="ab-heading-light">Research-Grade</span>
            <span class="ab-heading-bold ab-gradient-text">Peptides.</span>
          </h1>
          <p class="ab-hero-sub ab-reveal">
            Premium peptide compounds sourced from trusted U.S. suppliers. Quality you can count on, shipped same-day.
          </p>
          <div class="ab-hero-actions ab-reveal">
            <a href="/shop" class="ab-btn ab-btn-primary">Browse Compounds</a>
            <a href="#how-it-works" class="ab-btn ab-btn-outline">How It Works</a>
          </div>
          <div class="ab-stats ab-reveal ab-stagger">
            <div class="ab-stat">
              <div class="ab-stat-value ab-shimmer">20+</div>
              <div class="ab-stat-label">Compounds</div>
            </div>
            <div class="ab-stat">
              <div class="ab-stat-value">&lt;24h</div>
              <div class="ab-stat-label">Ship Time</div>
            </div>
            <div class="ab-stat-text">Sourced in the U.S.</div>
          </div>
        </div>
        <div class="ab-hero-vial ab-reveal">
          <div class="ab-vial-stage">
            <div class="ab-vial-glow"></div>
            <div class="ab-vial-float">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/bpc157.png" alt="BPC-157 Peptide Vial" class="ab-vial-img">
            </div>
            <div class="ab-vial-reflection">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/bpc157.png" alt="" class="ab-vial-img-reflect">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======== FEATURED PRODUCTS ======== -->
  <section id="products" class="ab-section ab-section-surface">
    <div class="ab-container">
      <div class="ab-section-header ab-reveal">
        <p class="ab-label">Our Catalog</p>
        <h2>Research Compounds</h2>
        <p class="ab-subtitle">Browse our full catalog of research-grade peptide compounds. Sourced from trusted U.S. suppliers.</p>
      </div>
      <div class="ab-products-grid ab-stagger">
        <div class="ab-product-card ab-reveal">
          <div class="ab-product-img">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ghkcu.png" alt="GHK-cu">
            <span class="ab-product-badge">Best Seller</span>
          </div>
          <div class="ab-product-glass">
            <div class="ab-product-name">GHK-cu</div>
            <div class="ab-product-desc">100mg - 3ml vial</div>
            <div class="ab-product-price">$200</div>
          </div>
        </div>
        <div class="ab-product-card ab-reveal">
          <div class="ab-product-img">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/bpc157.png" alt="BPC-157">
            <span class="ab-product-badge">Popular</span>
          </div>
          <div class="ab-product-glass">
            <div class="ab-product-name">BPC-157</div>
            <div class="ab-product-desc">15mg - 3ml vial</div>
            <div class="ab-product-price">$250</div>
          </div>
        </div>
        <div class="ab-product-card ab-reveal">
          <div class="ab-product-img">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/glow.png" alt="GLOW">
            <span class="ab-product-badge">Blend</span>
          </div>
          <div class="ab-product-glass">
            <div class="ab-product-name">GLOW</div>
            <div class="ab-product-desc">BPC-157/GHK-cu/TB-500 — 10/70/10mg - 5ml</div>
            <div class="ab-product-price">$390</div>
          </div>
        </div>
        <div class="ab-product-card ab-reveal">
          <div class="ab-product-img">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/duoblend.png" alt="Duo Blend">
            <span class="ab-product-badge">Popular</span>
          </div>
          <div class="ab-product-glass">
            <div class="ab-product-name">Duo Blend</div>
            <div class="ab-product-desc">Tesa/Ipa - 3ml vial</div>
            <div class="ab-product-price">$240</div>
          </div>
        </div>
      </div>
      <div class="ab-products-cta ab-reveal-simple">
        <a href="/shop" class="ab-btn ab-btn-outline">View All 20+ Compounds</a>
      </div>
    </div>
  </section>

  <!-- ======== BROWSE BY APPLICATION ======== -->
  <section class="ab-section ab-section-dark">
    <div class="ab-container">
      <div class="ab-section-header ab-reveal">
        <p class="ab-label">Browse by Application</p>
        <h2>Research Topics</h2>
        <p class="ab-subtitle">Navigate our catalog by therapeutic or biological focus area.</p>
      </div>

      <div class="ab-categories-grid ab-stagger">

        <button class="ab-category-card ab-reveal" data-category="recovery">
          <div class="ab-category-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
          </div>
          <h4>Recovery & Healing</h4>
          <p>Tissue repair, wound healing, and inflammation support peptides.</p>
        </button>

        <button class="ab-category-card ab-reveal" data-category="cognitive">
          <div class="ab-category-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a8 8 0 0 0-8 8c0 6 8 12 8 12s8-6 8-12a8 8 0 0 0-8-8z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <h4>Cognitive & Neuro</h4>
          <p>Neuroprotective and cognitive enhancement research compounds.</p>
        </button>

        <button class="ab-category-card ab-reveal" data-category="antiaging">
          <div class="ab-category-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
          </div>
          <h4>Anti-Aging & Longevity</h4>
          <p>Cellular repair, telomere support, and longevity-focused peptides.</p>
        </button>

        <button class="ab-category-card ab-reveal" data-category="bodycomp">
          <div class="ab-category-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 18L18 6M8 6h10v10"/></svg>
          </div>
          <h4>Body Composition</h4>
          <p>Metabolic optimization, fat loss, and body recomposition peptides.</p>
        </button>

        <button class="ab-category-card ab-reveal" data-category="blends">
          <div class="ab-category-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="12" r="6"/><circle cx="16" cy="12" r="6"/></svg>
          </div>
          <h4>Blends & Stacks</h4>
          <p>Multi-compound formulations for synergistic research applications.</p>
        </button>

        <button class="ab-category-card ab-reveal" data-category="performance">
          <div class="ab-category-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
          </div>
          <h4>Performance</h4>
          <p>Endurance, muscle growth, and physical performance peptides.</p>
        </button>


        <!-- Expandable product carousel panel (JS moves this inside grid) -->
        <div class="ab-category-panel" id="ab-category-panel">
          <div class="ab-category-panel-inner">
            <button class="ab-carousel-arrow ab-carousel-prev" id="ab-carousel-prev" aria-label="Previous">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
            </button>
            <div class="ab-category-carousel" id="ab-category-carousel"></div>
            <button class="ab-carousel-arrow ab-carousel-next" id="ab-carousel-next" aria-label="Next">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
            </button>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ======== HOW IT WORKS ======== -->
  <section id="how-it-works" class="ab-section ab-section-dark">
    <div class="ab-container">
      <div class="ab-section-header ab-reveal">
        <p class="ab-label">Getting Started</p>
        <h2>How It Works</h2>
        <p class="ab-subtitle">Three steps from signup to shipment. Compliance-first, research-ready.</p>
      </div>
      <div class="ab-steps ab-stagger">
        <div class="ab-card ab-reveal">
          <div class="ab-step-number">01</div>
          <h4>Complete the Waiver</h4>
          <p>Submit our HIPAA-compliant research waiver form. This verifies your credentials and creates your account automatically.</p>
        </div>
        <div class="ab-card ab-reveal">
          <div class="ab-step-number">02</div>
          <h4>Browse &amp; Order</h4>
          <p>Once approved, the full catalog opens. Select your compounds, review COAs, and checkout securely.</p>
        </div>
        <div class="ab-card ab-reveal">
          <div class="ab-step-number">03</div>
          <h4>Same-Day Shipping</h4>
          <p>Orders placed before 2 PM ET ship same day. Every package includes proper documentation and handling.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ======== TRUST SIGNALS ======== -->
  <section class="ab-section ab-section-light">
    <div class="ab-container">
      <div class="ab-section-header ab-reveal">
        <p class="ab-label ab-label-violet">Why ARC</p>
        <h2>Built on Trust &amp; Transparency</h2>
      </div>
      <div class="ab-trust-grid ab-stagger">
        <div class="ab-trust-item ab-reveal">
          <div class="ab-trust-value">20+</div>
          <div class="ab-trust-label">Peptide Compounds Available</div>
        </div>
        <div class="ab-trust-item ab-reveal">
          <div class="ab-trust-value ab-trust-value-violet">U.S.</div>
          <div class="ab-trust-label">Trusted Domestic Suppliers</div>
        </div>
        <div class="ab-trust-item ab-reveal">
          <div class="ab-trust-value">&lt;24hr</div>
          <div class="ab-trust-label">Same-Day Processing &amp; Shipping</div>
        </div>
        <div class="ab-trust-item ab-reveal">
          <div class="ab-trust-value">Secure</div>
          <div class="ab-trust-label">Encrypted Checkout &amp; Data Protection</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======== ABOUT ======== -->
  <section id="about" class="ab-section ab-section-dark">
    <div class="ab-container">
      <div class="ab-about-grid">
        <div class="ab-about-visual ab-reveal">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>">
        </div>
        <div class="ab-reveal">
          <p class="ab-label">About ARC Biologics</p>
          <h2>Precision Compounds.<br>No Compromises.</h2>
          <p class="ab-about-text">
            ARC Biologics was founded with a single mission: provide researchers with premium peptide compounds from trusted U.S. suppliers, backed by fast shipping and dedicated support.
          </p>
          <p class="ab-about-text">
            We work directly with established domestic labs to ensure consistent quality across our full catalog. Transparency and reliability aren't just promises — they're how we operate.
          </p>
          <a href="/about" class="ab-btn ab-btn-primary">Learn More</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ======== BLOG PREVIEW ======== -->
  <section id="blog" class="ab-section ab-section-surface">
    <div class="ab-container">
      <div class="ab-section-header ab-reveal">
        <p class="ab-label">Research Library</p>
        <h2>Latest from the Lab</h2>
        <p class="ab-subtitle">In-depth guides on peptide research, mechanisms of action, and the latest scientific literature.</p>
      </div>
      <div class="ab-blog-grid ab-stagger">
        <?php
        $blog_query = new WP_Query([
            'posts_per_page' => 3,
            'post_status'    => 'publish',
        ]);
        if ($blog_query->have_posts()) :
            while ($blog_query->have_posts()) : $blog_query->the_post();
        ?>
        <a href="<?php the_permalink(); ?>" class="ab-blog-card ab-reveal">
          <div class="ab-blog-thumb">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('medium_large'); ?>
            <?php endif; ?>
            <?php
            $categories = get_the_category();
            if ($categories) :
            ?>
              <span class="ab-blog-tag"><?php echo esc_html($categories[0]->name); ?></span>
            <?php endif; ?>
          </div>
          <div class="ab-blog-body">
            <h4><?php the_title(); ?></h4>
            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            <span class="ab-blog-link">Read Article &rarr;</span>
          </div>
        </a>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
        <a href="#" class="ab-blog-card ab-reveal">
          <div class="ab-blog-thumb">
            <span class="ab-blog-tag">Peptide Guide</span>
          </div>
          <div class="ab-blog-body">
            <h4>What Is BPC-157? A Complete Research Guide</h4>
            <p>An evidence-based overview of Body Protection Compound-157, its mechanism of action, and current research applications.</p>
            <span class="ab-blog-link">Read Article &rarr;</span>
          </div>
        </a>
        <a href="#" class="ab-blog-card ab-reveal">
          <div class="ab-blog-thumb">
            <span class="ab-blog-tag">Research</span>
          </div>
          <div class="ab-blog-body">
            <h4>Understanding Dihexa: Cognitive Peptide Research</h4>
            <p>A deep dive into the angiotensin IV analog showing promise in cognitive and neurotrophic factor research.</p>
            <span class="ab-blog-link">Read Article &rarr;</span>
          </div>
        </a>
        <a href="#" class="ab-blog-card ab-reveal">
          <div class="ab-blog-thumb">
            <span class="ab-blog-tag">Quality</span>
          </div>
          <div class="ab-blog-body">
            <h4>How to Read a Certificate of Analysis (COA)</h4>
            <p>Understanding HPLC results, mass spectrometry data, and what purity percentages actually mean for your research.</p>
            <span class="ab-blog-link">Read Article &rarr;</span>
          </div>
        </a>
        <?php endif; ?>
      </div>
      <div class="ab-products-cta ab-reveal-simple">
        <a href="/blog" class="ab-btn ab-btn-outline">View All Articles</a>
      </div>
    </div>
  </section>

  <!-- ======== CTA ======== -->
  <section class="ab-section ab-section-dark ab-section-cta">
    <div class="ab-container">
      <div class="ab-cta-bar ab-reveal">
        <div>
          <h3>Ready to Get Started?</h3>
          <p>Complete the waiver and access our full catalog of research-grade compounds.</p>
        </div>
        <a href="#" class="ab-btn">Start Waiver</a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
