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
            Sign in to <span class="gradient-text">LumenBlog</span>
          </h1>
          <p class="mt-2 text-sm text-ink/70">
            Enter your email and password to access your account.
          </p>
        </div>

        <!-- Login Form -->
        <form action="/register" method="POST" class="mt-8 space-y-5">


        <!-- Name Input -->
        <div>
            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate">
              Name
            </label>
            <div class="mt-1.5">
              <input
                type="text"
                id="name"
                name="name"
                required
                placeholder="John Doe"
                class="focus-glow w-full rounded-full border border-mint bg-bg/50 px-5 py-3.5 text-sm text-ink placeholder-ink/40 transition outline-none focus:border-brand focus:bg-white"
              />
            </div>
          </div>
          <x-form-error name="name" />

          <!-- Email Input -->
          <div>
            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate">
              Email Address
            </label>
            <div class="mt-1.5">
              <input
                type="email"
                id="email"
                name="email"
                required
                placeholder="you@example.com"
                class="focus-glow w-full rounded-full border border-mint bg-bg/50 px-5 py-3.5 text-sm text-ink placeholder-ink/40 transition outline-none focus:border-brand focus:bg-white"
              />
            </div>
          </div>
          <x-form-error name="email" />

          <!-- Password Input -->
          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate">
                Password
              </label>
            </div>
            <div class="mt-1.5">
              <input
                type="password"
                id="password"
                name="password"
                required
                placeholder="••••••••"
                class="focus-glow w-full rounded-full border border-mint bg-bg/50 px-5 py-3.5 text-sm text-ink placeholder-ink/40 transition outline-none focus:border-brand focus:bg-white"
              />
            </div>
          </div>
          <?php if (isset($errors['password'])) : ?>
            <p class="mt-3 text-sm/6 text-red-600 dark:text-red-400"><?= $errors['password'] ?></p>
          <?php endif; ?>

          <!-- Submit Button -->
          <button
            type="submit"
            class="w-full rounded-full bg-ink py-3.5 text-sm font-semibold text-white shadow-lg shadow-ink/10 transition hover:bg-brand"
          >
            Sign In →
          </button>
        </form>


      </div>

    </div>
  </main>
