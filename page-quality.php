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
