<?php
/**
 * Template Name: COA Lookup
 * Template for the /coa-lookup/ page — Certificate of Analysis search.
 */
get_header();
?>

  <!-- ======== COA HERO ======== -->
  <section class="ab-quality-hero ab-coa-hero">
    <div class="ab-hero-gradient"></div>
    <div class="ab-hero-noise"></div>
    <div class="ab-container">
      <div class="ab-quality-hero-content">
        <p class="ab-label ab-label-decorated ab-reveal">Verify Your Product</p>
        <h1 class="ab-hero-heading ab-reveal">
          <span class="ab-heading-light">Certificate of</span>
          <span class="ab-heading-bold ab-gradient-text">Analysis Lookup</span>
        </h1>
        <p class="ab-hero-sub ab-reveal">
          Every vial ships with a lot number on the label. Enter it below to view the third-party lab report for your specific batch.
        </p>
      </div>
    </div>
  </section>

  <!-- ======== COA LOOKUP ======== -->
  <section class="ab-section ab-section-surface ab-coa-section">
    <div class="ab-container">
      <div class="ab-coa-lookup ab-reveal">
        <div class="ab-coa-content">
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

  <!-- ======== CTA ======== -->
  <section class="ab-section ab-section-dark ab-section-cta">
    <div class="ab-container">
      <div class="ab-cta-bar ab-reveal">
        <div>
          <h3>Questions About Our Testing?</h3>
          <p>Learn about our three-checkpoint process that every batch must pass before shipping.</p>
        </div>
        <a href="/quality/" class="ab-btn ab-btn-primary">Our Quality Process</a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
