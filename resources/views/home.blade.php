<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LumenBlog — Stories Worth Reading</title>

  <script src="{{ asset('js/tailwind.config.js') }}"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('style/custom.css') }}">

</head>

<body class="min-h-screen bg-bg font-body text-ink">

<x-nav></x-nav>

  <main>
    <section id="home" class="relative overflow-hidden">
      <div class="blob h-72 w-72 bg-brand -left-20 -top-20"></div>
      <div class="blob h-80 w-80 bg-coral right-0 top-40"></div>

      <div class="relative z-10 mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-5 py-16 sm:px-8 md:py-24 lg:grid-cols-2">
        <div>
          <span class="pulse-dot inline-flex items-center gap-2 rounded-full bg-white px-4 py-1.5 text-xs font-semibold uppercase tracking-wide text-brand shadow-sm">
            <span class="h-2 w-2 rounded-full bg-brand"></span>
            Fresh stories every week
          </span>

          <h1 class="font-display mt-6 text-4xl font-bold leading-tight text-ink sm:text-5xl lg:text-6xl">
            Stories worth your
            <span class="gradient-text"> morning coffee.</span>
          </h1>

          <p class="mt-6 max-w-lg text-base leading-relaxed text-ink/70 sm:text-lg">
            LumenBlog brings you honest writing on design, technology, travel and
            everyday life — curated by a community of thinkers who love a good story.
          </p>

          <div class="mt-8 flex flex-wrap items-center gap-4">
            <a href="#articles" class="rounded-full bg-ink px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-ink/10 transition hover:bg-brand">Start Reading</a>
            <a href="#newsletter" class="link-underline text-sm font-semibold text-ink">Join the newsletter →</a>
          </div>

          <div class="mt-12 flex flex-wrap items-center gap-8 border-t border-mint pt-6">
            <div>
              <p class="font-display text-2xl font-bold text-ink">3.2k+</p>
              <p class="text-xs uppercase tracking-wide text-slate">Articles published</p>
            </div>
            <div>
              <p class="font-display text-2xl font-bold text-ink">48k</p>
              <p class="text-xs uppercase tracking-wide text-slate">Monthly readers</p>
            </div>
            <div>
              <p class="font-display text-2xl font-bold text-ink">120+</p>
              <p class="text-xs uppercase tracking-wide text-slate">Contributing writers</p>
            </div>
          </div>
        </div>

        <div class="relative">
          <div class="absolute -inset-4 -z-10 rounded-[2.5rem] bg-mint"></div>
          <img src="/images/hero.jpg" alt="Illustration of a writer's desk" class="aspect-[4/3] w-full rounded-[2rem] object-cover shadow-2xl shadow-ink/10" />
          <div class="absolute -bottom-6 -left-6 flex items-center gap-3 rounded-2xl bg-white px-5 py-4 shadow-xl">
            <img src="/images/avatar-1.jpg" alt="Author" class="h-10 w-10 rounded-full object-cover" />
            <div>
              <p class="text-sm font-semibold text-ink">New post live</p>
              <p class="text-xs text-slate">2 minutes ago</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="marquee-wrap overflow-hidden border-y border-mint bg-white py-4">
      <div id="marqueeTrack" class="marquee-track flex w-max gap-4">
      </div>
    </div>

    <section class="mx-auto max-w-7xl px-5 pt-16 sm:px-8">
      <div class="grid grid-cols-1 overflow-hidden rounded-3xl bg-ink shadow-2xl shadow-ink/20 lg:grid-cols-2">
        <div class="relative">
          <img src="/images/post-featured.jpg" alt="Featured article" class="h-64 w-full object-cover lg:h-full" />
          <span class="absolute left-5 top-5 rounded-full bg-brand px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-white">Editor's Pick</span>
        </div>

        <div class="flex flex-col justify-center p-8 sm:p-12">
          <div class="flex items-center gap-3 text-xs font-semibold uppercase tracking-wide text-brand">
            <span>Productivity</span>
            <span class="h-1 w-1 rounded-full bg-white/30"></span>
            <span class="text-white/50">6 min read</span>
          </div>

          <h2 class="font-display mt-4 text-2xl font-bold leading-snug text-white sm:text-3xl">
            How I rebuilt my morning routine to write every single day
          </h2>

          <p class="mt-4 leading-relaxed text-white/60">
            A candid look at the small, unglamorous habits that turned my scattered
            writing practice into a daily ritual — and how you can build one too.
          </p>

          <div class="mt-8 flex items-center gap-4">
            <img src="/images/avatar-2.jpg" alt="Author avatar" class="h-11 w-11 rounded-full border-2 border-brand object-cover" />
            <div>
              <p class="text-sm font-semibold text-white">Marco Idris</p>
              <p class="text-xs text-white/50">March 12, 2026</p>
            </div>
            <a href="#" class="link-underline ml-auto text-sm font-semibold text-brand">Read story →</a>
          </div>
        </div>
      </div>
    </section>

    <section id="newsletter" class="mx-auto max-w-7xl px-5 py-20 sm:px-8">
      <div class="texture relative overflow-hidden rounded-3xl bg-ink px-6 py-14 text-center sm:px-16">
        <div class="blob h-64 w-64 bg-brand left-10 -bottom-24"></div>
        <div class="blob h-64 w-64 bg-coral right-10 -top-24"></div>

        <div class="relative z-10 mx-auto max-w-2xl">
          <span class="inline-block rounded-full bg-white/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-brand">Newsletter</span>
          <h2 class="font-display mt-5 text-3xl font-bold text-white sm:text-4xl">Get the best stories in your inbox, every Sunday.</h2>
          <p class="mt-4 text-white/60">
            Join 48,000 readers who receive a short, thoughtful roundup of our favorite
            pieces. No spam, unsubscribe anytime.
          </p>

          <form id="newsletterForm" class="mx-auto mt-8 flex max-w-md flex-col gap-3 sm:flex-row">
            <input type="email" required placeholder="you@example.com" class="focus-glow w-full rounded-full border border-white/15 bg-white/10 px-5 py-3.5 text-sm text-white placeholder-white/40 outline-none" />
            <button type="submit" class="shrink-0 rounded-full bg-brand px-7 py-3.5 text-sm font-semibold text-white transition hover:bg-white hover:text-ink">Subscribe</button>
          </form>

          <p class="mt-4 text-xs text-white/40">By subscribing you agree to our Privacy Policy and Terms of Service.</p>
        </div>
      </div>
    </section>
  </main>

  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('js/index.js') }}"></script>

  <x-footer></x-footer>

</body>
</html>
