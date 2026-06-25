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
// Product data injected from PHP via abCategoryProducts global
const categoryProducts = (typeof abCategoryProducts !== 'undefined') ? abCategoryProducts : {};

(function() {
  const grid = document.querySelector('.ab-categories-grid');
  const cards = document.querySelectorAll('.ab-category-card');
  const panel = document.getElementById('ab-category-panel');
  const carousel = document.getElementById('ab-category-carousel');
  const prevBtn = document.getElementById('ab-carousel-prev');
  const nextBtn = document.getElementById('ab-carousel-next');
  if (!cards.length || !panel || !carousel || !grid) return;

  let activeCategory = null;

  /* --- Arrow buttons --- */
  const scrollAmount = 280;

  function updateArrows() {
    if (!prevBtn || !nextBtn) return;
    prevBtn.disabled = carousel.scrollLeft <= 0;
    nextBtn.disabled = carousel.scrollLeft >= carousel.scrollWidth - carousel.clientWidth - 2;
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', () => {
      carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });
  }
  if (nextBtn) {
    nextBtn.addEventListener('click', () => {
      carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });
  }

  carousel.addEventListener('scroll', updateArrows);

  /* --- Click-and-drag --- */
  let isDragging = false;
  let startX = 0;
  let scrollStart = 0;
  let hasDragged = false;

  carousel.addEventListener('mousedown', (e) => {
    isDragging = true;
    hasDragged = false;
    startX = e.pageX - carousel.offsetLeft;
    scrollStart = carousel.scrollLeft;
    carousel.classList.add('dragging');
  });

  carousel.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    e.preventDefault();
    const x = e.pageX - carousel.offsetLeft;
    const walk = (x - startX) * 1.5;
    if (Math.abs(walk) > 5) hasDragged = true;
    carousel.scrollLeft = scrollStart - walk;
  });

  carousel.addEventListener('mouseup', () => {
    isDragging = false;
    carousel.classList.remove('dragging');
  });

  carousel.addEventListener('mouseleave', () => {
    isDragging = false;
    carousel.classList.remove('dragging');
  });

  // Prevent click on product cards after dragging
  carousel.addEventListener('click', (e) => {
    if (hasDragged) e.preventDefault();
  }, true);

  /* --- Row detection & accordion --- */
  function getLastCardInRow(clickedCard) {
    const clickedTop = clickedCard.getBoundingClientRect().top;
    let lastInRow = clickedCard;
    cards.forEach(card => {
      const cardTop = card.getBoundingClientRect().top;
      if (Math.abs(cardTop - clickedTop) < 5) {
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

      if (activeCategory === cat) {
        panel.classList.remove('open');
        card.classList.remove('active');
        activeCategory = null;
        return;
      }

      cards.forEach(c => c.classList.remove('active'));
      panel.classList.remove('open');

      const doOpen = () => {
        const lastInRow = getLastCardInRow(card);
        lastInRow.after(panel);

        const products = categoryProducts[cat] || [];
        carousel.innerHTML = products.map(p => `
          <a href="${p.url}" class="ab-carousel-product">
            ${p.img ? `<div class="ab-carousel-product-img"><img src="${p.img}" alt="${p.name}"></div>` : ''}
            <div class="ab-carousel-product-name">${p.name}</div>
            <div class="ab-carousel-product-price">${p.price}</div>
          </a>
        `).join('');

        card.classList.add('active');
        activeCategory = cat;
        carousel.scrollLeft = 0;

        panel.offsetHeight;
        panel.classList.add('open');
        updateArrows();

        setTimeout(() => {
          panel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 150);
      };

      if (activeCategory !== null) {
        setTimeout(doOpen, 80);
      } else {
        doOpen();
      }
    });
  });
})();

/* ======== Shop Page — Category Filter ======== */
(function() {
  const tabs = document.querySelectorAll('.ab-filter-tab');
  const grid = document.getElementById('ab-shop-grid');
  if (!tabs.length || !grid) return;

  const cards = grid.querySelectorAll('.ab-product-card');

  function applyFilter(filter) {
    tabs.forEach(t => {
      t.classList.toggle('active', t.dataset.filter === filter);
    });
    cards.forEach(card => {
      if (filter === 'all' || card.dataset.cat === filter) {
        card.classList.remove('hidden');
      } else {
        card.classList.add('hidden');
      }
    });
  }

  tabs.forEach(tab => {
    tab.addEventListener('click', () => applyFilter(tab.dataset.filter));
  });

  // Apply filter from URL hash (e.g. /shop/#recovery)
  const hash = window.location.hash.replace('#', '');
  if (hash) applyFilter(hash);
})();
