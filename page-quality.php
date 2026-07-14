<?php
/**
 * Template Name: Quality
 * Template for the /quality/ page — Three-pillar testing process.
 */
get_header();
?>

  <!-- ======== QUALITY HERO ======== -->
  <section class="ab-quality-hero">
    <div class="ab-hero-gradient"></div>
    <div class="ab-hero-noise"></div>
    <div class="ab-container">
      <div class="ab-quality-hero-content">
        <p class="ab-label ab-label-decorated ab-reveal">Our Testing Process</p>
        <h1 class="ab-hero-heading ab-reveal">
          <span class="ab-heading-light">Every Batch.</span>
          <span class="ab-heading-bold ab-gradient-text">Tested.</span>
        </h1>
        <p class="ab-hero-sub ab-reveal">
          Every peptide ARC produces moves through a three-checkpoint testing process before it ships. No exceptions, no shortcuts.
        </p>
      </div>
    </div>
  </section>

  <!-- ======== THREE PILLARS ======== -->
  <section class="ab-section ab-section-surface">
    <div class="ab-container">
      <div class="ab-pillars-grid ab-stagger">

        <div class="ab-pillar-card ab-reveal">
          <div class="ab-pillar-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
          </div>
          <h3>Certificate of Authenticity</h3>
          <p>Every peptide ships with batch-specific verification confirming identity and purity. Not a marketing document — proof tied to the compound inside the vial.</p>
          <span class="ab-pillar-tag">Identity + Purity</span>
        </div>

        <div class="ab-pillar-card ab-reveal">
          <div class="ab-pillar-icon ab-pillar-icon-violet">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 2v7.527a2 2 0 0 1-.211.896L4.72 20.55a1 1 0 0 0 .9 1.45h12.76a1 1 0 0 0 .9-1.45l-5.069-10.127A2 2 0 0 1 14 9.527V2"/><path d="M8.5 2h7"/><path d="M7 16h10"/></svg>
          </div>
          <h3>Sterility Testing</h3>
          <p>Injectable peptides have a direct path into the bloodstream. Every batch is screened for bacterial and microbial contamination before release.</p>
          <span class="ab-pillar-tag">Microbial Screening</span>
        </div>

        <div class="ab-pillar-card ab-reveal">
          <div class="ab-pillar-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/><path d="M11 8v6"/><path d="M8 11h6"/></svg>
          </div>
          <h3>Mycotoxin Testing</h3>
          <p>The step most sellers skip. Mycotoxins from mold and fungi leave no visible trace but can compromise any product. ARC screens every batch.</p>
          <span class="ab-pillar-tag">Hidden Contamination</span>
        </div>

      </div>
    </div>
  </section>

  <!-- ======== STATS ROW ======== -->
  <section class="ab-section ab-section-dark ab-quality-stats-section">
    <div class="ab-container">
      <div class="ab-quality-stats ab-reveal ab-stagger">
        <div class="ab-stat">
          <div class="ab-stat-value ab-shimmer">99%+</div>
          <div class="ab-stat-label">Purity Standard</div>
        </div>
        <div class="ab-stat">
          <div class="ab-stat-value ab-shimmer">3</div>
          <div class="ab-stat-label">Testing Checkpoints</div>
        </div>
        <div class="ab-stat">
          <div class="ab-stat-text ab-shimmer">Every Batch</div>
          <div class="ab-stat-label">No Exceptions</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======== COA LOOKUP ======== -->
  <section class="ab-section ab-section-surface ab-coa-section">
    <div class="ab-container">
      <div class="ab-coa-lookup ab-reveal">
        <div class="ab-coa-content">
          <p class="ab-label ab-label-decorated">Verify Your Product</p>
          <h2>Certificate of Analysis Lookup</h2>
          <p class="ab-about-text">
            Every vial ships with a lot number on the label. Enter it below to view the third-party lab report for your specific batch.
          </p>
          <div class="ab-coa-form">
            <input type="text" id="abCoaInput" class="ab-coa-input" placeholder="Enter lot number (e.g. BTAB1)" autocomplete="off">
            <button type="button" id="abCoaSearch" class="ab-btn ab-btn-primary ab-coa-btn">Search</button>
          </div>
          <p id="abCoaMessage" class="ab-coa-message" style="display:none;"></p>
        </div>
      </div>
    </div>
  </section>

  <!-- COA Lightbox Modal -->
  <div id="abCoaModal" class="ab-coa-modal" aria-hidden="true">
    <div class="ab-coa-modal-inner">
      <div class="ab-coa-modal-header">
        <h3 id="abCoaModalTitle">Lab Report</h3>
        <button type="button" id="abCoaModalClose" class="ab-coa-modal-close" aria-label="Close">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6L6 18"/><path d="M6 6l12 12"/></svg>
        </button>
      </div>
      <div class="ab-coa-modal-body" id="abCoaModalBody">
        <div id="abCoaPages"></div>
        <p id="abCoaLoading" class="ab-coa-loading" style="display:none;">Loading lab report...</p>
        <p id="abCoaLoadError" class="ab-coa-error" style="display:none;">Unable to load PDF. <a href="#" id="abCoaOpenTab" target="_blank" rel="noopener">Open in new tab</a></p>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js" defer></script>
  <script>
  (function() {
    var input = document.getElementById('abCoaInput');
    var btn = document.getElementById('abCoaSearch');
    var msg = document.getElementById('abCoaMessage');
    var modal = document.getElementById('abCoaModal');
    var modalTitle = document.getElementById('abCoaModalTitle');
    var modalBody = document.getElementById('abCoaModalBody');
    var modalClose = document.getElementById('abCoaModalClose');
    var pagesContainer = document.getElementById('abCoaPages');
    var loading = document.getElementById('abCoaLoading');
    var loadError = document.getElementById('abCoaLoadError');
    var openTabLink = document.getElementById('abCoaOpenTab');
    var baseUrl = 'https://pathpeptides.com/cdn/shop/files/';
    var prefix = 'LOT-';

    function showMessage(text, isError) {
      msg.textContent = text;
      msg.className = 'ab-coa-message' + (isError ? ' ab-coa-error' : '');
      msg.style.display = '';
    }

    function hideMessage() { msg.style.display = 'none'; }

    function getVariants(value) {
      var clean = value.trim().replace(/\.pdf$/i, '');
      if (clean.toLowerCase().indexOf(prefix.toLowerCase()) === 0) clean = clean.slice(prefix.length);
      clean = clean.replace(/\s+/g, '_');
      var variants = [prefix + clean, prefix + clean.toUpperCase(), prefix + clean.charAt(0).toUpperCase() + clean.slice(1).toLowerCase()];
      var seen = {};
      return variants.filter(function(v) { if (seen[v]) return false; seen[v] = true; return true; });
    }

    function tryUrl(url, callback) {
      var xhr = new XMLHttpRequest();
      xhr.open('HEAD', url, true);
      xhr.onload = function() { callback(xhr.status >= 200 && xhr.status < 400); };
      xhr.onerror = function() { callback(false); };
      xhr.send();
    }

    // Modal controls
    function openModal(url, lotNumber) {
      modalTitle.textContent = 'Lab Report — ' + lotNumber.toUpperCase();
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

    modalClose.addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) { if (e.target === modal) closeModal(); });
    document.addEventListener('keydown', function(e) { if (e.key === 'Escape' && modal.classList.contains('ab-coa-modal--open')) closeModal(); });

    // PDF rendering
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

    // Search
    function search() {
      var value = input.value.trim();
      if (!value) { showMessage('Please enter a lot number.', true); input.focus(); return; }
      if (!/^[A-Za-z0-9_\-]+$/.test(value)) { showMessage('Invalid format. Lot numbers contain only letters, numbers, and dashes.', true); input.focus(); return; }

      hideMessage();
      btn.disabled = true;
      btn.textContent = 'Searching...';

      var variants = getVariants(value);
      var index = 0;

      function tryNext() {
        if (index >= variants.length) {
          btn.disabled = false;
          btn.textContent = 'Search';
          showMessage('No certificate found for that lot number. Please double-check and try again.', true);
          return;
        }
        var url = baseUrl + variants[index] + '.pdf';
        tryUrl(url, function(found) {
          if (found) {
            btn.disabled = false;
            btn.textContent = 'Search';
            openModal(url, value);
          } else { index++; tryNext(); }
        });
      }
      tryNext();
    }

    btn.addEventListener('click', search);
    input.addEventListener('keydown', function(e) { if (e.key === 'Enter') search(); });
    input.addEventListener('input', hideMessage);
  })();
  </script>

  <!-- ======== EXPANDED CONTENT ======== -->
  <section class="ab-section ab-section-surface">
    <div class="ab-container">
      <div class="ab-quality-detail ab-reveal">
        <div class="ab-quality-detail-col">
          <p class="ab-label">Why It Matters</p>
          <h2>Documentation Over Claims</h2>
          <p class="ab-about-text">
            In a market where substitution and dilution are common, a label claim means nothing without testing behind it. A product can be cut with fillers, sold at a lower concentration than advertised, or swapped for a cheaper compound entirely.
          </p>
          <p class="ab-about-text">
            ARC was built to be the opposite of that. Every compound is verified through independent testing before it ships. The right question to ask any peptide company is simple: can you show me the testing?
          </p>
        </div>
        <div class="ab-quality-detail-col">
          <p class="ab-label">The Standard</p>
          <h2>What Sets ARC Apart</h2>
          <p class="ab-about-text">
            Certificate of Authenticity. Sterility testing. Mycotoxin testing. Each one is a checkpoint that cheaper operations skip. ARC treats them as non-negotiable.
          </p>
          <p class="ab-about-text">
            Testing for mycotoxins takes time and adds cost, which is exactly why so many sources leave it out. ARC includes it because a product cannot be considered clean if it has never been screened for contamination that hides in plain sight.
          </p>
          <a href="/blog/" class="ab-btn ab-btn-outline">Read the Full Article</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ======== CTA ======== -->
  <section class="ab-section ab-section-dark ab-section-cta">
    <div class="ab-container">
      <div class="ab-cta-bar ab-reveal">
        <div>
          <h3>See Our Compounds</h3>
          <p>Browse 20+ professional-grade peptides, each backed by our three-checkpoint testing process.</p>
        </div>
        <a href="/shop/" class="ab-btn ab-btn-primary">Browse Compounds</a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
