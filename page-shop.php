<?php
/*
 * Template Name: Shop
 */
get_header();

$img = get_template_directory_uri() . '/assets/images/';

$products = [
  ['name' => 'GHK-cu',                   'desc' => '100mg - 3ml',                          'price' => '$200', 'img' => 'ghkcu.png',           'badge' => '', 'cat' => 'antiaging'],
  ['name' => 'BPC-157',                   'desc' => '15mg - 3ml',                           'price' => '$250', 'img' => 'bpc157.png',          'badge' => '',     'cat' => 'recovery'],
  ['name' => 'BPC-157/TB4',               'desc' => '10/10mg - 3ml',                        'price' => '$320', 'img' => 'bpc157-tb500.png',    'badge' => '',            'cat' => 'recovery'],
  ['name' => 'GLOW',                      'desc' => 'BPC-157/GHK-cu/TB-500 — 10/70/10mg - 5ml', 'price' => '$390', 'img' => 'glow.png',       'badge' => '',       'cat' => 'blends'],
  ['name' => 'Duo Blend',                 'desc' => 'Tesa/Ipa - 3ml',                       'price' => '$240', 'img' => 'duoblend.png',        'badge' => '',     'cat' => 'blends'],
  ['name' => 'BPC-157/TB5/MGF/KPV',       'desc' => '5/2/1/2mg - 3ml',                     'price' => '$380', 'img' => 'bpc-tb5-mgf-kpv.png', 'badge' => '',       'cat' => 'blends'],
  ['name' => 'Mots-C',                    'desc' => '50mg - 5ml',                           'price' => '$340', 'img' => 'motsc.png',           'badge' => '',            'cat' => 'performance'],
  ['name' => 'Dihexa',                    'desc' => '10mg - 30 Tablets',                    'price' => '$290', 'img' => 'dihexa.png',          'badge' => '',            'cat' => 'cognitive'],
  ['name' => 'AOD 9604',                  'desc' => '5mg - 3ml',                            'price' => '$220', 'img' => 'aod9604.png',         'badge' => '',            'cat' => 'bodycomp'],
  ['name' => 'Triple G (Reta)',           'desc' => '15mg - 3ml',                           'price' => '$680', 'img' => 'tripleg.png',         'badge' => '',     'cat' => 'bodycomp'],
  ['name' => 'Ibutamoren (MK-677)',       'desc' => '25mg - 30 Tablets',                    'price' => '$310', 'img' => 'ibutamoren.png',      'badge' => '',            'cat' => 'bodycomp'],
  ['name' => 'Selank',                    'desc' => '11mg - 3ml',                           'price' => '$160', 'img' => 'selank.png',          'badge' => '',            'cat' => 'cognitive'],
  ['name' => 'Semax',                     'desc' => '11mg - 3ml',                           'price' => '$120', 'img' => 'semax.png',           'badge' => '',            'cat' => 'cognitive'],
  ['name' => 'DSIP',                      'desc' => '5mg - 3ml',                            'price' => '$260', 'img' => 'dsip.png',            'badge' => '',            'cat' => 'cognitive'],
  ['name' => 'TB-500',                    'desc' => '10mg - 3ml',                           'price' => '$250', 'img' => 'tb500.png',           'badge' => '',            'cat' => 'recovery'],
  ['name' => 'NAD+',                      'desc' => '1000mg - 10ml',                        'price' => '$200', 'img' => 'nad.png',             'badge' => '',            'cat' => 'antiaging'],
  ['name' => 'Epithalon',                 'desc' => '50mg - 3ml',                           'price' => '$220', 'img' => 'epithalon.png',       'badge' => '',            'cat' => 'antiaging'],
  ['name' => 'SS-31',                     'desc' => '10mg - 3ml',                           'price' => '$190', 'img' => 'ss31.png',            'badge' => '',            'cat' => 'antiaging'],
  ['name' => 'Thymosin Alpha 1',          'desc' => '10mg - 3ml',                           'price' => '$270', 'img' => 'thymosin-alpha1.png', 'badge' => '',            'cat' => 'antiaging'],
  ['name' => 'NAD+/BDNF/Alpha GPC',      'desc' => '100/10/100mg - 3ml',                   'price' => '$440', 'img' => 'nad-bdnf-agpc.png',   'badge' => '',       'cat' => 'antiaging'],
  ['name' => 'SLU-PP-332',               'desc' => '0.25mg - 60 Tablets',                  'price' => '$300', 'img' => 'slupp332.png',        'badge' => '',            'cat' => 'bodycomp'],
  ['name' => 'IGF-1/LR3',                'desc' => '1mg - 3ml',                            'price' => '$550', 'img' => 'igf1lr3.png',         'badge' => '',            'cat' => 'performance'],
  ['name' => 'Follistatin 344',           'desc' => '1mg - 3ml',                            'price' => '$650', 'img' => 'follistatin344.png',  'badge' => '',            'cat' => 'performance'],
];

$categories = [
  'all'         => 'All Compounds',
  'recovery'    => 'Recovery & Healing',
  'cognitive'   => 'Cognitive & Neuro',
  'antiaging'   => 'Anti-Aging',
  'bodycomp'    => 'Body Composition',
  'blends'      => 'Blends & Stacks',
  'performance' => 'Performance',
];
?>

  <!-- ======== SHOP HERO ======== -->
  <section class="ab-shop-hero">
    <div class="ab-container">
      <p class="ab-label ab-label-decorated">Our Catalog</p>
      <h1 class="ab-hero-heading">
        <span class="ab-heading-light">Research</span>
        <span class="ab-heading-bold ab-gradient-text">Compounds.</span>
      </h1>
      <p class="ab-hero-sub">Browse our full catalog of 20+ peptide compounds. All products sourced from trusted U.S. suppliers.</p>
    </div>
  </section>

  <!-- ======== FILTER TABS ======== -->
  <section class="ab-section ab-section-surface ab-shop-section">
    <div class="ab-container">

      <div class="ab-filter-bar">
        <?php foreach ($categories as $key => $label) : ?>
          <button class="ab-filter-tab<?php echo $key === 'all' ? ' active' : ''; ?>" data-filter="<?php echo esc_attr($key); ?>">
            <?php echo esc_html($label); ?>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- ======== PRODUCT GRID ======== -->
      <div class="ab-shop-grid" id="ab-shop-grid">
        <?php foreach ($products as $p) : ?>
          <div class="ab-product-card" data-cat="<?php echo esc_attr($p['cat']); ?>">
            <div class="ab-product-img">
              <img src="<?php echo esc_url($img . $p['img']); ?>" alt="<?php echo esc_attr($p['name']); ?>">
              <?php if (!empty($p['badge'])) : ?>
                <span class="ab-product-badge"><?php echo esc_html($p['badge']); ?></span>
              <?php endif; ?>
            </div>
            <div class="ab-product-glass">
              <div class="ab-product-name"><?php echo esc_html($p['name']); ?></div>
              <div class="ab-product-desc"><?php echo esc_html($p['desc']); ?></div>
              <div class="ab-product-price"><?php echo esc_html($p['price']); ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- ======== CTA ======== -->
  <section class="ab-section ab-section-dark ab-section-cta">
    <div class="ab-container">
      <div class="ab-cta-bar ab-reveal">
        <div>
          <h3>Ready to Get Started?</h3>
          <p>Complete the waiver and access our full catalog of research-grade compounds.</p>
        </div>
        <a href="#" class="ab-btn">Start Waiver</a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
