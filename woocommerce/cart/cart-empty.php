<?php
/**
 * Empty Cart — ARC Biologics
 */
defined('ABSPATH') || exit;

// Show any WC notices (e.g. "item removed")
if (function_exists('wc_print_notices')) {
    wc_print_notices();
}
?>

<div class="ab-empty-cart">
  <h2>Your cart is empty.</h2>
  <p>Browse our catalog and add research compounds to get started.</p>
  <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="ab-btn ab-btn-primary">Browse Compounds</a>
</div>

<?php $shop_url = wc_get_page_permalink('shop'); ?>
<div class="ab-empty-cart-categories">
  <div class="ab-section-header" style="text-align:center; margin-bottom:40px;">
    <p class="ab-label">Browse by Application</p>
    <h2>Research Topics</h2>
    <p class="ab-subtitle">Navigate our catalog by therapeutic or biological focus area.</p>
  </div>

  <div class="ab-categories-grid">
    <a href="<?php echo esc_url($shop_url); ?>" class="ab-category-card" data-category="recovery">
      <div class="ab-category-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
      </div>
      <h4>Recovery &amp; Healing</h4>
      <p>Tissue repair, wound healing, and inflammation support peptides.</p>
    </a>

    <a href="<?php echo esc_url($shop_url); ?>" class="ab-category-card" data-category="cognitive">
      <div class="ab-category-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a8 8 0 0 0-8 8c0 6 8 12 8 12s8-6 8-12a8 8 0 0 0-8-8z"/><circle cx="12" cy="10" r="3"/></svg>
      </div>
      <h4>Cognitive &amp; Neuro</h4>
      <p>Neuroprotective and cognitive enhancement research compounds.</p>
    </a>

    <a href="<?php echo esc_url($shop_url); ?>" class="ab-category-card" data-category="antiaging">
      <div class="ab-category-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
      </div>
      <h4>Anti-Aging &amp; Longevity</h4>
      <p>Cellular repair, telomere support, and longevity-focused peptides.</p>
    </a>

    <a href="<?php echo esc_url($shop_url); ?>" class="ab-category-card" data-category="bodycomp">
      <div class="ab-category-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 18L18 6M8 6h10v10"/></svg>
      </div>
      <h4>Body Composition</h4>
      <p>Metabolic optimization, fat loss, and body recomposition peptides.</p>
    </a>

    <a href="<?php echo esc_url($shop_url); ?>" class="ab-category-card" data-category="blends">
      <div class="ab-category-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="12" r="6"/><circle cx="16" cy="12" r="6"/></svg>
      </div>
      <h4>Blends &amp; Stacks</h4>
      <p>Multi-compound formulations for synergistic research applications.</p>
    </a>

    <a href="<?php echo esc_url($shop_url); ?>" class="ab-category-card" data-category="performance">
      <div class="ab-category-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
      </div>
      <h4>Performance</h4>
      <p>Endurance, muscle growth, and physical performance peptides.</p>
    </a>
  </div>
</div>
