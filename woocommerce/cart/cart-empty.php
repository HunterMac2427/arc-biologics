<?php
/**
 * Empty Cart — ARC Biologics
 */
defined('ABSPATH') || exit;

// Show any WC notices (e.g. "item removed")
if (function_exists('wc_print_notices')) {
    wc_print_notices();
}
?>

<div class="ab-empty-cart">
  <h2>Your cart is empty.</h2>
  <p>Browse our catalog and add research compounds to get started.</p>
  <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="ab-btn ab-btn-primary">Browse Compounds</a>
</div>

<?php
// Show 4 recent products
$recent = new WP_Query([
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => 4,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

if ($recent->have_posts()) :
?>
<div class="ab-empty-cart-products">
  <div class="ab-section-header">
    <p class="ab-label">Explore</p>
    <h2>Popular Compounds</h2>
  </div>
  <div class="ab-products-grid">
    <?php while ($recent->have_posts()) : $recent->the_post();
      $product = wc_get_product(get_the_ID());
      $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
    ?>
    <a href="<?php the_permalink(); ?>" class="ab-product-card">
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
    <?php endwhile; wp_reset_postdata(); ?>
  </div>
</div>
<?php endif; ?>
