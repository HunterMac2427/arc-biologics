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

// ── Favicon ──
function ab_favicon() {
    $dir = get_template_directory_uri() . '/assets/images';
    echo '<link rel="icon" type="image/x-icon" href="' . esc_url($dir . '/favicon.ico') . '">' . "\n";
    echo '<link rel="icon" type="image/png" sizes="32x32" href="' . esc_url($dir . '/favicon-32.png') . '">' . "\n";
    echo '<link rel="icon" type="image/png" sizes="192x192" href="' . esc_url($dir . '/favicon-192.png') . '">' . "\n";
    echo '<link rel="apple-touch-icon" sizes="180x180" href="' . esc_url($dir . '/apple-touch-icon.png') . '">' . "\n";
}
add_action('wp_head', 'ab_favicon', 0);
add_action('login_head', 'ab_favicon', 0);

// ── SEO: Meta Tags + Open Graph ──
function ab_seo_meta() {
    $site_name = 'ARC Biologics';
    $default_img = get_template_directory_uri() . '/assets/images/og-share.png';

    if ( is_front_page() ) {
        $title = 'ARC Biologics — Professional-Grade Peptides';
        $desc  = 'ARC Biologics delivers professional-grade peptide compounds sourced from trusted U.S. suppliers. COA-verified, 99%+ purity, same-day shipping.';
    } elseif ( is_page('shop') || is_shop() ) {
        $title = 'Shop Peptide Compounds | ARC Biologics';
        $desc  = 'Browse our full catalog of professional-grade peptide compounds. Recovery, cognitive, anti-aging, body composition, and more.';
    } elseif ( is_singular('product') ) {
        $title = get_the_title() . ' | ARC Biologics';
        $desc  = get_the_excerpt() ?: 'Professional-grade peptide compound from ARC Biologics. COA-verified, sourced from trusted U.S. suppliers.';
        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
        if ($thumb) $default_img = $thumb;
    } elseif ( is_page('waiver') ) {
        $title = 'Create Account | ARC Biologics';
        $desc  = 'Create your ARC Biologics account to browse and purchase professional-grade peptide compounds. Quick signup with instant access.';
    } elseif ( is_page('quality') ) {
        $title = 'Quality & Testing | ARC Biologics';
        $desc  = 'Every ARC Biologics peptide passes three testing checkpoints: Certificate of Authenticity, sterility testing, and mycotoxin screening. Every batch, every time.';
    } elseif ( is_page('calculator') ) {
        $title = 'Peptide Dosing Calculator | ARC Biologics';
        $desc  = 'Calculate your peptide reconstitution and dosing with our free dosing calculator. Enter dose, vial strength, and water volume for precise measurements.';
    } elseif ( is_page('cart') || is_cart() ) {
        $title = 'Shopping Cart | ARC Biologics';
        $desc  = 'Review your peptide order before checkout. Professional-grade compounds from ARC Biologics.';
    } elseif ( is_page('checkout') || is_checkout() ) {
        $title = 'Checkout | ARC Biologics';
        $desc  = 'Complete your ARC Biologics order. Secure checkout with eCheck, Cash App, and Zelle payment options.';
    } elseif ( is_account_page() ) {
        $title = 'My Account | ARC Biologics';
        $desc  = 'Manage your ARC Biologics account, view order history, and update your shipping information.';
    } elseif ( is_page('privacy-policy') ) {
        $title = 'Privacy Policy | ARC Biologics';
        $desc  = 'How ARC Biologics collects, uses, and protects your personal information.';
    } elseif ( is_page('terms-of-service') || is_page('terms') ) {
        $title = 'Terms of Service | ARC Biologics';
        $desc  = 'Terms and conditions governing the purchase and use of ARC Biologics peptide compounds.';
    } elseif ( is_page('refund-policy') || is_page('refunds') ) {
        $title = 'Refund Policy | ARC Biologics';
        $desc  = 'ARC Biologics refund and return policy for peptide compound orders.';
    } elseif ( is_page('shipping-policy') || is_page('shipping') ) {
        $title = 'Shipping Policy | ARC Biologics';
        $desc  = 'ARC Biologics shipping rates, delivery times, and handling procedures for peptide compounds.';
    } elseif ( is_home() ) {
        $title = 'Research Library | ARC Biologics';
        $desc  = 'In-depth guides on peptide science, mechanisms of action, and the latest compound research from ARC Biologics.';
    } elseif ( is_singular('post') ) {
        $title = get_the_title() . ' | ARC Biologics';
        $desc  = get_the_excerpt() ?: 'Peptide research and science from ARC Biologics.';
        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
        if ($thumb) $default_img = $thumb;
    } else {
        $title = get_the_title() . ' | ARC Biologics';
        $desc  = 'Professional-grade peptide compounds from ARC Biologics. Sourced from trusted U.S. suppliers.';
    }

    echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:locale" content="en_US">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url(home_url($_SERVER['REQUEST_URI'])) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($default_img) . '">' . "\n";
    echo '<meta property="og:image:width" content="1200">' . "\n";
    echo '<meta property="og:image:height" content="630">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url($default_img) . '">' . "\n";
    echo '<link rel="canonical" href="' . esc_url(home_url($_SERVER['REQUEST_URI'])) . '">' . "\n";
}
add_action('wp_head', 'ab_seo_meta', 1);

