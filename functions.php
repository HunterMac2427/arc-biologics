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

// ── Webhook: Create Approved Buyer from Zapier/Jotform ──
add_action('rest_api_init', function () {
    register_rest_route('arc/v1', '/approve-buyer', [
        'methods'  => 'POST',
        'callback' => 'ab_approve_buyer_webhook',
        'permission_callback' => '__return_true',
    ]);
});

function ab_approve_buyer_webhook(WP_REST_Request $request) {
    // Verify webhook secret
    $secret = $request->get_header('X-Webhook-Secret');
    $stored_secret = get_option('ab_webhook_secret', '');

    if (empty($stored_secret) || $secret !== $stored_secret) {
        return new WP_REST_Response(['error' => 'Unauthorized'], 401);
    }

    $email = sanitize_email($request->get_param('email'));
    $name  = sanitize_text_field($request->get_param('name'));

    if (empty($email) || !is_email($email)) {
        return new WP_REST_Response(['error' => 'Valid email required'], 400);
    }

    // Check if user already exists
    $user = get_user_by('email', $email);

    if ($user) {
        // Add approved_buyer role if they don't have it
        $user_obj = new WP_User($user->ID);
        if (!in_array('approved_buyer', $user_obj->roles)) {
            $user_obj->add_role('approved_buyer');
        }
        return new WP_REST_Response([
            'status'  => 'updated',
            'user_id' => $user->ID,
            'message' => 'Existing user granted approved_buyer role',
        ], 200);
    }

    // Create new user
    $name_parts = explode(' ', $name, 2);
    $first_name = $name_parts[0];
    $last_name  = isset($name_parts[1]) ? $name_parts[1] : '';
    $username   = sanitize_user(strtolower(str_replace(' ', '.', $name)));

    // Ensure unique username
    if (username_exists($username)) {
        $username = $username . '_' . wp_rand(100, 999);
    }

    $password = wp_generate_password(16, true, true);
    $user_id  = wp_create_user($username, $password, $email);

    if (is_wp_error($user_id)) {
        return new WP_REST_Response(['error' => $user_id->get_error_message()], 500);
    }

    // Set user meta and role
    wp_update_user([
        'ID'         => $user_id,
        'first_name' => $first_name,
        'last_name'  => $last_name,
        'role'       => 'approved_buyer',
    ]);

    // Send new account email with password
    wp_new_user_notification($user_id, null, 'user');

    return new WP_REST_Response([
        'status'  => 'created',
        'user_id' => $user_id,
        'message' => 'New approved_buyer account created',
    ], 201);
}

// ── Remove default WooCommerce styles (we use our own) ──
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// ── Remove WC block styles and fonts ──
function ab_dequeue_wc_block_styles() {
    wp_dequeue_style('wc-blocks-style');
    wp_deregister_style('wc-blocks-style');
    wp_dequeue_style('wc-blocks-style-coming-soon');
    wp_deregister_style('wc-blocks-style-coming-soon');
}
add_action('wp_enqueue_scripts', 'ab_dequeue_wc_block_styles', 100);

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

// ── AJAX cart count fragment (updates header cart badge without reload) ──
function ab_cart_count_fragment($fragments) {
    $count = WC()->cart->get_cart_contents_count();
    if ($count > 0) {
        $fragments['.ab-cart-count'] = '<span class="ab-cart-count">' . esc_html($count) . '</span>';
    } else {
        $fragments['.ab-cart-count'] = '';
    }
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'ab_cart_count_fragment');

// ── Disable WooCommerce default single product page hooks (we handle in template) ──
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
