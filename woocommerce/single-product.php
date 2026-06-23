<?php
/**
 * Single Product Template — ARC Biologics
 */
get_header();

while (have_posts()) : the_post();
  global $product;
  $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
  $cats = wp_get_post_terms(get_the_ID(), 'product_cat', ['fields' => 'names']);
  $cat_label = !empty($cats) ? $cats[0] : 'Peptide';
  $approved = ab_is_approved_buyer();
  $max_qty = $product->get_max_purchase_quantity();
?>

  <section class="ab-product-hero">
    <div class="ab-container">
      <div class="ab-product-layout">

        <!-- Product Image -->
        <div class="ab-product-gallery">
          <div class="ab-product-main-img">
            <?php if ($thumb) : ?>
              <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            <?php endif; ?>
          </div>
        </div>

        <!-- Product Details -->
        <div class="ab-product-details">
          <p class="ab-label"><?php echo esc_html($cat_label); ?></p>
          <h1 class="ab-product-title"><?php the_title(); ?></h1>
          <div class="ab-product-price-lg"><?php echo $product->get_price_html(); ?></div>

          <?php if ($product->get_short_description()) : ?>
            <div class="ab-product-short-desc">
              <p><?php echo esc_html($product->get_short_description()); ?></p>
            </div>
          <?php endif; ?>

          <?php if ($product->get_description()) : ?>
            <div class="ab-product-long-desc">
              <?php the_content(); ?>
            </div>
          <?php endif; ?>

          <?php if ($approved && $product->is_in_stock()) : ?>
            <!-- Approved buyer: show add to cart -->
            <form class="ab-add-to-cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post">
              <div class="ab-qty-wrap">
                <label for="quantity" class="ab-qty-label">Qty</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1"<?php echo ($max_qty > 0) ? ' max="' . esc_attr($max_qty) . '"' : ''; ?> class="ab-qty-input">
              </div>
              <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="ab-btn ab-btn-primary ab-btn-lg">Add to Cart</button>
            </form>
          <?php else : ?>
            <!-- Not approved: show waiver gate -->
            <div class="ab-product-gate">
              <div class="ab-gate-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              </div>
              <h3>Waiver Required to Purchase</h3>
              <p>All purchases require a completed research waiver. Complete the form below to create your account and unlock ordering.</p>
              <a href="<?php echo esc_url(home_url('/waiver/')); ?>" class="ab-btn ab-btn-primary ab-btn-lg ab-gate-btn">Complete Research Waiver</a>
              <?php if (is_user_logged_in() && !$approved) : ?>
                <p class="ab-gate-note">Your account is pending approval. If you've already submitted the waiver, please allow a few minutes for processing.</p>
              <?php elseif (!is_user_logged_in()) : ?>
                <p class="ab-gate-note">Already have an account? <a href="<?php echo esc_url(wp_login_url(get_permalink())); ?>">Log in</a></p>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <div class="ab-product-meta">
            <?php if ($product->get_sku()) : ?>
              <div class="ab-meta-item">
                <span class="ab-meta-label">SKU</span>
                <span><?php echo esc_html($product->get_sku()); ?></span>
              </div>
            <?php endif; ?>
            <div class="ab-meta-item">
              <span class="ab-meta-label">Category</span>
              <span><?php echo esc_html(implode(', ', $cats)); ?></span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Related Products -->
  <?php
  $related_ids = wc_get_related_products($product->get_id(), 4);
  if (!empty($related_ids)) :
    $related_query = new WP_Query([
        'post_type' => 'product',
        'post__in'  => $related_ids,
        'orderby'   => 'post__in',
    ]);
  ?>
  <section class="ab-section ab-section-dark">
    <div class="ab-container">
      <div class="ab-section-header ab-reveal">
        <p class="ab-label">Related Compounds</p>
        <h2>You May Also Like</h2>
      </div>
      <div class="ab-products-grid ab-stagger">
        <?php while ($related_query->have_posts()) : $related_query->the_post();
          $rel_product = wc_get_product(get_the_ID());
          $rel_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
        ?>
        <a href="<?php the_permalink(); ?>" class="ab-product-card ab-reveal">
          <div class="ab-product-img">
            <?php if ($rel_thumb) : ?>
              <img src="<?php echo esc_url($rel_thumb); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            <?php endif; ?>
          </div>
          <div class="ab-product-glass">
            <div class="ab-product-name"><?php the_title(); ?></div>
            <div class="ab-product-desc"><?php echo esc_html($rel_product->get_short_description()); ?></div>
            <div class="ab-product-price"><?php echo $rel_product->get_price_html(); ?></div>
          </div>
        </a>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

<?php endwhile;

get_footer(); ?>
