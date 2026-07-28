<header class="sticky top-0 z-50 border-b border-mint bg-bg/85 backdrop-blur-md">
  <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 sm:px-8">
    <a href="#home" class="flex items-center gap-2">
      <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-ink text-lg font-bold text-brand">L</span>
      <span class="font-display text-xl font-bold tracking-tight text-ink">Lumen<span class="text-brand">Blog</span></span>
    </a>

    <nav class="hidden items-center gap-8 md:flex">
      <a href="/" class="link-underline text-sm font-medium text-ink/80 hover:text-ink <?= urlIs('/') ? 'after:!w-full' : '' ?>">Home</a>
      <a href="/articles" class="link-underline text-sm font-medium text-ink/80 hover:text-ink <?= urlIs('/articles') ? 'after:!w-full' : '' ?>">Articles</a>
      <a href="/about" class="link-underline text-sm font-medium text-ink/80 hover:text-ink <?= urlIs('/about') ? 'after:!w-full' : '' ?>">About</a>
    </nav>

    <div class="hidden items-center gap-3 md:flex">
      <button aria-label="Search" class="flex h-10 w-10 items-center justify-center rounded-full border border-mint text-ink transition hover:border-brand hover:text-brand">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="7" /><path d="M21 21l-4.3-4.3" />
        </svg>
      </button>
      <a href="#newsletter" class="rounded-full bg-brand px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-ink">Subscribe</a>
    </div>

    <button id="menuBtn" class="flex h-10 w-10 items-center justify-center rounded-lg border border-mint text-ink md:hidden" aria-label="Toggle menu">
      <svg id="menuIconOpen" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16" /></svg>
      <svg id="menuIconClose" class="hidden" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 6l12 12M18 6L6 18" /></svg>
    </button>
  </div>

  <!-- Mobile Navigation Drawer -->
  <div id="mobileMenu" class="hidden border-t border-mint bg-bg px-5 py-4 md:hidden">
    <nav class="flex flex-col gap-4">
      <a href="/" class="text-sm font-medium text-ink/80">Home</a>
      <a href="/articles" class="text-sm font-medium text-ink/80">Articles</a>
      <a href="/about" class="text-sm font-medium text-ink/80">About</a>
      <a href="#newsletter" class="mt-2 rounded-full bg-brand px-5 py-2.5 text-center text-sm font-semibold text-white">Subscribe</a>
    </nav>
  </div>
</header>