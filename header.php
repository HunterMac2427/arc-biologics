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
      <a href="<?php echo esc_url(home_url('/')); ?>" class="ab-nav-logo">
        <?php
        if (has_custom_logo()) {
            the_custom_logo();
        } else {
            echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/logo.png" alt="' . esc_attr(get_bloginfo('name')) . '">';
        }
        ?>
      </a>
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
      <div class="ab-nav-cta">
        <a href="/shop" class="ab-btn ab-btn-primary ab-btn-sm">Shop Peptides</a>
      </div>
    </div>
  </nav>