// ── Override WordPress title for social sharing ──
function ab_document_title( $title ) {
    if ( is_front_page() ) {
        return 'ARC Biologics — Professional-Grade Peptides';
    }
    return $title;
}
add_filter('pre_get_document_title', 'ab_document_title');

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
        #login form .submit,
        #login .message,
        #login .success,
        #login p.message,
        .login .message,
        .login p {
            background: transparent !important;
            color: rgba(255,255,255,0.5) !important;
            border: none !important;
            box-shadow: none !important;
            font-family: 'Inter', sans-serif !important;
            font-size: 13px !important;
            padding: 0 !important;
            margin-bottom: 16px !important;
        }

        /* Re-style the info message box (lost password instructions) */
        #login .message {
            background: rgba(11,143,104,0.08) !important;
            border: 1px solid rgba(11,143,104,0.2) !important;
            border-radius: 10px !important;
            padding: 12px 16px !important;
            color: rgba(255,255,255,0.6) !important;
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

        /* ── Create Account CTA ── */
        .ab-login-register {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid rgba(255,255,255,0.06);
        }

        .ab-login-register p {
            font-size: 13px !important;
            color: rgba(255,255,255,0.35) !important;
            margin-bottom: 14px !important;
        }

        .ab-login-register-btn,
        .ab-login-register-btn:link,
        .ab-login-register-btn:visited {
            display: block !important;
            width: 100% !important;
            padding: 13px 24px !important;
            margin: 0 !important;
            background: linear-gradient(135deg, #0B8F68, #087B5A) !important;
            border: none !important;
            border-radius: 10px !important;
            outline: none !important;
            color: #fff !important;
            font-family: 'Outfit', sans-serif !important;
            font-size: 14px !important;
            font-weight: 600 !important;
            letter-spacing: 0.02em !important;
            text-align: center !important;
            text-decoration: none !important;
            text-shadow: none !important;
            cursor: pointer !important;
            box-sizing: border-box !important;
            line-height: 1.4 !important;
            transition: box-shadow 0.2s, transform 0.2s !important;
        }

        .ab-login-register-btn:hover,
        .ab-login-register-btn:focus {
            color: #fff !important;
            background: linear-gradient(135deg, #0B8F68, #087B5A) !important;
            box-shadow: 0 10px 25px rgba(11,143,104,0.3) !important;
            transform: translateY(-1px);
            text-decoration: none !important;
            outline: none !important;
            border: none !important;
        }

        .ab-login-register-btn:active {
            transform: translateY(0) !important;
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

// ── Add "Shop" link to primary nav ──
function ab_add_shop_nav_item($items, $args) {
    if ($args->theme_location === 'primary') {
        $shop_url = esc_url(wc_get_page_permalink('shop'));
        $items = '<li class="menu-item"><a href="' . $shop_url . '">Shop</a></li>' . $items;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'ab_add_shop_nav_item', 10, 2);

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

// ── Product Gating: Redirect non-logged-in users from product pages ──
function ab_is_approved_buyer() {
    if (!is_user_logged_in()) return false;
    $user = wp_get_current_user();
    return in_array('approved_buyer', $user->roles) || in_array('administrator', $user->roles);
}

function ab_product_login_redirect() {
    if (is_singular('product') && !is_user_logged_in()) {
        $redirect_url = get_permalink();
        wp_redirect(home_url('/waiver/?redirect_to=' . urlencode($redirect_url)));
        exit;
    }
}
add_action('template_redirect', 'ab_product_login_redirect');

// Block add-to-cart for non-logged-in users (safety net)
function ab_block_add_to_cart($purchasable, $product) {
    if (!is_user_logged_in()) return false;
    return $purchasable;
}
add_filter('woocommerce_is_purchasable', 'ab_block_add_to_cart', 10, 2);

// ── Registration Form Handler ──
function ab_handle_registration() {
    if (!isset($_POST['ab_register_nonce']) || !wp_verify_nonce($_POST['ab_register_nonce'], 'ab_register')) {
        return;
    }

    $errors = [];

    // Sanitize inputs
    $first_name = sanitize_text_field($_POST['ab_first_name'] ?? '');
    $last_name  = sanitize_text_field($_POST['ab_last_name'] ?? '');
    $email      = sanitize_email($_POST['ab_email'] ?? '');
    $phone      = sanitize_text_field($_POST['ab_phone'] ?? '');
    $dob        = sanitize_text_field($_POST['ab_dob'] ?? '');
    $address_1  = sanitize_text_field($_POST['ab_address_1'] ?? '');
    $address_2  = sanitize_text_field($_POST['ab_address_2'] ?? '');
    $city       = sanitize_text_field($_POST['ab_city'] ?? '');
    $state      = sanitize_text_field($_POST['ab_state'] ?? '');
    $zip        = sanitize_text_field($_POST['ab_zip'] ?? '');
    $check_age  = isset($_POST['ab_check_age']);
    $check_research = isset($_POST['ab_check_research']);
    $check_risk = isset($_POST['ab_check_risk']);
    $redirect_to = esc_url_raw($_POST['ab_redirect_to'] ?? home_url('/shop/'));

    // Validate required fields
    if (empty($first_name)) $errors[] = 'First name is required.';
    if (empty($last_name)) $errors[] = 'Last name is required.';
    if (empty($email) || !is_email($email)) $errors[] = 'A valid email address is required.';
    if (empty($phone)) $errors[] = 'Phone number is required.';
    if (empty($dob)) $errors[] = 'Date of birth is required.';
    if (empty($address_1)) $errors[] = 'Street address is required.';
    if (empty($city)) $errors[] = 'City is required.';
    if (empty($state)) $errors[] = 'State is required.';
    if (empty($zip)) $errors[] = 'ZIP code is required.';
    if (!$check_age) $errors[] = 'You must confirm you are 18 or older.';
    if (!$check_research) $errors[] = 'You must acknowledge the research use policy.';
    if (!$check_risk) $errors[] = 'You must acknowledge the risk disclaimer.';

    // Validate age
    if (!empty($dob)) {
        $dob_date = DateTime::createFromFormat('Y-m-d', $dob);
        if (!$dob_date) {
            $errors[] = 'Invalid date of birth format.';
        } else {
            $age = $dob_date->diff(new DateTime())->y;
            if ($age < 18) {
                $errors[] = 'You must be 18 or older to create an account.';
            }
        }
    }

    // Validate ZIP
    if (!empty($zip) && !preg_match('/^\d{5}$/', $zip)) {
        $errors[] = 'ZIP code must be 5 digits.';
    }

    // Check if email already exists
    if (email_exists($email)) {
        $errors[] = 'An account with this email already exists. <a href="' . esc_url(wp_login_url($redirect_to)) . '">Log in instead?</a>';
    }

    // Store errors in transient so the form can display them
    if (!empty($errors)) {
        set_transient('ab_reg_errors', $errors, 60);
        set_transient('ab_reg_form_data', $_POST, 60);
        wp_redirect(home_url('/waiver/' . ($redirect_to !== home_url('/shop/') ? '?redirect_to=' . urlencode($redirect_to) : '')));
        exit;
    }

    // Create user
    $username = sanitize_user(strtolower($first_name . '.' . $last_name));
    if (username_exists($username)) {
        $username = $username . '_' . wp_rand(100, 999);
    }

    $password = wp_generate_password(16, true, true);
    $user_id = wp_create_user($username, $password, $email);

    if (is_wp_error($user_id)) {
        set_transient('ab_reg_errors', [$user_id->get_error_message()], 60);
        wp_redirect(home_url('/waiver/'));
        exit;
    }

    // Set role and user data
    wp_update_user([
        'ID'         => $user_id,
        'first_name' => $first_name,
        'last_name'  => $last_name,
        'role'       => 'approved_buyer',
    ]);

    // Save WooCommerce shipping fields (primary — auto-fills checkout)
    update_user_meta($user_id, 'shipping_first_name', $first_name);
    update_user_meta($user_id, 'shipping_last_name', $last_name);
    update_user_meta($user_id, 'shipping_address_1', $address_1);
    update_user_meta($user_id, 'shipping_address_2', $address_2);
    update_user_meta($user_id, 'shipping_city', $city);
    update_user_meta($user_id, 'shipping_state', $state);
    update_user_meta($user_id, 'shipping_postcode', $zip);
    update_user_meta($user_id, 'shipping_country', 'US');

    // Also save to billing (default same as shipping)
    update_user_meta($user_id, 'billing_first_name', $first_name);
    update_user_meta($user_id, 'billing_last_name', $last_name);
    update_user_meta($user_id, 'billing_email', $email);
    update_user_meta($user_id, 'billing_phone', $phone);
    update_user_meta($user_id, 'billing_address_1', $address_1);
    update_user_meta($user_id, 'billing_address_2', $address_2);
    update_user_meta($user_id, 'billing_city', $city);
    update_user_meta($user_id, 'billing_state', $state);
    update_user_meta($user_id, 'billing_postcode', $zip);
    update_user_meta($user_id, 'billing_country', 'US');

    // Save custom meta
    update_user_meta($user_id, 'ab_phone', $phone);
    update_user_meta($user_id, 'ab_dob', $dob);
    update_user_meta($user_id, 'ab_consent_age', current_time('mysql'));
    update_user_meta($user_id, 'ab_consent_research', current_time('mysql'));
    update_user_meta($user_id, 'ab_consent_risk', current_time('mysql'));

    // Send password reset email so user can set their password
    wp_new_user_notification($user_id, null, 'user');

    // Auto-login
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id, true);

    // Redirect
    wp_redirect($redirect_to);
    exit;
}
add_action('init', 'ab_handle_registration');

// ── Custom new-user email for approved buyers ──
function ab_custom_new_user_email($wp_new_user_notification_email, $user, $blogname) {
    $set_password_url = network_site_url('wp-login.php?action=rp&key=' . get_password_reset_key($user) . '&login=' . rawurlencode($user->user_login), 'login');
    $shop_url = home_url('/shop/');
    $first_name = $user->first_name ?: $user->display_name;

    $message = "Hi {$first_name},\n\n";
    $message .= "Your ARC Biologics account has been created. You're now approved to purchase from our full catalog of professional-grade peptide compounds.\n\n";
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

// ── Customize account menu: remove Dashboard & Downloads, reorder ──
function ab_account_menu_items($items) {
    unset($items['dashboard']);
    unset($items['downloads']);
    if (isset($items['customer-logout'])) {
        $items['customer-logout'] = 'Log Out';
    }
    return $items;
}
add_filter('woocommerce_account_menu_items', 'ab_account_menu_items');

// Make Orders the default account page (redirect /my-account/ to /my-account/orders/)
function ab_default_account_to_orders() {
    if (is_account_page() && !is_wc_endpoint_url() && !isset($_GET['ab-confirm-logout'])) {
        wp_safe_redirect(wc_get_account_endpoint_url('orders'));
        exit;
    }
}
add_action('template_redirect', 'ab_default_account_to_orders');

// Override the logout URL in the nav to go to confirm page
function ab_logout_url_override($endpoint_url, $endpoint) {
    if ($endpoint === 'customer-logout') {
        return wc_get_account_endpoint_url('orders') . '?ab-confirm-logout=1';
    }
    return $endpoint_url;
}
add_filter('woocommerce_get_endpoint_url', 'ab_logout_url_override', 10, 2);

// Show logout confirmation when ?ab-confirm-logout=1 (override page content)
function ab_logout_confirmation_override() {
    if (is_account_page() && isset($_GET['ab-confirm-logout'])) {
        $logout_url = wp_logout_url(home_url('/'));
        echo '<div class="ab-logout-section">';
        echo '<p>Are you sure you want to log out of your account?</p>';
        echo '<a href="' . esc_url($logout_url) . '" class="ab-btn ab-btn-primary" style="color:#fff;">Log Out</a>';
        echo '</div>';
        echo '<style>';
        // Hide normal page content behind the logout prompt
        echo '.woocommerce-MyAccount-content > *:not(.ab-logout-section) { display: none !important; }';
        // Highlight the Log Out tab instead of Orders
        echo '.woocommerce-MyAccount-navigation ul li.is-active a { color: rgba(255,255,255,0.35); border-bottom-color: transparent; }';
        echo '.woocommerce-MyAccount-navigation ul li:last-child a { color: #fff !important; border-bottom-color: var(--ab-teal) !important; }';
        echo '</style>';
    }
}
add_action('woocommerce_before_account_orders', 'ab_logout_confirmation_override', 1);

// ── Always remember me on login ──
// Extend auth cookie to 14 days always (no need to modify $_POST)
function ab_extend_auth_cookie($expiration, $user_id, $remember) {
    return 14 * DAY_IN_SECONDS;
}
add_filter('auth_cookie_expiration', 'ab_extend_auth_cookie', 10, 3);

// Force remember-me checked via the authenticate filter (only fires on real login)
function ab_force_rememberme($user, $username, $password) {
    if (!empty($username)) {
        $_POST['rememberme'] = 1;
    }
    return $user;
}
add_filter('authenticate', 'ab_force_rememberme', 5, 3);

// Hide remember me checkbox on wp-login.php
function ab_hide_rememberme() {
    echo '<script>document.addEventListener("DOMContentLoaded",function(){var r=document.getElementById("rememberme");if(r){r.checked=true;var p=r.closest(".forgetmenot");if(p)p.style.display="none";}});</script>';
}
add_action('login_footer', 'ab_hide_rememberme');

// ── Clean login page: suppress errors & shake on fresh visits ──
function ab_clean_login_page() {
    // Remove errors and shake on fresh page load (GET request, no form submission)
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo '<style>#login_error, .login .message.error { display: none !important; } #login.shake { animation: none !important; }</style>';
        echo '<script>document.addEventListener("DOMContentLoaded",function(){var e=document.getElementById("login_error");if(e)e.remove();var l=document.getElementById("login");if(l)l.classList.remove("shake");});</script>';
    }
}
add_action('login_footer', 'ab_clean_login_page');

// "Create Account" CTA below login form (injected into #login container via JS)
function ab_login_create_account() {
    $register_url = esc_url(home_url('/waiver/'));
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var login = document.getElementById('login');
        if (!login) return;
        var action = new URLSearchParams(window.location.search).get('action');
        if (action && action !== 'login') return;
        var div = document.createElement('div');
        div.className = 'ab-login-register';
        div.innerHTML = '<p>Don\'t have an account?</p><a href="<?php echo $register_url; ?>" class="ab-login-register-btn">Create an Account</a>';
        login.appendChild(div);
    });
    </script>
    <?php
}
add_action('login_footer', 'ab_login_create_account');

// ── Hide page title on My Account pages ──
function ab_hide_account_title($title) {
    if (is_account_page()) {
        return false;
    }
    return $title;
}
add_filter('woocommerce_show_page_title', 'ab_hide_account_title');

// Also hide WC endpoint titles (Orders, Addresses, etc.)
function ab_hide_endpoint_title($title, $endpoint) {
    return '';
}
add_filter('woocommerce_endpoint_orders_title', 'ab_hide_endpoint_title', 10, 2);
add_filter('woocommerce_endpoint_edit-address_title', 'ab_hide_endpoint_title', 10, 2);
add_filter('woocommerce_endpoint_edit-account_title', 'ab_hide_endpoint_title', 10, 2);

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

// ── Checkout: Shipping First, Billing with "Same as Shipping" ──

// Reorder checkout: shipping fields above billing
function ab_checkout_shipping_first($fields) {
    // Set shipping field priorities lower (shown first)
    if (isset($fields['shipping'])) {
        foreach ($fields['shipping'] as $key => &$field) {
            if (isset($field['priority'])) {
                $field['priority'] = $field['priority'];
            }
        }
    }
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'ab_checkout_shipping_first');

// Output "Same as Shipping Address" checkbox before billing fields
function ab_same_as_shipping_checkbox() {
    ?>
    <div class="ab-same-as-shipping">
        <label class="ab-same-as-shipping-label">
            <input type="checkbox" id="ab_same_as_shipping" checked>
            <span>Billing address is the same as shipping address</span>
        </label>
    </div>
    <script>
    (function() {
        var cb = document.getElementById('ab_same_as_shipping');
        if (!cb) return;
        var billingFields = document.querySelector('.woocommerce-billing-fields__field-wrapper');
        if (!billingFields) return;

        function toggle() {
            billingFields.style.display = cb.checked ? 'none' : '';
            if (cb.checked) {
                // Copy shipping values to billing
                var map = {
                    'shipping_first_name': 'billing_first_name',
                    'shipping_last_name': 'billing_last_name',
                    'shipping_address_1': 'billing_address_1',
                    'shipping_address_2': 'billing_address_2',
                    'shipping_city': 'billing_city',
                    'shipping_state': 'billing_state',
                    'shipping_postcode': 'billing_postcode',
                    'shipping_country': 'billing_country'
                };
                for (var s in map) {
                    var sf = document.getElementById(s);
                    var bf = document.getElementById(map[s]);
                    if (sf && bf) bf.value = sf.value;
                }
                // Trigger change events for select2/WC updates
                var selects = billingFields.querySelectorAll('select');
                selects.forEach(function(sel) { sel.dispatchEvent(new Event('change', {bubbles:true})); });
            }
        }

        toggle();
        cb.addEventListener('change', toggle);

        // Also copy on form submit if checkbox is checked
        var form = document.querySelector('form.woocommerce-checkout');
        if (form) {
            form.addEventListener('submit', function() {
                if (cb.checked) {
                    var map = {
                        'shipping_first_name': 'billing_first_name',
                        'shipping_last_name': 'billing_last_name',
                        'shipping_address_1': 'billing_address_1',
                        'shipping_address_2': 'billing_address_2',
                        'shipping_city': 'billing_city',
                        'shipping_state': 'billing_state',
                        'shipping_postcode': 'billing_postcode',
                        'shipping_country': 'billing_country'
                    };
                    for (var s in map) {
                        var sf = document.getElementById(s);
                        var bf = document.getElementById(map[s]);
                        if (sf && bf) bf.value = sf.value;
                    }
                }
            });
        }
    })();
    </script>
    <?php
}
add_action('woocommerce_before_checkout_billing_form', 'ab_same_as_shipping_checkbox');

// Hide WooCommerce's default "Ship to a different address?" checkbox since we flipped the flow
function ab_ship_to_different_default($default) {
    return true; // Always show shipping fields
}
add_filter('woocommerce_ship_to_different_address_checked', 'ab_ship_to_different_default');

// ── Custom Payment Gateways: Cash App & Zelle ──
add_filter('woocommerce_payment_gateways', 'ab_add_custom_gateways');

function ab_add_custom_gateways($gateways) {
    $gateways[] = 'AB_Gateway_CashApp';
    $gateways[] = 'AB_Gateway_Zelle';
    return $gateways;
}

// Cash App Gateway
if (class_exists('WC_Payment_Gateway')) {
class AB_Gateway_CashApp extends WC_Payment_Gateway {
        public function __construct() {
            $this->id                 = 'ab_cashapp';
            $this->method_title       = 'Cash App';
            $this->method_description = 'Accept payments via Cash App. Customers send payment manually after checkout.';
            $this->has_fields         = false;
            $this->icon               = '';

            $this->init_form_fields();
            $this->init_settings();

            $this->title        = $this->get_option('title');
            $this->description  = $this->get_option('description');
            $this->instructions = $this->get_option('instructions');
            $this->cashtag      = $this->get_option('cashtag');

            add_action('woocommerce_update_options_payment_gateways_' . $this->id, [$this, 'process_admin_options']);
            add_action('woocommerce_thankyou_' . $this->id, [$this, 'thankyou_page']);
            add_action('ab_email_payment_instructions', [$this, 'email_instructions'], 10, 3);
        }

        public function init_form_fields() {
            $this->form_fields = [
                'enabled' => [
                    'title'   => 'Enable/Disable',
                    'type'    => 'checkbox',
                    'label'   => 'Enable Cash App payments',
                    'default' => 'no',
                ],
                'title' => [
                    'title'       => 'Title',
                    'type'        => 'text',
                    'description' => 'Payment method name shown at checkout.',
                    'default'     => 'Cash App',
                    'desc_tip'    => true,
                ],
                'description' => [
                    'title'       => 'Description',
                    'type'        => 'textarea',
                    'description' => 'Displayed when the customer selects this payment method.',
                    'default'     => 'Pay using Cash App. You will receive payment instructions after placing your order.',
                ],
                'cashtag' => [
                    'title'       => 'Cash Tag',
                    'type'        => 'text',
                    'description' => 'Your Cash App $cashtag (e.g. $ArcBiologics).',
                    'default'     => '',
                    'desc_tip'    => true,
                ],
                'instructions' => [
                    'title'       => 'Instructions',
                    'type'        => 'textarea',
                    'description' => 'Instructions shown on thank you page and order emails.',
                    'default'     => '',
                ],
            ];
        }

        public function process_payment($order_id) {
            $order = wc_get_order($order_id);
            $order->update_status('on-hold', 'Awaiting Cash App payment.');
            wc_reduce_stock_levels($order_id);
            WC()->cart->empty_cart();

            return [
                'result'   => 'success',
                'redirect' => $this->get_return_url($order),
            ];
        }

        public function thankyou_page($order_id) {
            $order = wc_get_order($order_id);
            $total = $order->get_total();
            $cashtag = $this->cashtag ?: '(not configured)';
            $order_num = $order->get_order_number();

            echo '<div class="ab-payment-instructions">';
            echo '<h3>Cash App Payment Instructions</h3>';
            echo '<div class="ab-payment-steps">';
            echo '<div class="ab-payment-step"><span class="ab-step-num">1</span><span>Open the <strong>Cash App</strong> on your phone</span></div>';
            echo '<div class="ab-payment-step"><span class="ab-step-num">2</span><span>Send <strong>$' . esc_html($total) . '</strong> to <strong>' . esc_html($cashtag) . '</strong></span></div>';
            echo '<div class="ab-payment-step"><span class="ab-step-num">3</span><span>Enter order <strong>#' . esc_html($order_num) . '</strong> in the payment note</span></div>';
            echo '</div>';
            echo '<p class="ab-payment-deadline">Payment must be received within <strong>48 hours</strong> or your order will be automatically cancelled.</p>';
            echo '<p class="ab-payment-support">Questions? Contact us at <a href="mailto:info@arcbiologics.com">info@arcbiologics.com</a></p>';
            echo '</div>';
        }

        public function email_instructions($order, $sent_to_admin, $plain_text = false) {
            if ($sent_to_admin || $order->get_payment_method() !== $this->id || $order->has_status('completed')) return;

            $total = $order->get_total();
            $cashtag = $this->cashtag ?: '(not configured)';
            $order_num = $order->get_order_number();

            if ($plain_text) {
                echo "\n\nCASH APP PAYMENT INSTRUCTIONS\n";
                echo "1. Open the Cash App on your phone\n";
                echo "2. Send \${$total} to {$cashtag}\n";
                echo "3. Enter order #{$order_num} in the payment note\n\n";
                echo "Payment must be received within 48 hours or your order will be automatically cancelled.\n";
                echo "Questions? Contact us at info@arcbiologics.com\n\n";
            } else {
                echo '<div style="margin-bottom: 24px; padding: 20px; background: #f8f8f8; border-radius: 10px; border-left: 4px solid #0B8F68; font-family: -apple-system, sans-serif;">';
                echo '<h3 style="margin: 0 0 16px; font-size: 18px; color: #1a1a1a;">Cash App Payment Instructions</h3>';
                echo '<table style="width: 100%; border-collapse: collapse;">';
                echo '<tr><td style="padding: 8px 12px 8px 0; color: #0B8F68; font-weight: 700; vertical-align: top; width: 24px;">1.</td><td style="padding: 8px 0;">Open the <strong>Cash App</strong> on your phone</td></tr>';
                echo '<tr><td style="padding: 8px 12px 8px 0; color: #0B8F68; font-weight: 700; vertical-align: top;">2.</td><td style="padding: 8px 0;">Send <strong>$' . esc_html($total) . '</strong> to <strong>' . esc_html($cashtag) . '</strong></td></tr>';
                echo '<tr><td style="padding: 8px 12px 8px 0; color: #0B8F68; font-weight: 700; vertical-align: top;">3.</td><td style="padding: 8px 0;">Enter order <strong>#' . esc_html($order_num) . '</strong> in the payment note</td></tr>';
                echo '</table>';
                echo '<p style="margin: 16px 0 0; padding-top: 12px; border-top: 1px solid #e0e0e0; font-size: 13px; color: #666;">Payment must be received within <strong>48 hours</strong> or your order will be automatically cancelled.</p>';
                echo '<p style="margin: 8px 0 0; font-size: 13px; color: #666;">Questions? Contact us at <a href="mailto:info@arcbiologics.com" style="color: #0B8F68;">info@arcbiologics.com</a></p>';
                echo '</div>';
            }
        }
    }

// Zelle Gateway
class AB_Gateway_Zelle extends WC_Payment_Gateway {
        public function __construct() {
            $this->id                 = 'ab_zelle';
            $this->method_title       = 'Zelle';
            $this->method_description = 'Accept payments via Zelle. Customers send payment manually after checkout.';
            $this->has_fields         = false;
            $this->icon               = '';

            $this->init_form_fields();
            $this->init_settings();

            $this->title          = $this->get_option('title');
            $this->description    = $this->get_option('description');
            $this->instructions   = $this->get_option('instructions');
            $this->zelle_contact  = $this->get_option('zelle_contact');

            add_action('woocommerce_update_options_payment_gateways_' . $this->id, [$this, 'process_admin_options']);
            add_action('woocommerce_thankyou_' . $this->id, [$this, 'thankyou_page']);
            add_action('ab_email_payment_instructions', [$this, 'email_instructions'], 10, 3);
        }

        public function init_form_fields() {
            $this->form_fields = [
                'enabled' => [
                    'title'   => 'Enable/Disable',
                    'type'    => 'checkbox',
                    'label'   => 'Enable Zelle payments',
                    'default' => 'no',
                ],
                'title' => [
                    'title'       => 'Title',
                    'type'        => 'text',
                    'description' => 'Payment method name shown at checkout.',
                    'default'     => 'Zelle',
                    'desc_tip'    => true,
                ],
                'description' => [
                    'title'       => 'Description',
                    'type'        => 'textarea',
                    'description' => 'Displayed when the customer selects this payment method.',
                    'default'     => 'Pay directly from your bank using Zelle. You will receive payment instructions after placing your order.',
                ],
                'zelle_contact' => [
                    'title'       => 'Zelle Email or Phone',
                    'type'        => 'text',
                    'description' => 'The email address or phone number registered with Zelle.',
                    'default'     => '',
                    'desc_tip'    => true,
                ],
                'instructions' => [
                    'title'       => 'Instructions',
                    'type'        => 'textarea',
                    'description' => 'Instructions shown on thank you page and order emails.',
                    'default'     => '',
                ],
            ];
        }

        public function process_payment($order_id) {
            $order = wc_get_order($order_id);
            $order->update_status('on-hold', 'Awaiting Zelle payment.');
            wc_reduce_stock_levels($order_id);
            WC()->cart->empty_cart();

            return [
                'result'   => 'success',
                'redirect' => $this->get_return_url($order),
            ];
        }

        public function thankyou_page($order_id) {
            $order = wc_get_order($order_id);
            $total = $order->get_total();
            $contact = $this->zelle_contact ?: '(not configured)';
            $order_num = $order->get_order_number();

            echo '<div class="ab-payment-instructions">';
            echo '<h3>Zelle Payment Instructions</h3>';
            echo '<div class="ab-payment-steps">';
            echo '<div class="ab-payment-step"><span class="ab-step-num">1</span><span>Open your banking app and navigate to <strong>Zelle</strong></span></div>';
            echo '<div class="ab-payment-step"><span class="ab-step-num">2</span><span>Send <strong>$' . esc_html($total) . '</strong> to <strong>' . esc_html($contact) . '</strong></span></div>';
            echo '<div class="ab-payment-step"><span class="ab-step-num">3</span><span>Verify the recipient shows as <strong>ARC Biologics LLC</strong></span></div>';
            echo '<div class="ab-payment-step"><span class="ab-step-num">4</span><span>Enter order <strong>#' . esc_html($order_num) . '</strong> in the memo field</span></div>';
            echo '</div>';
            echo '<p class="ab-payment-deadline">Payment must be received within <strong>48 hours</strong> or your order will be automatically cancelled.</p>';
            echo '<p class="ab-payment-support">Questions? Contact us at <a href="mailto:info@arcbiologics.com">info@arcbiologics.com</a></p>';
            echo '</div>';
        }

        public function email_instructions($order, $sent_to_admin, $plain_text = false) {
            if ($sent_to_admin || $order->get_payment_method() !== $this->id || $order->has_status('completed')) return;

            $total = $order->get_total();
            $contact = $this->zelle_contact ?: '(not configured)';
            $order_num = $order->get_order_number();

            if ($plain_text) {
                echo "\n\nZELLE PAYMENT INSTRUCTIONS\n";
                echo "1. Open your banking app and navigate to Zelle\n";
                echo "2. Send \${$total} to {$contact}\n";
                echo "3. Verify the recipient shows as ARC Biologics LLC\n";
                echo "4. Enter order #{$order_num} in the memo field\n\n";
                echo "Payment must be received within 48 hours or your order will be automatically cancelled.\n";
                echo "Questions? Contact us at info@arcbiologics.com\n\n";
            } else {
                echo '<div style="margin-bottom: 24px; padding: 20px; background: #f8f8f8; border-radius: 10px; border-left: 4px solid #0B8F68; font-family: -apple-system, sans-serif;">';
                echo '<h3 style="margin: 0 0 16px; font-size: 18px; color: #1a1a1a;">Zelle Payment Instructions</h3>';
                echo '<table style="width: 100%; border-collapse: collapse;">';
                echo '<tr><td style="padding: 8px 12px 8px 0; color: #0B8F68; font-weight: 700; vertical-align: top; width: 24px;">1.</td><td style="padding: 8px 0;">Open your banking app and navigate to <strong>Zelle</strong></td></tr>';
                echo '<tr><td style="padding: 8px 12px 8px 0; color: #0B8F68; font-weight: 700; vertical-align: top;">2.</td><td style="padding: 8px 0;">Send <strong>$' . esc_html($total) . '</strong> to <strong>' . esc_html($contact) . '</strong></td></tr>';
                echo '<tr><td style="padding: 8px 12px 8px 0; color: #0B8F68; font-weight: 700; vertical-align: top;">3.</td><td style="padding: 8px 0;">Verify the recipient shows as <strong>ARC Biologics LLC</strong></td></tr>';
                echo '<tr><td style="padding: 8px 12px 8px 0; color: #0B8F68; font-weight: 700; vertical-align: top;">4.</td><td style="padding: 8px 0;">Enter order <strong>#' . esc_html($order_num) . '</strong> in the memo field</td></tr>';
                echo '</table>';
                echo '<p style="margin: 16px 0 0; padding-top: 12px; border-top: 1px solid #e0e0e0; font-size: 13px; color: #666;">Payment must be received within <strong>48 hours</strong> or your order will be automatically cancelled.</p>';
                echo '<p style="margin: 8px 0 0; font-size: 13px; color: #666;">Questions? Contact us at <a href="mailto:info@arcbiologics.com" style="color: #0B8F68;">info@arcbiologics.com</a></p>';
                echo '</div>';
            }
        }
    }
} // end if class_exists WC_Payment_Gateway
