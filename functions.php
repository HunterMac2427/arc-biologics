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

// ── Custom Branded Login Page ──
function ab_login_enqueue() {
    wp_enqueue_style(
        'ab-google-fonts-login',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;500;600;700&display=swap',
        [],
        null
    );
}
add_action('login_enqueue_scripts', 'ab_login_enqueue');

function ab_login_styles() {
    $logo_url = get_template_directory_uri() . '/assets/images/logo.png';
    ?>
    <style>
        /* ── ARC Biologics Login Portal ── */
        body.login {
            background: #0C0C10;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        /* Gradient mesh background */
        body.login::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 500px 500px at 20% 30%, rgba(11,143,104,0.18) 0%, transparent 70%),
                radial-gradient(ellipse 400px 400px at 75% 20%, rgba(116,82,160,0.14) 0%, transparent 70%),
                radial-gradient(ellipse 350px 350px at 60% 75%, rgba(11,143,104,0.1) 0%, transparent 70%);
            filter: blur(60px);
            z-index: 0;
            animation: ab-login-drift 20s ease-in-out infinite alternate;
        }

        @keyframes ab-login-drift {
            0%   { transform: translate(0, 0) scale(1); }
            50%  { transform: translate(3%, -2%) scale(1.04); }
            100% { transform: translate(-2%, 3%) scale(0.98); }
        }

        /* Noise texture */
        body.login::after {
            content: '';
            position: fixed;
            inset: 0;
            z-index: 1;
            opacity: 0.03;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
            background-repeat: repeat;
            pointer-events: none;
        }

        #login {
            position: relative;
            z-index: 2;
            width: 420px !important;
            max-width: 420px !important;
            padding: 36px 40px 36px 40px !important;
            background: rgba(22, 22, 24, 0.85) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 16px;
            box-shadow: 0 24px 80px rgba(0,0,0,0.4);
        }

        /* Logo */
        #login h1 a {
            background-image: url('<?php echo esc_url($logo_url); ?>');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            width: 180px;
            height: 60px;
            margin: 0 auto 28px;
            display: block;
        }

        /* Hide "Powered by WordPress" text */
        .login #login h1 a {
            text-indent: -9999px;
            overflow: hidden;
        }

        /* Kill ALL white backgrounds from WP core login styles */
        .login form,
        #loginform,
        #lostpasswordform,
        #resetpassform,
        #registerform {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        /* Kill any stray white panels */
        #login form p,
        #login form .user-pass-wrap,
        #login form .forgetmenot,
        #login form .submit {
            background: transparent !important;
        }

        /* Labels */
        .login form .forgetmenot label,
        .login label {
            font-family: 'Outfit', sans-serif;
            font-size: 13px;
            font-weight: 500;
            color: rgba(255,255,255,0.5) !important;
            letter-spacing: 0.02em;
        }

        /* Inputs — nuke WP defaults completely */
        .login input[type="text"],
        .login input[type="password"],
        .login input[type="email"],
        #user_login,
        #user_pass,
        #user_email {
            background: rgba(255,255,255,0.04) !important;
            border: 1px solid rgba(255,255,255,0.08) !important;
            border-radius: 10px !important;
            color: #fff !important;
            font-family: 'Inter', sans-serif !important;
            font-size: 15px !important;
            padding: 12px 16px !important;
            height: auto !important;
            width: 100% !important;
            margin-top: 6px;
            box-shadow: none !important;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .login input[type="text"]:focus,
        .login input[type="password"]:focus,
        .login input[type="email"]:focus,
        #user_login:focus,
        #user_pass:focus,
        #user_email:focus {
            background: rgba(255,255,255,0.06) !important;
            border-color: rgba(11,143,104,0.5) !important;
            box-shadow: 0 0 0 3px rgba(11,143,104,0.12) !important;
            outline: none !important;
            color: #fff !important;
        }

        /* Submit button */
        .login .button-primary,
        .wp-core-ui .button-primary,
        #wp-submit {
            background: linear-gradient(135deg, #0B8F68, #087B5A) !important;
            border: none !important;
            border-radius: 10px !important;
            font-family: 'Outfit', sans-serif !important;
            font-size: 14px !important;
            font-weight: 600 !important;
            letter-spacing: 0.02em;
            padding: 12px 24px !important;
            height: auto !important;
            width: 100%;
            cursor: pointer;
            transition: box-shadow 0.2s, transform 0.2s !important;
            text-shadow: none !important;
            color: #fff !important;
            margin-top: 8px;
        }

        .login .button-primary:hover,
        .wp-core-ui .button-primary:hover {
            box-shadow: 0 10px 25px rgba(11,143,104,0.3) !important;
            transform: translateY(-1px);
        }

        .login .button-primary:active,
        .wp-core-ui .button-primary:active {
            transform: translateY(0);
        }

        /* Links below form */
        .login #nav,
        .login #backtoblog {
            text-align: center;
            padding: 0;
            margin: 12px 0 0;
        }

        .login #nav a,
        .login #backtoblog a {
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            color: rgba(255,255,255,0.35);
            transition: color 0.2s;
        }

        .login #nav a:hover,
        .login #backtoblog a:hover {
            color: #0B8F68;
        }

        /* Messages (password reset, errors, etc.) */
        .login .message,
        .login .success {
            background: rgba(11,143,104,0.08);
            border: 1px solid rgba(11,143,104,0.2);
            border-radius: 10px;
            color: rgba(255,255,255,0.7);
            font-size: 13px;
            padding: 12px 16px;
            margin-bottom: 16px;
            box-shadow: none;
        }

        .login #login_error {
            background: rgba(220,50,50,0.08);
            border: 1px solid rgba(220,50,50,0.2);
            border-radius: 10px;
            color: rgba(255,255,255,0.7);
            font-size: 13px;
            padding: 12px 16px;
            margin-bottom: 16px;
            box-shadow: none;
        }

        .login #login_error a {
            color: #0B8F68;
        }

        /* Password strength meter */
        .login .pw-weak label {
            color: rgba(255,255,255,0.5);
        }

        .login .indicator-hint {
            color: rgba(255,255,255,0.4);
            font-size: 12px;
        }

        /* Password reset form specifics */
        .login .reset-pass-submit {
            display: flex;
            flex-direction: column;
        }

        /* Remember me checkbox */
        .login .forgetmenot input[type="checkbox"] {
            accent-color: #0B8F68;
        }

        /* Hide "Go to site" link — they'll navigate naturally */
        .login #backtoblog {
            display: none;
        }

        /* Privacy policy link */
        .login .privacy-policy-page-link {
            text-align: center;
            margin-top: 16px;
        }

        .login .privacy-policy-page-link a {
            font-size: 11px;
            color: rgba(255,255,255,0.2);
        }

        /* Language switcher */
        .language-switcher {
            display: none;
        }

        /* Mobile */
        @media (max-width: 767px) {
            #login {
                width: calc(100% - 32px);
                margin: 16px;
                padding: 32px 24px 24px;
            }
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'ab_login_styles');

