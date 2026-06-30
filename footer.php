  <!-- ======== FOOTER ======== -->
  <footer class="ab-footer">
    <div class="ab-container">
      <div class="ab-footer-grid">
        <div class="ab-footer-brand">
          <?php
          if (has_custom_logo()) {
              the_custom_logo();
          } else {
              echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/logo.png" alt="' . esc_attr(get_bloginfo('name')) . '">';
          }
          ?>
          <p>Premium peptide compounds sourced from trusted U.S. suppliers. Quality, transparency, reliability.</p>
        </div>
        <div class="ab-footer-col">
          <h5>Shop</h5>
          <a href="/shop/#recovery">Recovery &amp; Healing</a>
          <a href="/shop/#cognitive">Cognitive &amp; Neuro</a>
          <a href="/shop/#antiaging">Anti-Aging &amp; Longevity</a>
        </div>
        <div class="ab-footer-col">
          <h5>&nbsp;</h5>
          <a href="/shop/#bodycomp">Body Composition</a>
          <a href="/shop/#blends">Blends &amp; Stacks</a>
          <a href="/shop/#performance">Performance</a>
        </div>
        <div class="ab-footer-col">
          <h5>Legal</h5>
          <a href="/privacy-policy">Privacy Policy</a>
          <a href="/terms">Terms of Service</a>
          <a href="/refund-policy">Refund Policy</a>
          <a href="/shipping-policy">Shipping Policy</a>
        </div>
      </div>
      <div class="ab-footer-bottom">
        <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</span>
        <span>Research use only. Not for human consumption.</span>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
