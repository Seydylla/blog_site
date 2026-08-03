<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In — LumenBlog</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="assets/js/tailwind.config.js"></script>
  <link rel="stylesheet" href="assets/style/custom.css">
</head>

<body class="flex min-h-screen flex-col bg-bg font-body text-ink">

  <!-- Optional PHP Navbar Include -->
  <?php require base_path('views/partials/nav.php') ?>

  <main class="relative flex flex-1 items-center justify-center overflow-hidden px-5 py-16 sm:px-8">
    
    <!-- Background Decorative Blobs matching Hero section -->
    <div class="blob pointer-events-none -left-20 -top-20 h-72 w-72 bg-brand opacity-70"></div>
    <div class="blob pointer-events-none -bottom-20 -right-20 h-80 w-80 bg-coral opacity-70"></div>

    <div class="relative z-10 w-full max-w-md">
      
      <!-- Card Container -->
      <div class="rounded-3xl bg-white p-8 shadow-2xl shadow-ink/10 sm:p-10 border border-mint">
        
        <!-- Header / Logo Accent -->
        <div class="text-center">
          <span class="inline-flex items-center gap-2 rounded-full bg-mint/50 px-4 py-1.5 text-xs font-semibold uppercase tracking-wide text-brand">
            <span class="h-2 w-2 rounded-full bg-brand"></span>
            Welcome Back
          </span>
          <h1 class="font-display mt-4 text-3xl font-bold text-ink">
            Sign in to <span class="gradient-text">LumenBlog</span>
          </h1>
          <p class="mt-2 text-sm text-ink/70">
            Enter your email and password to access your account.
          </p>
        </div>

        <!-- Login Form -->
        <form action="/login" method="POST" class="mt-8 space-y-5">
          
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

          <!-- Password Input -->
          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate">
                Password
              </label>
              <a href="/forgot-password" class="text-xs font-semibold text-brand hover:underline">
                Forgot?
              </a>
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

          <!-- Remember Me Checkbox -->
          <div class="flex items-center justify-between pt-1">
            <label class="flex items-center gap-2.5 cursor-pointer">
              <input 
                type="checkbox" 
                name="remember" 
                class="h-4 w-4 rounded border-mint text-brand focus:ring-brand accent-brand"
              />
              <span class="text-sm text-ink/70">Remember me</span>
            </label>
          </div>

          <!-- Submit Button -->
          <button 
            type="submit" 
            class="w-full rounded-full bg-ink py-3.5 text-sm font-semibold text-white shadow-lg shadow-ink/10 transition hover:bg-brand"
          >
            Sign In →
          </button>
        </form>

        <!-- Divider -->
        <div class="relative my-6 text-center">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-mint"></div>
          </div>
          <span class="relative bg-white px-3 text-xs text-slate uppercase">Or continue with</span>
        </div>

        <!-- Secondary Option / Sign Up -->
        <div class="text-center text-sm text-ink/70">
          Don't have an account? 
          <a href="/register" class="link-underline font-semibold text-brand">Create an account</a>
        </div>

      </div>

      <!-- Footer Micro Copy -->
      <p class="mt-6 text-center text-xs text-slate">
        By continuing, you agree to LumenBlog's 
        <a href="#" class="underline hover:text-ink">Terms of Service</a> and 
        <a href="#" class="underline hover:text-ink">Privacy Policy</a>.
      </p>

    </div>
  </main>

  <!-- Optional PHP Footer Include -->
  <?php require base_path('views/partials/footer.php') ?>

</body>
</html>