/* ======== ARC Biologics — Site Scripts ======== */

/* Scroll Reveal */
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      observer.unobserve(entry.target);
    }
  });
}, {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px'
});

document.querySelectorAll('.ab-reveal, .ab-reveal-simple').forEach(el => {
  observer.observe(el);
});

/* ======== Browse by Application — Category Accordion ======== */
const categoryProducts = {
  recovery: [
    { name: 'BPC-157', desc: '15mg - 3ml vial', price: '$250' },
    { name: 'TB-500', desc: '10mg - 3ml vial', price: '$250' },
    { name: 'BPC-157/TB-500', desc: '10/10mg - 3ml vial', price: '$320' },
  ],
  cognitive: [
    { name: 'Dihexa', desc: '10mg - 30 tablets', price: '$290' },
    { name: 'Semax', desc: '11mg - 3ml vial', price: '$120' },
    { name: 'Selank', desc: '11mg - 3ml vial', price: '$160' },
    { name: 'DSIP', desc: '5mg - 3ml vial', price: '$260' },
  ],
  antiaging: [
    { name: 'Epithalon', desc: '50mg - 3ml vial', price: '$220' },
    { name: 'NAD+', desc: '1000mg - 10ml vial', price: '$200' },
    { name: 'GHK-cu', desc: '100mg - 3ml vial', price: '$200' },
    { name: 'SS-31', desc: '10mg - 3ml vial', price: '$190' },
    { name: 'Thymosin Alpha 1', desc: '10mg - 3ml vial', price: '$270' },
    { name: 'NAD+/BDNF/Alpha GPC', desc: '100/10/100mg - 3ml vial', price: '$440' },
  ],
  bodycomp: [
    { name: 'AOD 9604', desc: '5mg - 3ml vial', price: '$220' },
    { name: 'Ibutamoren (MK-677)', desc: '25mg - 30 tablets', price: '$310' },
    { name: 'SLU-PP-332', desc: '0.25mg - 60 tablets', price: '$300' },
    { name: 'Triple G (Reta)', desc: '15mg - 3ml vial', price: '$680' },
  ],
  blends: [
    { name: 'GLOW', desc: 'BPC-157/GHK-cu/TB-500 — 10/70/10mg - 5ml', price: '$390' },
    { name: 'Duo Blend (Tesa/Ipa)', desc: '3ml vial', price: '$240' },
    { name: 'BPC157/TB5/MGF/KPV', desc: '5/2/1/2mg - 3ml vial', price: '$380' },
  ],
  performance: [
    { name: 'Mots-C', desc: '50mg - 5ml vial', price: '$340' },
    { name: 'Follistatin 344', desc: '1mg - 3ml vial', price: '$650' },
    { name: 'IGF-1/LR3', desc: '1mg - 3ml vial', price: '$550' },
  ],
};

(function() {
  const grid = document.querySelector('.ab-categories-grid');
  const cards = document.querySelectorAll('.ab-category-card');
  const panel = document.getElementById('ab-category-panel');
  const carousel = document.getElementById('ab-category-carousel');
  if (!cards.length || !panel || !carousel || !grid) return;

  let activeCategory = null;

  // Find the last card in the same visual row as the clicked card
  function getLastCardInRow(clickedCard) {
    const clickedTop = clickedCard.getBoundingClientRect().top;
    let lastInRow = clickedCard;
    cards.forEach(card => {
      if (card === panel) return;
      const cardTop = card.getBoundingClientRect().top;
      // Same row = same top offset (within 5px tolerance)
      if (Math.abs(cardTop - clickedTop) < 5) {
        // Pick the one that comes later in DOM order
        if (card.compareDocumentPosition(lastInRow) & Node.DOCUMENT_POSITION_PRECEDING) {
          lastInRow = card;
        }
      }
    });
    return lastInRow;
  }

  cards.forEach(card => {
    card.addEventListener('click', () => {
      const cat = card.dataset.category;

      // Toggle off if clicking the same category
      if (activeCategory === cat) {
        panel.classList.remove('open');
        card.classList.remove('active');
        activeCategory = null;
        return;
      }

      // Deactivate previous
      cards.forEach(c => c.classList.remove('active'));

      // Close panel first if switching rows
      panel.classList.remove('open');

      // Small delay to let close animation start, then reposition and reopen
      const doOpen = () => {
        // Insert panel after the last card in this row
        const lastInRow = getLastCardInRow(card);
        lastInRow.after(panel);

        // Build product cards
        const products = categoryProducts[cat] || [];
        carousel.innerHTML = products.map(p => `
          <div class="ab-carousel-product">
            <div class="ab-carousel-product-name">${p.name}</div>
            <div class="ab-carousel-product-desc">${p.desc}</div>
            <div class="ab-carousel-product-price">${p.price}</div>
          </div>
        `).join('');

        // Activate card and open panel
        card.classList.add('active');
        activeCategory = cat;
        carousel.scrollLeft = 0;

        // Force reflow before opening for smooth animation
        panel.offsetHeight;
        panel.classList.add('open');

        // Scroll into view
        setTimeout(() => {
          panel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 150);
      };

      // If panel was already open (switching categories), wait for close
      if (activeCategory !== null) {
        setTimeout(doOpen, 80);
      } else {
        doOpen();
      }
    });
  });
})();
