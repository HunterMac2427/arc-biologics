<?php
/*
 * Template Name: Waiver Complete
 */
get_header();
?>

  <section class="ab-shop-hero">
    <div class="ab-container">
      <h1 class="ab-hero-heading">
        <span class="ab-heading-light">You're</span>
        <span class="ab-heading-bold ab-gradient-text">Approved.</span>
      </h1>
      <p class="ab-hero-sub">Your research waiver has been received. Your account is being created now.</p>
    </div>
  </section>

  <section class="ab-section ab-section-dark">
    <div class="ab-container">
      <div class="ab-waiver-complete">

        <div class="ab-complete-steps">
          <div class="ab-complete-step">
            <div class="ab-complete-step-num ab-complete-step-done">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div>
              <h4>Waiver Submitted</h4>
              <p>Your research waiver has been received and verified.</p>
            </div>
          </div>

          <div class="ab-complete-step">
            <div class="ab-complete-step-num">2</div>
            <div>
              <h4>Check Your Email</h4>
              <p>We're sending your login credentials now. Look for an email from ARC Biologics with a link to set your password. Check spam if you don't see it within a few minutes.</p>
            </div>
          </div>

          <div class="ab-complete-step">
            <div class="ab-complete-step-num">3</div>
            <div>
              <h4>Log In & Shop</h4>
              <p>Once you set your password, you'll have full access to our catalog. Add compounds to your cart and checkout.</p>
            </div>
          </div>
        </div>

        <div class="ab-complete-actions">
          <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="ab-btn ab-btn-primary ab-btn-lg">Browse Compounds</a>
          <a href="<?php echo esc_url(wp_login_url(home_url('/shop/'))); ?>" class="ab-btn ab-btn-outline ab-btn-lg">Log In</a>
        </div>

      </div>
    </div>
  </section>

<?php get_footer(); ?>
