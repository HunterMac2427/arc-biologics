<?php
/**
 * ARC Biologics Theme Functions
 */

// ── Theme Setup ──
function ab_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('woocommerce');

    register_nav_menus([
        'primary' => __('Primary Navigation', 'arc-biologics'),
        'footer'  => __('Footer Navigation', 'arc-biologics'),
    ]);
}
add_action('after_setup_theme', 'ab_theme_setup');

// ── Enqueue Styles & Scripts ──
function ab_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'ab-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@200;300;400;500;600;700;800&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'ab-main',
        get_template_directory_uri() . '/assets/css/main.css',
        ['ab-google-fonts'],
        filemtime(get_template_directory() . '/assets/css/main.css')
    );

    // Site scripts
    wp_enqueue_script(
        'ab-site',
        get_template_directory_uri() . '/assets/js/site.js',
        [],
        filemtime(get_template_directory() . '/assets/js/site.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'ab_enqueue_assets');

// ── Disable WP emoji scripts ──
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// ── Register Approved Buyer Role ──
function ab_register_roles() {
    if (!get_role('approved_buyer')) {
        add_role('approved_buyer', 'Approved Buyer', [
            'read'    => true,
            'customer' => true,
        ]);
    }
}
add_action('init', 'ab_register_roles');

// ── Product Gating: Block purchases for non-approved users ──
function ab_is_approved_buyer() {
    if (!is_user_logged_in()) return false;
    $user = wp_get_current_user();
    return in_array('approved_buyer', $user->roles) || in_array('administrator', $user->roles);
}

// Prevent adding to cart
function ab_block_add_to_cart($purchasable, $product) {
    if (!ab_is_approved_buyer()) return false;
    return $purchasable;
}
add_filter('woocommerce_is_purchasable', 'ab_block_add_to_cart', 10, 2);

// Replace "Add to Cart" with waiver CTA on shop/archive pages
function ab_replace_cart_button($button, $product) {
    if (!ab_is_approved_buyer()) {
        return '<a href="/waiver" class="ab-btn ab-btn-primary">Complete Waiver to Purchase</a>';
    }
    return $button;
}
add_filter('woocommerce_loop_add_to_cart_link', 'ab_replace_cart_button', 10, 2);

// Show notice on single product pages
function ab_product_waiver_notice() {
    if (!ab_is_approved_buyer()) {
        echo '<div class="ab-waiver-notice">';
        echo '<p>You must complete the research waiver before purchasing.</p>';
        echo '<a href="/waiver" class="ab-btn ab-btn-primary">Complete Waiver</a>';
        echo '</div>';
    }
}
add_action('woocommerce_single_product_summary', 'ab_product_waiver_notice', 25);

// ── WooCommerce REST API keys for Zapier ──
function ab_wc_api_keys_notice() {
    // Generate keys via WP Admin → WooCommerce → Settings → Advanced → REST API
}

// ── Remove default WooCommerce styles (we use our own) ──
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// ── WooCommerce wrapper overrides ──
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

function ab_wc_wrapper_start() {
    echo '<div class="woocommerce">';
}
function ab_wc_wrapper_end() {
    echo '</div>';
}
add_action('woocommerce_before_main_content', 'ab_wc_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'ab_wc_wrapper_end', 10);

// ── Remove default WooCommerce sidebar ──
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// ── Disable WooCommerce default single product page hooks (we handle in template) ──
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
