<?php
/*
 * Template Name: Peptide Calculator
 */
get_header();
?>

<section class="ab-shop-hero">
  <div class="ab-container">
    <p class="ab-label ab-label-decorated" style="justify-content: center;">Tools</p>
    <h1 class="ab-hero-heading">
      <span class="ab-heading-light">Dosing</span>
      <span class="ab-heading-bold ab-gradient-text">Calculator.</span>
    </h1>
    <p class="ab-hero-sub" style="max-width: 600px; margin: 0 auto;">Calculate your exact injection volume based on peptide dose, vial strength, and reconstitution water volume.</p>
  </div>
</section>

<section class="ab-section ab-section-dark">
  <div class="ab-container" style="max-width: 1000px;">

    <!-- INPUT SECTION -->
    <div class="ab-calc-inputs">

      <!-- Dose -->
      <div class="ab-calc-group">
        <h3 class="ab-calc-label">Dose of Peptide</h3>
        <div class="ab-calc-pills" data-target="dose">
          <button class="ab-calc-pill" data-value="0.1">0.1mg</button>
          <button class="ab-calc-pill" data-value="0.25">0.25mg</button>
          <button class="ab-calc-pill" data-value="0.5">0.5mg</button>
          <button class="ab-calc-pill" data-value="1">1mg</button>
          <button class="ab-calc-pill" data-value="2">2mg</button>
          <button class="ab-calc-pill" data-value="2.5">2.5mg</button>
          <button class="ab-calc-pill" data-value="5">5mg</button>
          <button class="ab-calc-pill" data-value="7.5">7.5mg</button>
          <button class="ab-calc-pill" data-value="10">10mg</button>
          <button class="ab-calc-pill" data-value="12.5">12.5mg</button>
          <button class="ab-calc-pill" data-value="15">15mg</button>
        </div>
        <input type="number" class="ab-calc-input" id="calcDose" placeholder="Enter custom dose (mg)" step="any" min="0">
      </div>

      <!-- Strength -->
      <div class="ab-calc-group">
        <h3 class="ab-calc-label">Strength of Peptide</h3>
        <div class="ab-calc-pills" data-target="strength">
          <button class="ab-calc-pill" data-value="1">1mg</button>
          <button class="ab-calc-pill" data-value="5">5mg</button>
          <button class="ab-calc-pill" data-value="10">10mg</button>
          <button class="ab-calc-pill" data-value="15">15mg</button>
          <button class="ab-calc-pill" data-value="20">20mg</button>
          <button class="ab-calc-pill" data-value="50">50mg</button>
        </div>
        <input type="number" class="ab-calc-input" id="calcStrength" placeholder="Enter custom strength (mg)" step="any" min="0">
      </div>

      <!-- Water -->
      <div class="ab-calc-group">
        <h3 class="ab-calc-label">Water Volume</h3>
        <div class="ab-calc-pills" data-target="water">
          <button class="ab-calc-pill" data-value="0.5">0.5mL</button>
          <button class="ab-calc-pill" data-value="1">1.0mL</button>
          <button class="ab-calc-pill" data-value="1.5">1.5mL</button>
          <button class="ab-calc-pill" data-value="2">2.0mL</button>
          <button class="ab-calc-pill" data-value="2.5">2.5mL</button>
          <button class="ab-calc-pill" data-value="3">3.0mL</button>
        </div>
        <input type="number" class="ab-calc-input" id="calcWater" placeholder="Enter custom water (mL)" step="any" min="0">
      </div>

    </div>

    <!-- RESULTS SECTION -->
    <div class="ab-calc-results" id="calcResults">
      <h3 class="ab-calc-results-title">Results</h3>

      <div class="ab-calc-result-grid">
        <div class="ab-calc-result-card">
          <span class="ab-calc-result-label">Peptide Dose</span>
          <span class="ab-calc-result-value" id="resDose">--</span>
        </div>
        <div class="ab-calc-result-card ab-calc-result-highlight">
          <span class="ab-calc-result-label">Draw Syringe To</span>
          <span class="ab-calc-result-value" id="resUnits">--</span>
        </div>
        <div class="ab-calc-result-card">
          <span class="ab-calc-result-label">Concentration</span>
          <span class="ab-calc-result-value" id="resConc">--</span>
        </div>
        <div class="ab-calc-result-card">
          <span class="ab-calc-result-label">Doses Per Vial</span>
          <span class="ab-calc-result-value" id="resDoses">--</span>
        </div>
      </div>

      <!-- Syringe Visual -->
      <div class="ab-calc-syringe-wrap">
        <svg class="ab-calc-syringe" viewBox="0 0 500 80" fill="none" xmlns="http://www.w3.org/2000/svg">
          <!-- Barrel -->
          <rect x="60" y="22" width="360" height="36" rx="4" fill="#1a1a1a" stroke="rgba(255,255,255,0.12)" stroke-width="1"/>
          <!-- Fill -->
          <rect x="62" y="24" width="0" height="32" rx="3" fill="url(#syringeFillGrad)" id="syringeFillRect" class="ab-syringe-fill"/>
          <!-- Tick marks -->
          <g stroke="rgba(255,255,255,0.2)" stroke-width="0.5">
            <line x1="96" y1="58" x2="96" y2="64"/>
            <line x1="132" y1="58" x2="132" y2="64"/>
            <line x1="168" y1="58" x2="168" y2="64"/>
            <line x1="204" y1="58" x2="204" y2="64"/>
            <line x1="240" y1="58" x2="240" y2="64"/>
            <line x1="276" y1="58" x2="276" y2="64"/>
            <line x1="312" y1="58" x2="312" y2="64"/>
            <line x1="348" y1="58" x2="348" y2="64"/>
            <line x1="384" y1="58" x2="384" y2="64"/>
            <line x1="420" y1="58" x2="420" y2="68"/>
          </g>
          <!-- Labels -->
          <g fill="rgba(255,255,255,0.35)" font-size="10" font-family="Inter, sans-serif" text-anchor="middle">
            <text x="96" y="76">10</text>
            <text x="132" y="76">20</text>
            <text x="168" y="76">30</text>
            <text x="204" y="76">40</text>
            <text x="240" y="76">50</text>
            <text x="276" y="76">60</text>
            <text x="312" y="76">70</text>
            <text x="348" y="76">80</text>
            <text x="384" y="76">90</text>
            <text x="420" y="76">100</text>
          </g>
          <!-- Plunger -->
          <rect x="20" y="28" width="42" height="24" rx="4" fill="#222" stroke="rgba(255,255,255,0.12)" stroke-width="1"/>
          <rect x="10" y="34" width="14" height="12" rx="3" fill="#333" stroke="rgba(255,255,255,0.1)" stroke-width="1"/>
          <!-- Needle -->
          <rect x="420" y="36" width="70" height="8" rx="2" fill="#2a2a2a" stroke="rgba(255,255,255,0.08)" stroke-width="0.5"/>
          <rect x="488" y="38" width="12" height="4" rx="1" fill="#333"/>
          <!-- Gradient -->
          <defs>
            <linearGradient id="syringeFillGrad" x1="0" y1="0" x2="1" y2="0">
              <stop offset="0%" stop-color="#0B8F68"/>
              <stop offset="100%" stop-color="#10B981"/>
            </linearGradient>
          </defs>
        </svg>
      </div>

    </div>

  </div>
