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

<body class="min-h-screen bg-bg dark:bg-gray-950 font-body text-ink dark:text-gray-100 transition-colors duration-300">

    <x-nav></x-nav>

  <main>
    <?php
      $imagePath = "/images/" . $article['img'];
      $avatarNumber = ($article['writer_id'] == 2) ? 2 : 1;
      $avatarPath = "/images/avatar-" . $avatarNumber . ".jpg";
    ?>

    <article class="mx-auto max-w-4xl px-5 py-12 sm:px-8 sm:py-20">

      <div class="flex items-center gap-4 text-xs font-semibold uppercase tracking-wide">
        <a href="/articles" class="text-slate dark:text-gray-400 hover:text-brand transition">← Back to Articles</a>
        <span class="h-1 w-1 rounded-full bg-line dark:bg-gray-600"></span>
        <span class="text-brand"> {{ $article['catagory'] }} </span>
      </div>

      <h1 class="font-display mt-6 text-3xl font-bold leading-tight text-ink dark:text-gray-100 sm:text-5xl">
        {{ $article['title'] }}
      </h1>

      <p class="mt-4 text-lg leading-relaxed text-ink/70 dark:text-gray-400 font-medium">
        {{ $article['header'] }}
      </p>

      <div class="mt-8 flex items-center gap-3 border-b border-fog dark:border-gray-700 pb-6">
        <img src="<?= htmlspecialchars($avatarPath) ?>" alt="<?= htmlspecialchars($article['writer_name'] ?? 'Author') ?>" class="h-10 w-10 rounded-full object-cover" />
        <div>
          <span class="block text-sm font-semibold text-ink dark:text-gray-100"><?= htmlspecialchars($article['writer_name'] ?? 'Author') ?></span>
          <div class="flex items-center gap-2 text-xs text-slate dark:text-gray-400 mt-0.5">
            <span>{{ $article['date'] }}</span>
            <span class="h-1 w-1 rounded-full bg-line dark:bg-gray-600"></span>
            <span>{{ $article['read_time'] }} min read</span>
          </div>
        </div>
      </div>

      <div class="mt-8 overflow-hidden rounded-2xl border border-mint dark:border-gray-700 bg-white dark:bg-gray-900">
        <img src="<?= htmlspecialchars($imagePath) ?>" alt="{{ $article['title'] }}" class="h-[32rem] w-full object-cover" />
      </div>

      <div class="prose max-w-none mt-10 text-base leading-loose text-ink/80 dark:text-gray-300 space-y-6">
        <p>{{ $article['header'] }}</p>
        <p>{{ $article['article_description'] }}</p>
      </div>

      <div class="mt-8 flex justify-between">
        <button form="delete-form" class="rounded-full bg-red-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 cursor-pointer">
          Delete
        </button>

        <a href="/articles/{{ $article['id'] }}/edit" class="rounded-full bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 cursor-pointer">
          Edit article
        </a>
      </div>

    <form method="POST" action="/articles/{{$article->id}}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    </article>
  </main>

  <script src="{{ asset('js/main.js') }}"></script>

  <x-footer></x-footer>

</body>
</html>
