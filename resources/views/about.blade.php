<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LumenBlog — Stories Worth Reading</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="{{ asset('js/tailwind.config.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('style/custom.css') }}">

</head>

<body class="min-h-screen bg-bg font-body text-ink">

  <x-nav></x-nav>

  <main>


    <section id="about" class="bg-white py-20">
      <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <div class="grid grid-cols-1 gap-14 lg:grid-cols-2 lg:items-center">
          <div>
            <p class="text-sm font-semibold uppercase tracking-widest text-brand">Why LumenBlog</p>
            <h2 class="font-display mt-2 text-3xl font-bold text-ink sm:text-4xl">A calmer corner of the internet to read and think.</h2>
            <p class="mt-5 max-w-xl leading-relaxed text-ink/60">
              We started LumenBlog because our feeds felt loud and our reading lists felt
              empty. Today it's a small home for writers who care about craft, and readers
              who want stories that actually stay with them.
            </p>
          </div>

          <div class="relative">
            <div class="absolute -inset-6 -z-10 rounded-[3rem] bg-[#F7FAFB]"></div>
            <div class="grid grid-cols-2 gap-5">
              <img src="/images/post-3.jpg" alt="Food story" class="col-span-2 h-48 w-full rounded-2xl object-cover shadow-lg" />
              <img src="/images/post-1.jpg" alt="Travel story" class="h-40 w-full rounded-2xl object-cover shadow-lg" />
              <img src="/images/post-5.jpg" alt="Design story" class="h-40 w-full rounded-2xl object-cover shadow-lg" />
            </div>
            <div class="absolute -bottom-8 -right-4 rounded-2xl bg-ink px-6 py-5 text-white shadow-xl sm:right-6">
              <p class="font-display text-2xl font-bold text-brand">4.9/5</p>
              <p class="text-xs text-white/60">from 2,400+ readers</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="{{ asset('js/main.js') }}"></script>

  <x-footer></x-footer>

</body>
</html>
