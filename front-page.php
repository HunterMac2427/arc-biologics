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
            <span class="ab-heading-light">Professional-Grade</span>
            <span class="ab-heading-bold ab-gradient-text">Peptides.</span>
          </h1>
          <p class="ab-hero-sub ab-reveal">
            Premium peptide compounds sourced from trusted U.S. suppliers. Quality you can count on.
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
        <p class="ab-subtitle">Browse our full catalog of professional-grade peptide compounds. Sourced from trusted U.S. suppliers.</p>
      </div>
      <div class="ab-products-grid ab-stagger">
        <?php
        $featured_query = new WP_Query([
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => 4,
            'orderby'        => 'date',
            'order'          => 'ASC',
        ]);
        if ($featured_query->have_posts()) : while ($featured_query->have_posts()) : $featured_query->the_post();
          $product = wc_get_product(get_the_ID());
          $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
        ?>
        <a href="<?php the_permalink(); ?>" class="ab-product-card ab-reveal">
          <div class="ab-product-img">
            <?php if ($thumb) : ?>
              <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            <?php endif; ?>
          </div>
          <div class="ab-product-glass">
            <div class="ab-product-name"><?php the_title(); ?></div>
            <div class="ab-product-desc"><?php echo esc_html($product->get_short_description()); ?></div>
            <div class="ab-product-price"><?php echo $product->get_price_html(); ?></div>
          </div>
        </a>
        <?php endwhile; wp_reset_postdata(); endif; ?>
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

      <?php
      // Generate category products JSON with permalinks for carousel
      $cat_slugs = ['recovery', 'cognitive', 'antiaging', 'bodycomp', 'blends', 'performance'];
      $cat_products_data = [];
      foreach ($cat_slugs as $slug) {
          $cat_query = new WP_Query([
              'post_type' => 'product',
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'tax_query' => [['taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => $slug]],
          ]);
          $items = [];
          while ($cat_query->have_posts()) {
              $cat_query->the_post();
              $p = wc_get_product(get_the_ID());
              $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
              $items[] = [
                  'name' => get_the_title(),
                  'desc' => $p->get_short_description() ?: $p->get_name(),
                  'price' => $p->get_price_html(),
                  'url' => get_permalink(),
                  'img' => $thumb ?: '',
              ];
          }
          wp_reset_postdata();
          $cat_products_data[$slug] = $items;
      }
      ?>
      <script>var abCategoryProducts = <?php echo wp_json_encode($cat_products_data); ?>;</script>

    </div>
  </section>

  <!-- ======== HOW IT WORKS ======== -->
  <section id="how-it-works" class="ab-section ab-section-dark ab-hiw-section">
    <div class="ab-hiw-bg-glow"></div>
    <div class="ab-container">
      <div class="ab-section-header ab-reveal">
        <p class="ab-label">Getting Started</p>
        <h2>How It Works</h2>
        <p class="ab-subtitle" style="white-space: nowrap;">Three steps from signup to shipment. Compliance-first, professional-grade.</p>
      </div>
      <div class="ab-steps">
        <div class="ab-step-card" data-step="1">
          <div class="ab-step-number-wrap">
            <div class="ab-step-glow"></div>
            <div class="ab-step-number">01</div>
          </div>
          <h4>Complete the Waiver</h4>
          <p>Submit our HIPAA-compliant waiver form. This verifies your credentials and creates your account automatically.</p>
        </div>
        <div class="ab-step-connector">
          <svg viewBox="0 0 80 24" fill="none"><path d="M0 12h60m0 0l-8-6m8 6l-8 6" stroke="url(#arrow-grad)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><defs><linearGradient id="arrow-grad" x1="0" y1="12" x2="60" y2="12" gradientUnits="userSpaceOnUse"><stop stop-color="#0B8F68" stop-opacity="0.2"/><stop offset="1" stop-color="#0B8F68"/></linearGradient></defs></svg>
        </div>
        <div class="ab-step-card" data-step="2">
          <div class="ab-step-number-wrap">
            <div class="ab-step-glow"></div>
            <div class="ab-step-number">02</div>
          </div>
          <h4>Browse &amp; Order</h4>
          <p>Once approved, the full catalog opens. Select your compounds, review COAs, and checkout securely.</p>
        </div>
        <div class="ab-step-connector">
          <svg viewBox="0 0 80 24" fill="none"><path d="M0 12h60m0 0l-8-6m8 6l-8 6" stroke="url(#arrow-grad2)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><defs><linearGradient id="arrow-grad2" x1="0" y1="12" x2="60" y2="12" gradientUnits="userSpaceOnUse"><stop stop-color="#0B8F68" stop-opacity="0.2"/><stop offset="1" stop-color="#0B8F68"/></linearGradient></defs></svg>
        </div>
        <div class="ab-step-card" data-step="3">
          <div class="ab-step-number-wrap">
            <div class="ab-step-glow"></div>
            <div class="ab-step-number">03</div>
          </div>
          <h4>Fast Shipping</h4>
          <p>Orders processed and shipped Monday through Friday. Every package includes proper documentation and handling.</p>
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

  <!-- ======== QUALITY ASSURANCE ======== -->
  <section class="ab-section ab-section-surface">
    <div class="ab-container">
      <div class="ab-section-header ab-reveal">
        <p class="ab-label">Quality Assurance</p>
        <h2>Three Tests. Every Batch.</h2>
        <p class="ab-subtitle">Every compound passes our three-checkpoint testing process before it ships. No exceptions.</p>
      </div>
      <div class="ab-pillars-grid ab-stagger">

        <div class="ab-pillar-card ab-reveal">
          <div class="ab-pillar-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
          </div>
          <h3>Certificate of Authenticity</h3>
          <p>Batch-specific identity and purity verification. Not a claim — proof tied to the compound inside the vial.</p>
        </div>

        <div class="ab-pillar-card ab-reveal">
          <div class="ab-pillar-icon ab-pillar-icon-violet">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 2v7.527a2 2 0 0 1-.211.896L4.72 20.55a1 1 0 0 0 .9 1.45h12.76a1 1 0 0 0 .9-1.45l-5.069-10.127A2 2 0 0 1 14 9.527V2"/><path d="M8.5 2h7"/><path d="M7 16h10"/></svg>
          </div>
          <h3>Sterility Testing</h3>
          <p>Every batch screened for bacterial and microbial contamination. A baseline requirement, not an occasional check.</p>
        </div>

        <div class="ab-pillar-card ab-reveal">
          <div class="ab-pillar-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/><path d="M11 8v6"/><path d="M8 11h6"/></svg>
          </div>
          <h3>Mycotoxin Testing</h3>
          <p>The step most sellers skip. ARC screens every batch for mold and fungi toxins that leave no visible trace.</p>
        </div>

      </div>
      <div class="ab-products-cta ab-reveal-simple" style="margin-top: 48px;">
        <a href="/quality/" class="ab-btn ab-btn-outline">Learn More About Our Testing</a>
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
          </div>
          <div class="ab-blog-body">
            <h4><?php the_title(); ?></h4>
          </div>
        </a>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
        <div class="ab-blog-card ab-reveal">
          <div class="ab-blog-thumb"></div>
          <div class="ab-blog-body"><h4>More articles coming soon</h4></div>
        </div>
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
          <p>Complete the research waiver and access our full catalog of peptide compounds.</p>
        </div>
        <a href="/waiver/" class="ab-btn">Start Waiver</a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
