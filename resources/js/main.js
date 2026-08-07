// System Data Constants (Mapped from raw inputs)
    const tags = ["Design", "Technology", "Travel", "Food", "Lifestyle", "Productivity", "Wellness", "Culture", "Startups", "Photography"];
    
    const aboutPoints = [
      { title: "Independent voices", desc: "Every story is written by real people sharing real experience, not algorithms.", icon: "✍️" },
      { title: "No noisy ads", desc: "A clean, distraction-free reading experience designed around the words.", icon: "🌿" },
      { title: "Weekly digest", desc: "One thoughtful email a week with the pieces worth your time.", icon: "📬" }
    ];

    const posts = [
      { image: "/images/post-1.jpg", category: "Travel", title: "Chasing sunrise: a week among the northern trails", excerpt: "Notes from a solo trek through misty peaks and the villages that welcomed a stranger in.", author: "Nina Cole", avatar: "/images/avatar-1.jpg", date: "Mar 2, 2026", read: "5 min" },
      { image: "/images/post-2.jpg", category: "Technology", title: "The quiet return of simple, focused tools", excerpt: "Why minimal apps and single-purpose gadgets are winning back our attention.", author: "Marco Idris", avatar: "/images/avatar-2.jpg", date: "Feb 27, 2026", read: "4 min" },
      { image: "/images/post-3.jpg", category: "Food", title: "Five bowls that make weeknight cooking joyful", excerpt: "Fast, colorful, and nourishing recipes that fit into an ordinary Tuesday.", author: "Nina Cole", avatar: "/images/avatar-1.jpg", date: "Feb 20, 2026", read: "3 min" },
      { image: "/images/post-4.jpg", category: "Lifestyle", title: "Designing a home that actually slows you down", excerpt: "Small interior shifts that changed the way our family spends evenings together.", author: "Marco Idris", avatar: "/images/avatar-2.jpg", date: "Feb 14, 2026", read: "6 min" },
      { image: "/images/post-5.jpg", category: "Design", title: "Color theory lessons hiding in everyday objects", excerpt: "How a walk through a hardware store reshaped the way I build palettes.", author: "Nina Cole", avatar: "/images/avatar-1.jpg", date: "Feb 9, 2026", read: "7 min" },
      { image: "/images/post-featured.jpg", category: "Technology", title: "Notes on writing software slowly, on purpose", excerpt: "A case for shipping less, thinking more, and trusting the long feedback loop.", author: "Marco Idris", avatar: "/images/avatar-2.jpg", date: "Jan 30, 2026", read: "8 min" }
    ];

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

    // Initialize Menu Elements
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const iconOpen = document.getElementById('menuIconOpen');
    const iconClose = document.getElementById('menuIconClose');

    menuBtn.addEventListener('click', () => {
      const isHidden = mobileMenu.classList.toggle('hidden');
      iconOpen.classList.toggle('hidden', !isHidden);
      iconClose.classList.toggle('hidden', isHidden);
    });

    mobileMenu.querySelectorAll('a').forEach((a) => {
      a.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        iconOpen.classList.remove('hidden');
        iconClose.classList.add('hidden');
      });
    });

    // Dynamic Render: Articles Category Controls & Filtering logic
    const categoryContainer = document.getElementById('categories');
    const categoriesList = ["All", ...new Set(posts.map(p => p.category))];
    let activeCategory = "All";

    function renderCategories() {
      categoryContainer.innerHTML = categoriesList.map(cat => `
        <button class="cat-btn whitespace-nowrap rounded-full px-4 py-2 text-sm font-semibold transition ${activeCategory === cat ? 'active' : ''}" data-cat="${cat}">
          ${cat}
        </button>
      `).join('');

      // Rebind click events
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
      
      cards.forEach(card => {
        const cardCategory = card.getAttribute('data-category');
        
        if (activeCategory === "All" || cardCategory === activeCategory) {
          card.style.display = 'flex'; // Shows card
        } else {
          card.style.display = 'none'; // Hides card
        }
      });
    }

    // Dynamic Render: Footer links and socials
    document.getElementById('socialsContainer').innerHTML = socials.map(s => `
      <a href="#" aria-label="${s.label}" class="flex h-10 w-10 items-center justify-center rounded-full border border-mint text-ink transition hover:border-brand hover:bg-brand hover:text-white">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
          <path d="${s.path}" />
        </svg>
      </a>
    `).join('');

    const footerGrid = document.getElementById('footerGrid');
    footerGrid.innerHTML += footerColumns.map(col => `
      <div>
        <h4 class="font-display text-sm font-bold uppercase tracking-wide text-ink">${col.title}</h4>
        <ul class="mt-4 space-y-3">
          ${col.links.map(link => `
            <li><a href="#" class="link-underline text-sm text-ink/60 hover:text-brand">${link}</a></li>
          `).join('')}
        </ul>
      </div>
    `).join('');


    // Boot App Components
    renderCategories();
    renderPosts();