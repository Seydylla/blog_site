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

    <div class="hidden items-center gap-8 md:flex">

        @guest
            <x-nav-link href="/login">Log in</x-nav-link>
            <x-nav-link href="/register">Register</x-nav-link>
        @endguest
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
        @auth
          <a href="/profile" class="block py-1.5 text-sm font-medium text-ink dark:text-gray-100">Your Profile</a>
          <a href="/settings" class="block py-1.5 text-sm font-medium text-ink dark:text-gray-100">Settings</a>
          <form action="/logout" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="text-sm font-semibold text-coral">Sign out</button>
          </form>
        @else
          <div class="flex items-center gap-4 pt-1">
            <a href="/login" class="text-sm font-medium text-ink/80 dark:text-gray-300">Log in</a>
            <a href="/register" class="rounded-full bg-brand px-4 py-2 text-xs font-semibold text-white">Register</a>
          </div>
        @endauth
      </div>
    </nav>
  </div>
</header>
