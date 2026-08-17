<header class="sticky top-0 z-50 border-b border-mint dark:border-gray-700 bg-bg/85 dark:bg-gray-950/85 backdrop-blur-md">
  <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 sm:px-8">
    <a href="/" class="flex items-center gap-2">
      <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-ink dark:bg-gray-100 text-lg font-bold text-brand">L</span>
      <span class="font-display text-xl font-bold tracking-tight text-ink dark:text-gray-100">Lumen<span class="text-brand">Blog</span></span>
    </a>

    <nav class="hidden items-center gap-8 md:flex">
      <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
      <x-nav-link href="/articles" :active="request()->is('articles')">Articles</x-nav-link>
      <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
    </nav>

    <div class="hidden items-center gap-3 md:flex">
      <button aria-label="Search" class="flex h-10 w-10 items-center justify-center rounded-full border border-mint dark:border-gray-700 text-ink dark:text-gray-300 transition hover:border-brand hover:text-brand">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="7" /><path d="M21 21l-4.3-4.3" />
        </svg>
      </button>

      <?php if ($_SESSION['user'] ?? false) : ?>
        <div class="relative ml-2 group">
          <button class="flex items-center gap-2 rounded-full border-2 border-mint dark:border-gray-700 p-0.5 transition hover:border-brand focus:outline-none">
            <img
              src="<?= $_SESSION['user']['avatar'] ?? '/images/avatar-1.jpg' ?>"
              alt="User Avatar"
              class="h-8 w-8 rounded-full object-cover"
            />
          </button>

          <div class="absolute right-0 top-full mt-2 w-48 rounded-2xl border border-mint dark:border-gray-700 bg-white dark:bg-gray-900 p-2 shadow-xl shadow-ink/10 opacity-0 invisible transition-all duration-200 group-hover:opacity-100 group-hover:visible z-50">
            <div class="px-3 py-2 border-b border-mint/50 dark:border-gray-700">
              <p class="text-xs font-semibold text-slate dark:text-gray-400 uppercase">Signed in as</p>
              <p class="text-sm font-bold text-ink dark:text-gray-100 truncate"><?= $_SESSION['user']['email'] ?? 'User' ?></p>
            </div>

            <a href="/profile" class="block rounded-xl px-3 py-2 text-sm text-ink/80 dark:text-gray-300 transition hover:bg-bg dark:hover:bg-gray-800 hover:text-brand font-medium">
              Your profile
            </a>
            <a href="/settings" class="block rounded-xl px-3 py-2 text-sm text-ink/80 dark:text-gray-300 transition hover:bg-bg dark:hover:bg-gray-800 hover:text-brand font-medium">
              Settings
            </a>

            <form action="/logout" method="POST" class="mt-1 border-t border-mint/50 dark:border-gray-700 pt-1">
              <button type="submit" class="w-full text-left rounded-xl px-3 py-2 text-sm text-coral transition hover:bg-coral/10 font-semibold">
                Sign out
              </button>
            </form>
          </div>
        </div>

      <?php else : ?>
        <a href="/login" class="text-sm font-semibold text-ink/80 dark:text-gray-300 transition hover:text-brand px-3">Log in</a>
        <a href="/register" class="rounded-full bg-brand px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-ink dark:hover:bg-gray-100 dark:hover:text-gray-900">Register</a>
      <?php endif; ?>
    </div>

    <button id="menuBtn" class="flex h-10 w-10 items-center justify-center rounded-lg border border-mint dark:border-gray-700 text-ink dark:text-gray-300 md:hidden" aria-label="Toggle menu">
      <svg id="menuIconOpen" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16" /></svg>
      <svg id="menuIconClose" class="hidden" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 6l12 12M18 6L6 18" /></svg>
    </button>
  </div>

  <div id="mobileMenu" class="hidden border-t border-mint dark:border-gray-700 bg-bg dark:bg-gray-950 px-5 py-4 md:hidden">
    <nav class="flex flex-col gap-4">
      <a href="/" class="text-sm font-medium text-ink/80 dark:text-gray-300">Home</a>
      <a href="/articles" class="text-sm font-medium text-ink/80 dark:text-gray-300">Articles</a>
      <a href="/about" class="text-sm font-medium text-ink/80 dark:text-gray-300">About</a>

      <div class="border-t border-mint dark:border-gray-700 pt-3">
        <?php if ($_SESSION['user'] ?? false) : ?>
          <a href="/profile" class="block py-1.5 text-sm font-medium text-ink dark:text-gray-100">Your Profile</a>
          <a href="/settings" class="block py-1.5 text-sm font-medium text-ink dark:text-gray-100">Settings</a>
          <form action="/logout" method="POST" class="mt-2">
            <button type="submit" class="text-sm font-semibold text-coral">Sign out</button>
          </form>
        <?php else : ?>
          <div class="flex items-center gap-4 pt-1">
            <a href="/register" class="rounded-full bg-brand px-4 py-2 text-xs font-semibold text-white">Register</a>
          </div>
        <?php endif; ?>
      </div>
    </nav>
  </div>
</header>
