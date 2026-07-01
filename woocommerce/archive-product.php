<?php
/**
 * WooCommerce Product Archive — ARC Biologics
 * Overrides the default WC shop/archive template.
 */
get_header();

// Get product categories for filter tabs
$cat_terms = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => true,
    'exclude'    => get_option('default_product_cat', 0),
]);

// Query all published products
$shop_query = new WP_Query([
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order title',
    'order'          => 'ASC',
]);
?>

  <!-- ======== SHOP HERO ======== -->
  <section class="ab-shop-hero">
    <div class="ab-container">
      <p class="ab-label ab-label-decorated">Our Catalog</p>
      <h1 class="ab-hero-heading">
        <span class="ab-heading-light">Research</span>
        <span class="ab-heading-bold ab-gradient-text">Compounds.</span>
      </h1>
      <p class="ab-hero-sub">Browse our full catalog of 20+ peptide compounds. All products sourced from trusted U.S. suppliers.</p>
    </div>
  </section>

  <!-- ======== FILTER TABS ======== -->
  <section class="ab-section ab-section-surface ab-shop-section">
    <div class="ab-container">

      <div class="ab-filter-bar">
        <button class="ab-filter-tab active" data-filter="all">All Compounds</button>
        <?php foreach ($cat_terms as $term) : ?>
          <button class="ab-filter-tab" data-filter="<?php echo esc_attr($term->slug); ?>">
            <?php echo esc_html($term->name); ?>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- ======== PRODUCT GRID ======== -->
      <div class="ab-shop-grid" id="ab-shop-grid">
        <?php if ($shop_query->have_posts()) : while ($shop_query->have_posts()) : $shop_query->the_post();
          $product = wc_get_product(get_the_ID());
          $cats = wp_get_post_terms(get_the_ID(), 'product_cat', ['fields' => 'slugs']);
          $cat_slug = !empty($cats) ? $cats[0] : '';
          $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
        ?>
          <a href="<?php the_permalink(); ?>" class="ab-product-card" data-cat="<?php echo esc_attr($cat_slug); ?>">
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

    </div>
  </section>

  <!-- ======== CTA ======== -->
  <section class="ab-section ab-section-dark ab-section-cta">
    <div class="ab-container">
      <div class="ab-cta-bar ab-reveal">
        <div>
          <h3>Ready to Get Started?</h3>
          <p>Complete the waiver and access our full catalog of professional-grade compounds.</p>
        </div>
        <a href="/waiver" class="ab-btn">Start Waiver</a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
