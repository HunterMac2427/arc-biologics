<?php
/**
 * My Account page — ARC Biologics
 * Overrides woocommerce/myaccount/my-account.php
 */
defined('ABSPATH') || exit;

$current_user = wp_get_current_user();
$first_name = $current_user->first_name ?: $current_user->display_name;
?>

<section class="ab-account-hero">
  <div class="ab-container">
    <p class="ab-label">Account Portal</p>
    <h1>Welcome back, <?php echo esc_html($first_name); ?>.</h1>
    <p class="ab-account-subtitle">Manage your orders, addresses, and account details.</p>
  </div>
</section>

<section class="ab-account-section">
  <div class="ab-container">
    <?php woocommerce_account_navigation(); ?>
    <div class="ab-account-content">
      <?php woocommerce_account_content(); ?>
    </div>
  </div>
</section>
