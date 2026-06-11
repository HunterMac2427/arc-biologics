<?php
/*
 * Template Name: Waiver
 */
get_header();
?>

  <section class="ab-shop-hero">
    <div class="ab-container">
      <p class="ab-label ab-label-decorated">Get Started</p>
      <h1 class="ab-hero-heading">
        <span class="ab-heading-light">Research</span>
        <span class="ab-heading-bold ab-gradient-text">Waiver.</span>
      </h1>
      <p class="ab-hero-sub">Complete this form to verify your research credentials and unlock access to our full catalog of peptide compounds.</p>
    </div>
  </section>

  <section class="ab-section ab-section-surface">
    <div class="ab-container">
      <div class="ab-waiver-form-wrap">
        <?php
        // Replace FORM_ID with your actual Jotform form ID
        // Example: 241234567890
        $jotform_id = get_option('ab_jotform_id', '');
        if ($jotform_id) :
        ?>
          <script type="text/javascript" src="https://form.jotform.com/jsform/<?php echo esc_attr($jotform_id); ?>"></script>
        <?php else : ?>
          <div class="ab-waiver-placeholder">
            <h3>Waiver Form</h3>
            <p>The research waiver form will appear here once configured.</p>
            <p class="ab-waiver-admin-note">Admin: Set the Jotform ID in WordPress options (key: <code>ab_jotform_id</code>)</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
