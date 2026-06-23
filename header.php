<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- ======== NAV ======== -->
  <nav class="ab-nav">
    <div class="ab-nav-inner">
      <div class="ab-nav-logo">
        <?php if (has_custom_logo()) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
          </a>
        <?php endif; ?>
      </div>
      <div class="ab-nav-links">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'fallback_cb'    => false,
            'depth'          => 1,
        ]);
        ?>
      </div>
      <div class="ab-nav-actions">
        <?php $cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="ab-nav-cart" title="View Cart">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
          <?php if ($cart_count > 0) : ?>
            <span class="ab-cart-count"><?php echo esc_html($cart_count); ?></span>
          <?php endif; ?>
        </a>
        <a href="/shop" class="ab-btn ab-btn-primary ab-btn-sm">Shop Peptides</a>
      </div>
    </div>
  </nav>
