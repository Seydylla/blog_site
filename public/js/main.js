document.addEventListener('DOMContentLoaded', () => {

  const tags = ["Design", "Technology", "Travel", "Food", "Lifestyle", "Productivity", "Wellness", "Culture", "Startups", "Photography"];

  const categories = ["Travel", "Technology", "Food", "Lifestyle", "Design"];

  const footerColumns = [
    { title: "Explore", links: ["Home", "Articles", "Categories", "About"] },
    { title: "Categories", links: ["Design", "Technology", "Travel", "Food", "Lifestyle"] },
    { title: "Company", links: ["About us", "Contact", "Careers", "Press kit"] }
  ];

  const socials = [
    { label: "X", path: "M18 2h3l-7.5 8.5L22 22h-6.4l-5-6.5L4.8 22H1.8l8-9.1L2 2h6.5l4.5 5.9L18 2Z" },
    { label: "IG", path: "M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm5 5.5A4.5 4.5 0 1 0 16.5 12 4.5 4.5 0 0 0 12 7.5ZM17.8 6a1 1 0 1 0 1 1 1 1 0 0 0-1-1Z" },
    { label: "IN", path: "M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3 9h4v12H3ZM9 9h3.8v1.7h.05a4.2 4.2 0 0 1 3.8-2c4 0 4.7 2.6 4.7 6V21h-4v-5.2c0-1.3 0-2.9-1.8-2.9s-2 1.4-2 2.8V21H9Z" }
  ];

  // Dark mode — apply saved preference on every page
  const html = document.documentElement;
  const saved = localStorage.getItem('theme');
  if (saved === 'dark' || (!saved && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    html.classList.add('dark');
  } else {
    html.classList.remove('dark');
  }

  // Dark mode toggle button (only exists on index page)
  const toggle = document.getElementById('darkToggle');
  const iconSun = document.getElementById('iconSun');
  const iconMoon = document.getElementById('iconMoon');

  if (toggle) {
    const isDark = html.classList.contains('dark');
    if (iconSun) iconSun.classList.toggle('hidden', !isDark);
    if (iconMoon) iconMoon.classList.toggle('hidden', isDark);

    toggle.addEventListener('click', () => {
      html.classList.toggle('dark');
      const nowDark = html.classList.contains('dark');
      localStorage.setItem('theme', nowDark ? 'dark' : 'light');
      if (iconSun) iconSun.classList.toggle('hidden', !nowDark);
      if (iconMoon) iconMoon.classList.toggle('hidden', nowDark);
    });
  }

  // Mobile menu
  const menuBtn = document.getElementById('menuBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  const iconOpen = document.getElementById('menuIconOpen');
  const iconClose = document.getElementById('menuIconClose');

  if (menuBtn && mobileMenu) {
    menuBtn.addEventListener('click', () => {
      const isHidden = mobileMenu.classList.toggle('hidden');
      if (iconOpen) iconOpen.classList.toggle('hidden', !isHidden);
      if (iconClose) iconClose.classList.toggle('hidden', isHidden);
    });

    mobileMenu.querySelectorAll('a').forEach((a) => {
      a.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        if (iconOpen) iconOpen.classList.remove('hidden');
        if (iconClose) iconClose.classList.add('hidden');
      });
    });
  }

  const categoryContainer = document.getElementById('categories');
  const categoriesList = ["All", ...new Set(categories)];
  let activeCategory = "All";

  function renderCategories() {
    if (!categoryContainer) return;

    categoryContainer.innerHTML = categoriesList.map(cat => `
      <button class="cat-btn whitespace-nowrap rounded-full px-4 py-2 text-sm font-semibold transition ${activeCategory === cat ? 'active' : ''}" data-cat="${cat}">
        ${cat}
      </button>
    `).join('');

    categoryContainer.querySelectorAll('.cat-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        activeCategory = btn.getAttribute('data-cat');
        renderCategories();
        renderPosts();
      });
    });
  }

  function renderPosts() {
    const cards = document.querySelectorAll('#postGrid article');
    if (!cards.length) return;

    cards.forEach(card => {
      const cardCategory = card.getAttribute('data-category');
      if (activeCategory === "All" || cardCategory === activeCategory) {
        card.style.display = 'flex';
      } else {
        card.style.display = 'none';
      }
    });
  }

  const socialsContainer = document.getElementById('socialsContainer');
  if (socialsContainer) {
    socialsContainer.innerHTML = socials.map(s => `
      <a href="#" aria-label="${s.label}" class="flex h-10 w-10 items-center justify-center rounded-full border border-mint dark:border-gray-700 text-ink dark:text-gray-300 transition hover:border-brand hover:bg-brand hover:text-white">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
          <path d="${s.path}" />
        </svg>
      </a>
    `).join('');
  }

  const footerGrid = document.getElementById('footerGrid');
  if (footerGrid) {
    const colsHTML = footerColumns.map(col => `
      <div>
        <h4 class="font-display text-sm font-bold uppercase tracking-wide text-ink dark:text-gray-100">${col.title}</h4>
        <ul class="mt-4 space-y-3">
          ${col.links.map(link => `
            <li><a href="#" class="link-underline text-sm text-ink/60 dark:text-gray-400 hover:text-brand">${link}</a></li>
          `).join('')}
        </ul>
      </div>
    `).join('');

    footerGrid.innerHTML += colsHTML;
  }

  const marqueeTrack = document.getElementById('marqueeTrack');
  if (marqueeTrack) {
    const doubleTags = [...tags, ...tags];
    marqueeTrack.innerHTML = doubleTags.map(tag => `
      <span class="flex items-center gap-2 whitespace-nowrap rounded-full border border-mint dark:border-gray-700 bg-bg dark:bg-gray-800 px-5 py-2 text-sm font-medium text-ink/80 dark:text-gray-300">
        <span class="h-1.5 w-1.5 rounded-full bg-brand"></span>${tag}
      </span>
    `).join('');
  }

  renderCategories();
  renderPosts();

});