</section>

<script>
(function() {
  var dose = 0, strength = 0, water = 0;
  var doseInput = document.getElementById('calcDose');
  var strengthInput = document.getElementById('calcStrength');
  var waterInput = document.getElementById('calcWater');

  // Pill buttons
  document.querySelectorAll('.ab-calc-pills').forEach(function(group) {
    var target = group.dataset.target;
    group.querySelectorAll('.ab-calc-pill').forEach(function(pill) {
      pill.addEventListener('click', function() {
        group.querySelectorAll('.ab-calc-pill').forEach(function(p) { p.classList.remove('active'); });
        pill.classList.add('active');
        var val = parseFloat(pill.dataset.value);
        if (target === 'dose') { dose = val; doseInput.value = ''; }
        if (target === 'strength') { strength = val; strengthInput.value = ''; }
        if (target === 'water') { water = val; waterInput.value = ''; }
        calculate();
      });
    });
  });

  // Custom inputs
  doseInput.addEventListener('input', function() {
    dose = parseFloat(this.value) || 0;
    document.querySelectorAll('[data-target="dose"] .ab-calc-pill').forEach(function(p) { p.classList.remove('active'); });
    calculate();
  });
  strengthInput.addEventListener('input', function() {
    strength = parseFloat(this.value) || 0;
    document.querySelectorAll('[data-target="strength"] .ab-calc-pill').forEach(function(p) { p.classList.remove('active'); });
    calculate();
  });
  waterInput.addEventListener('input', function() {
    water = parseFloat(this.value) || 0;
    document.querySelectorAll('[data-target="water"] .ab-calc-pill').forEach(function(p) { p.classList.remove('active'); });
    calculate();
  });

  function calculate() {
    var resDose = document.getElementById('resDose');
    var resUnits = document.getElementById('resUnits');
    var resConc = document.getElementById('resConc');
    var resDoses = document.getElementById('resDoses');
    var fill = document.getElementById('syringeFillRect');

    if (dose <= 0 || strength <= 0 || water <= 0) {
      resDose.textContent = '--';
      resUnits.textContent = '--';
      resConc.textContent = '--';
      resDoses.textContent = '--';
      fill.setAttribute('width', '0');
      return;
    }

    var concentration = strength / water;
    var volumeML = dose / concentration;
    var units = volumeML * 100;
    var dosesPerVial = Math.floor(strength / dose);

    resDose.textContent = dose + ' mg';
    resUnits.textContent = units.toFixed(1) + ' units';
    resConc.textContent = concentration.toFixed(2) + ' mg/mL';
    resDoses.textContent = dosesPerVial + ' doses';

    // Syringe fill: max width = 356px (from x=62 to x=418), 100 units = full
    var fillWidth = Math.min((units / 100) * 356, 356);
    fill.setAttribute('width', fillWidth.toFixed(1));
  }
})();
</script>

<?php get_footer(); ?>
