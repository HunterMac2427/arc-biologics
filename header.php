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

      <!-- Desktop nav links -->
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
        <?php if (is_user_logged_in()) :
          $current_user = wp_get_current_user();
          $display = $current_user->first_name ?: $current_user->display_name;
        ?>
          <a href="<?php echo esc_url(wc_get_account_endpoint_url('dashboard')); ?>" class="ab-nav-account">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <span class="ab-nav-account-text">Hi, <?php echo esc_html($display); ?></span>
          </a>
        <?php else : ?>
          <a href="<?php echo esc_url(wp_login_url(wc_get_page_permalink('shop'))); ?>" class="ab-nav-account">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <span class="ab-nav-account-text">Log In</span>
          </a>
        <?php endif; ?>
        <?php $cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="ab-nav-cart" title="View Cart">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
          <?php if ($cart_count > 0) : ?>
            <span class="ab-cart-count"><?php echo esc_html($cart_count); ?></span>
          <?php endif; ?>
        </a>
        <a href="/shop" class="ab-btn ab-btn-primary ab-btn-sm ab-nav-shop-btn"><span class="ab-shop-full">Shop Peptides</span><span class="ab-shop-short">Shop</span></a>

        <!-- Hamburger (mobile only) -->
        <button class="ab-hamburger" id="abHamburger" aria-label="Toggle menu" aria-expanded="false">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>

    <!-- Mobile dropdown -->
    <div class="ab-mobile-menu" id="abMobileMenu">
      <?php
      wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'items_wrap'     => '<div class="ab-mobile-links">%3$s</div>',
          'fallback_cb'    => false,
          'depth'          => 1,
      ]);
      ?>
    </div>
  </nav>

<script>
(function() {
  var btn = document.getElementById('abHamburger');
  var menu = document.getElementById('abMobileMenu');
  if (!btn || !menu) return;
  btn.addEventListener('click', function() {
    var open = menu.classList.toggle('ab-mobile-menu--open');
    btn.classList.toggle('active', open);
    btn.setAttribute('aria-expanded', open);
  });
  menu.querySelectorAll('a').forEach(function(a) {
    a.addEventListener('click', function() {
      menu.classList.remove('ab-mobile-menu--open');
      btn.classList.remove('active');
    });
  });
})();
</script>
