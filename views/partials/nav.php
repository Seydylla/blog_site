<header class="sticky top-0 z-50 border-b border-mint bg-bg/85 backdrop-blur-md">
  <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 sm:px-8">
    <a href="/" class="flex items-center gap-2">
      <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-ink text-lg font-bold text-brand">L</span>
      <span class="font-display text-xl font-bold tracking-tight text-ink">Lumen<span class="text-brand">Blog</span></span>
    </a>

    <nav class="hidden items-center gap-8 md:flex">
      <a href="/" class="link-underline text-sm font-medium text-ink/80 hover:text-ink <?= urlIs('/') ? 'after:!w-full' : '' ?>">Home</a>
      <a href="/articles" class="link-underline text-sm font-medium text-ink/80 hover:text-ink <?= urlIs('/articles') ? 'after:!w-full' : '' ?>">Articles</a>
      <a href="/about" class="link-underline text-sm font-medium text-ink/80 hover:text-ink <?= urlIs('/about') ? 'after:!w-full' : '' ?>">About</a>
    </nav>

    <div class="hidden items-center gap-3 md:flex">
      <!-- Search Button -->
      <button aria-label="Search" class="flex h-10 w-10 items-center justify-center rounded-full border border-mint text-ink transition hover:border-brand hover:text-brand">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="7" /><path d="M21 21l-4.3-4.3" />
        </svg>
      </button>

      <!-- Authentication Logic -->
      <?php if ($_SESSION['user'] ?? false) : ?>
        <!-- Profile Dropdown -->
        <div class="relative ml-2 group">
          <button class="flex items-center gap-2 rounded-full border-2 border-mint p-0.5 transition hover:border-brand focus:outline-none">
            <img 
              src="<?= $_SESSION['user']['avatar'] ?? '/images/avatar-1.jpg' ?>" 
              alt="User Avatar" 
              class="h-8 w-8 rounded-full object-cover" 
            />
          </button>

          <!-- Dropdown Menu -->
          <div class="absolute right-0 top-full mt-2 w-48 rounded-2xl border border-mint bg-white p-2 shadow-xl shadow-ink/10 opacity-0 invisible transition-all duration-200 group-hover:opacity-100 group-hover:visible z-50">
            <div class="px-3 py-2 border-b border-mint/50">
              <p class="text-xs font-semibold text-slate uppercase">Signed in as</p>
              <p class="text-sm font-bold text-ink truncate"><?= $_SESSION['user']['email'] ?? 'User' ?></p>
            </div>
            
            <a href="/profile" class="block rounded-xl px-3 py-2 text-sm text-ink/80 transition hover:bg-bg hover:text-brand font-medium">
              Your profile
            </a>
            <a href="/settings" class="block rounded-xl px-3 py-2 text-sm text-ink/80 transition hover:bg-bg hover:text-brand font-medium">
              Settings
            </a>
            
            <form action="/logout" method="POST" class="mt-1 border-t border-mint/50 pt-1">
              <button type="submit" class="w-full text-left rounded-xl px-3 py-2 text-sm text-coral transition hover:bg-coral/10 font-semibold">
                Sign out
              </button>
            </form>
          </div>
        </div>

      <?php else : ?>
        <!-- Guest View -->
        <a href="/login" class="text-sm font-semibold text-ink/80 transition hover:text-brand px-3">Log in</a>
        <a href="/register" class="rounded-full bg-brand px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-ink">Register</a>
      <?php endif; ?>
    </div>

    <!-- Mobile Hamburger Toggle -->
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
      
      <div class="border-t border-mint pt-3">
        <?php if ($_SESSION['user'] ?? false) : ?>
          <a href="/profile" class="block py-1.5 text-sm font-medium text-ink">Your Profile</a>
          <a href="/settings" class="block py-1.5 text-sm font-medium text-ink">Settings</a>
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