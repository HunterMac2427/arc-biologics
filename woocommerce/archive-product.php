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

// Query products - filter by category on taxonomy pages
$shop_args = [
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order title',
    'order'          => 'ASC',
];
if ( is_product_category() ) {
    $current_cat = get_queried_object();
    $shop_args['tax_query'] = [[
        'taxonomy' => 'product_cat',
        'field'    => 'term_id',
        'terms'    => $current_cat->term_id,
    ]];
}
$shop_query = new WP_Query($shop_args);
?>

  <!-- ======== SHOP HERO ======== -->
  <section class="ab-shop-hero">
    <div class="ab-container">
      <p class="ab-label ab-label-decorated">Our Catalog</p>
      <?php if ( is_product_category() ) : $current_cat = get_queried_object(); ?>
        <h1 class="ab-hero-heading">
          <span class="ab-heading-bold ab-gradient-text"><?php echo esc_html($current_cat->name); ?></span>
        </h1>
        <?php if ($current_cat->description) : ?>
          <p class="ab-hero-sub"><?php echo esc_html($current_cat->description); ?></p>
        <?php else : ?>
          <p class="ab-hero-sub">Browse our <?php echo esc_html(strtolower($current_cat->name)); ?> peptide compounds. Sourced from trusted U.S. suppliers.</p>
        <?php endif; ?>
      <?php else : ?>
        <h1 class="ab-hero-heading">
          <span class="ab-heading-light">Research</span>
          <span class="ab-heading-bold ab-gradient-text">Compounds.</span>
        </h1>
        <p class="ab-hero-sub">Browse our full catalog of 20+ peptide compounds. All products sourced from trusted U.S. suppliers.</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- ======== FILTER TABS ======== -->
  <section class="ab-section ab-section-surface ab-shop-section">
    <div class="ab-container">

      <div class="ab-includes-banner">
        <div class="ab-includes-item ab-includes-yes">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
          <span>Bacteriostatic water included with every order</span>
        </div>
        <div class="ab-includes-item ab-includes-no">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6L6 18M6 6l12 12"/></svg>
          <span>Syringes not included</span>
        </div>
      </div>

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
                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy">
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
          <p>Create your free account to browse product details and place orders.</p>
        </div>
        <a href="/waiver/" class="ab-btn ab-btn-primary">Create Account</a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
