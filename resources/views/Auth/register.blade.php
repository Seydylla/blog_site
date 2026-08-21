<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <script>
    if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    }
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LumenBlog — Stories Worth Reading</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="{{ asset('js/tailwind.config.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('style/custom.css') }}">
</head>

<body class="min-h-screen bg-bg dark:bg-gray-950 font-body text-ink dark:text-gray-100 flex flex-col justify-between transition-colors duration-300">

  <x-nav></x-nav>

  <main class="relative flex flex-1 items-center justify-center overflow-hidden px-5 py-16 sm:px-8">

    <div class="blob pointer-events-none -left-20 -top-20 h-72 w-72 bg-brand opacity-70"></div>
    <div class="blob pointer-events-none -bottom-20 -right-20 h-80 w-80 bg-coral opacity-70"></div>

    <div class="relative z-10 w-full max-w-md">
      <div class="rounded-3xl bg-white p-8 shadow-2xl shadow-ink/10 sm:p-10 border border-mint">

        <!-- Header / Logo Accent -->
        <div class="text-center">
          <span class="inline-flex items-center gap-2 rounded-full bg-mint/50 px-4 py-1.5 text-xs font-semibold uppercase tracking-wide text-brand">
            <span class="h-2 w-2 rounded-full bg-brand"></span>
            Welcome
          </span>
          <h1 class="font-display mt-4 text-3xl font-bold text-ink">
            Create an Account on <span class="gradient-text">LumenBlog</span>
          </h1>
          <p class="mt-2 text-sm text-ink/70">
            Fill in your details below to register.
          </p>
        </div>

        <!-- Registration Form -->
        <form action="/register" method="POST" class="mt-8 space-y-5">
          @csrf

          <!-- Name Input -->
          <x-form-field>
            <div>
              <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate">
                Full Name
              </label>
              <div class="mt-1.5">
                <x-form-input id="name" name="name" required />
              </div>
            </div>
            <x-form-error name="name" />
          </x-form-field>

          <x-form-field>
            <div>
              <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate">
                Email Address
              </label>
              <div class="mt-1.5">
                <x-form-input id="email" name="email" type="email" required />
              </div>
            </div>
            <x-form-error name="email" />
          </x-form-field>

          <x-form-field>
            <div>
              <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate">
                Password
              </label>
              <div class="mt-1.5">
                <x-form-input id="password" name="password" type="password" required />
              </div>
            </div>
            <x-form-error name="password" />
          </x-form-field>

          <button
            type="submit"
            class="w-full rounded-full bg-ink py-3.5 text-sm font-semibold text-white shadow-lg shadow-ink/10 transition hover:bg-brand"
          >
            Register →
          </button>
        </form>

      </div>
    </div>
  </main>

  <script src="{{ asset('js/main.js') }}"></script>
  <x-footer></x-footer>

</body>
</html>
