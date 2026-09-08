<?php
/**
 * Template Name: Reference Library
 */
get_header();

// Scan reference guides directory
$upload_dir = wp_get_upload_dir();
$guides_dir = $upload_dir['basedir'] . '/reference-guides/';
$guides_url = $upload_dir['baseurl'] . '/reference-guides/';

$guides = [];
if (is_dir($guides_dir)) {
    $files = glob($guides_dir . '*.pdf');
    foreach ($files as $file) {
        $filename = basename($file);
        $slug = str_replace('-reference.pdf', '', $filename);

        // Parse compound name and dosage from filename
        // Pattern: compound-name-DOSAGEmg-reference.pdf
        if (preg_match('/^(.+?)-(\d+(?:\.\d+)?mg)-reference\.pdf$/', $filename, $m)) {
            $name = str_replace('-', ' ', $m[1]);
            $name = ucwords($name);
            // Fix common casing
            $name = str_replace(['Bpc', 'Tb', 'Ghk', 'Igf', 'Nad', 'Ss', 'Ll', 'Kpv', 'Pt', 'Mots'],
                               ['BPC', 'TB', 'GHK', 'IGF', 'NAD', 'SS', 'LL', 'KPV', 'PT', 'MOTS'], $name);
            $name = preg_replace('/\b1mq\b/i', '1MQ', $name);
            $name = preg_replace('/\bLr3\b/i', 'LR3', $name);
            $name = preg_replace('/\bMk\b/i', 'MK', $name);
            $name = preg_replace('/\bCu\b/', 'Cu', $name);
            $dosage = $m[2];
        } else {
            $name = str_replace(['-reference.pdf', '-'], ['', ' '], $filename);
            $name = ucwords($name);
            $dosage = '';
        }

        $guides[] = [
            'name'    => $name,
            'dosage'  => $dosage,
            'file'    => $filename,
            'url'     => $guides_url . $filename,
            'size'    => filesize($file),
        ];
    }
    // Sort alphabetically by name
    usort($guides, function($a, $b) { return strcasecmp($a['name'], $b['name']); });
}
?>

  <!-- ======== HERO ======== -->
  <section class="ab-ref-hero">
    <div class="ab-hero-gradient"></div>
    <div class="ab-hero-noise"></div>
    <div class="ab-container">
      <div class="ab-ref-hero-content ab-reveal">
        <p class="ab-label ab-label-decorated">Resources</p>
        <h1>Reference Library</h1>
        <p class="ab-hero-sub">Reconstitution and dosing reference sheets for peptide compounds. Download, save, and refer back as needed.</p>
      </div>
    </div>
  </section>

  <!-- ======== LIBRARY GRID ======== -->
  <section class="ab-section ab-section-dark">
    <div class="ab-container">

      <?php if (!empty($guides)) : ?>

      <div class="ab-ref-search-bar ab-reveal">
        <input type="text" id="ab-ref-search" class="ab-ref-search" placeholder="Search compounds..." autocomplete="off">
      </div>

      <div class="ab-ref-count ab-reveal">
        <span id="ab-ref-count"><?php echo count($guides); ?></span> reference guides available
      </div>

      <div class="ab-ref-grid" id="ab-ref-grid">
        <?php foreach ($guides as $guide) : ?>
        <a href="<?php echo esc_url($guide['url']); ?>" class="ab-ref-card" data-name="<?php echo esc_attr(strtolower($guide['name'])); ?>" data-pdf="<?php echo esc_url($guide['url']); ?>" data-title="<?php echo esc_attr($guide['name'] . ($guide['dosage'] ? ' - ' . $guide['dosage'] : '')); ?>">
          <div class="ab-ref-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
          </div>
          <div class="ab-ref-info">
            <div class="ab-ref-name"><?php echo esc_html($guide['name']); ?></div>
            <?php if ($guide['dosage']) : ?>
              <div class="ab-ref-dosage"><?php echo esc_html($guide['dosage']); ?></div>
            <?php endif; ?>
          </div>
          <div class="ab-ref-dl">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            <span>PDF</span>
          </div>
        </a>
        <?php endforeach; ?>
      </div>

      <?php else : ?>
        <p style="text-align:center; opacity:0.5;">No reference guides found.</p>
      <?php endif; ?>

    </div>
  </section>

  <!-- ======== CTA ======== -->
  <section class="ab-section ab-section-dark ab-section-cta">
    <div class="ab-container">
      <div class="ab-cta-bar ab-reveal">
        <div>
          <h3>Need Help With Dosing?</h3>
          <p>Use our peptide dosing calculator to determine exact reconstitution volumes and draw amounts.</p>
        </div>
        <a href="/calculator/" class="ab-btn ab-btn-primary">Dosing Calculator</a>
      </div>
    </div>
  </section>

  <!-- PDF Lightbox Modal (reuses COA modal styles) -->
  <div id="abRefModal" class="ab-coa-modal" aria-hidden="true">
    <div class="ab-coa-modal-inner">
      <div class="ab-coa-modal-header">
        <h3 id="abRefModalTitle">Reference Guide</h3>
        <button type="button" id="abRefModalClose" class="ab-coa-modal-close" aria-label="Close">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6L6 18"/><path d="M6 6l12 12"/></svg>
        </button>
      </div>
      <div class="ab-coa-modal-body">
        <div id="abRefPages"></div>
        <p id="abRefLoading" class="ab-coa-loading" style="display:none;">Loading reference guide...</p>
        <p id="abRefError" class="ab-coa-error" style="display:none;">Unable to load PDF. <a href="#" id="abRefOpenTab" target="_blank" rel="noopener">Open in new tab</a></p>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js" defer></script>
  <script>
  (function() {
    // Search filter
    var input = document.getElementById('ab-ref-search');
    var grid = document.getElementById('ab-ref-grid');
    var count = document.getElementById('ab-ref-count');
    if (!input || !grid) return;
    var cards = grid.querySelectorAll('.ab-ref-card');

    input.addEventListener('input', function() {
      var q = this.value.toLowerCase().trim();
      var visible = 0;
      cards.forEach(function(card) {
        var name = card.getAttribute('data-name');
        var show = !q || name.indexOf(q) !== -1;
        card.style.display = show ? '' : 'none';
        if (show) visible++;
      });
      if (count) count.textContent = visible;
    });

    // Lightbox
    var modal = document.getElementById('abRefModal');
    var modalTitle = document.getElementById('abRefModalTitle');
    var modalClose = document.getElementById('abRefModalClose');
    var pagesContainer = document.getElementById('abRefPages');
    var loading = document.getElementById('abRefLoading');
    var loadError = document.getElementById('abRefError');
    var openTabLink = document.getElementById('abRefOpenTab');

    function openModal(url, title) {
      modalTitle.textContent = title;
      pagesContainer.innerHTML = '';
      loadError.style.display = 'none';
      loading.style.display = '';
      openTabLink.href = url;
      modal.classList.add('ab-coa-modal--open');
      modal.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
      renderPdf(url);
    }

    function closeModal() {
      modal.classList.remove('ab-coa-modal--open');
      modal.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
      pagesContainer.innerHTML = '';
    }

    function renderPdf(url) {
      if (typeof pdfjsLib === 'undefined') {
        loading.style.display = 'none';
        loadError.style.display = '';
        return;
      }
      pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
      pdfjsLib.getDocument({ url: url }).promise.then(function(pdf) {
        var promises = [];
        for (var i = 1; i <= pdf.numPages; i++) {
          promises.push(pdf.getPage(i).then(function(page) {
            var scale = window.innerWidth < 768 ? 1.2 : 2;
            var viewport = page.getViewport({ scale: scale });
            var canvas = document.createElement('canvas');
            canvas.className = 'ab-coa-canvas';
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            return page.render({ canvasContext: canvas.getContext('2d'), viewport: viewport }).promise.then(function() { return canvas; });
          }));
        }
        return Promise.all(promises);
      }).then(function(canvases) {
        loading.style.display = 'none';
        canvases.forEach(function(c) { pagesContainer.appendChild(c); });
      }).catch(function() {
        loading.style.display = 'none';
        loadError.style.display = '';
      });
    }

    // Card click -> open lightbox
    cards.forEach(function(card) {
      card.addEventListener('click', function(e) {
        e.preventDefault();
        var url = this.getAttribute('data-pdf');
        var title = this.getAttribute('data-title');
        if (url) openModal(url, title);
      });
    });

    modalClose.addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) { if (e.target === modal) closeModal(); });
    document.addEventListener('keydown', function(e) { if (e.key === 'Escape' && modal.classList.contains('ab-coa-modal--open')) closeModal(); });
  })();
  </script>

<?php get_footer(); ?>