// Logo links to site homepage, not wordpress.org
function ab_login_url() {
    return home_url('/');
}
add_filter('login_headerurl', 'ab_login_url');

function ab_login_title() {
    return get_bloginfo('name');
}
add_filter('login_headertext', 'ab_login_title');

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

// ── Custom new-user email for approved buyers ──
function ab_custom_new_user_email($wp_new_user_notification_email, $user, $blogname) {
    $set_password_url = network_site_url('wp-login.php?action=rp&key=' . get_password_reset_key($user) . '&login=' . rawurlencode($user->user_login), 'login');
    $shop_url = home_url('/shop/');
    $first_name = $user->first_name ?: $user->display_name;

    $message = "Hi {$first_name},\n\n";
    $message .= "Your ARC Biologics account has been created. You're now approved to purchase from our full catalog of research-grade peptide compounds.\n\n";
    $message .= "SET YOUR PASSWORD\n";
    $message .= "{$set_password_url}\n\n";
    $message .= "Once you've set your password, you can log in and start shopping:\n";
    $message .= "{$shop_url}\n\n";
    $message .= "If you have any questions, reply to this email.\n\n";
    $message .= "— ARC Biologics";

    $wp_new_user_notification_email['subject'] = 'Your ARC Biologics Account Is Ready';
    $wp_new_user_notification_email['message'] = $message;
    $wp_new_user_notification_email['headers'] = 'From: ARC Biologics <noreply@arcbiologics.com>';

    return $wp_new_user_notification_email;
}
add_filter('wp_new_user_notification_email', 'ab_custom_new_user_email', 10, 3);

// ── Replace instant logout nav item with a confirmation page ──
function ab_logout_endpoint_content() {
    $logout_url = wp_logout_url(home_url('/'));
    echo '<div class="ab-logout-section">';
    echo '<h2>Log Out</h2>';
    echo '<p>Are you sure you want to log out of your account?</p>';
    echo '<a href="' . esc_url($logout_url) . '" class="ab-btn ab-btn-primary">Log Out</a>';
    echo '</div>';
}
add_action('woocommerce_account_customer-logout_endpoint', 'ab_logout_endpoint_content');

function ab_custom_logout_endpoint($items) {
    // Change logout link to point to a page instead of instant logout
    if (isset($items['customer-logout'])) {
        $items['customer-logout'] = $items['customer-logout'];
    }
    return $items;
}

function ab_register_logout_endpoint() {
    add_rewrite_endpoint('customer-logout', EP_ROOT | EP_PAGES);
}
add_action('init', 'ab_register_logout_endpoint');

function ab_logout_query_vars($vars) {
    $vars[] = 'customer-logout';
    return $vars;
}
add_filter('query_vars', 'ab_logout_query_vars');

// Override WC logout nav to use our endpoint instead of wp_logout_url
function ab_account_menu_items($items) {
    if (isset($items['customer-logout'])) {
        $items['customer-logout'] = 'Log Out';
    }
    return $items;
}
add_filter('woocommerce_account_menu_items', 'ab_account_menu_items');

function ab_logout_nav_url($endpoint_url, $endpoint) {
    if ($endpoint === 'customer-logout') {
        return wc_get_account_endpoint_url('customer-logout');
    }
    return $endpoint_url;
}
add_filter('woocommerce_get_endpoint_url', 'ab_logout_nav_url', 10, 2);

// ── Always remember me on login ──
function ab_always_remember_me() {
    add_filter('login_footer', function() {
        echo '<script>
            (function() {
                var rm = document.getElementById("rememberme");
                if (rm) { rm.checked = true; rm.closest("p.forgetmenot").style.display = "none"; }
            })();
        </script>';
    });
}
add_action('login_init', 'ab_always_remember_me');

// Also force the remember me value server-side
function ab_force_remember_me($value) {
    return true;
}
add_filter('send_auth_cookies', function($send, $expire, $expiration, $user_id, $scheme, $token) {
    // Extend cookie to 14 days (same as "remember me" checked)
    return $send;
}, 10, 6);

// Set rememberme to true before authentication
function ab_set_rememberme() {
    if (!empty($_POST['log'])) {
        $_POST['rememberme'] = 1;
    }
}
add_action('login_init', 'ab_set_rememberme');

// ── Hide page title on My Account pages ──
function ab_hide_account_title($title) {
    if (is_account_page()) {
        return false;
    }
    return $title;
}
add_filter('woocommerce_show_page_title', 'ab_hide_account_title');

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
