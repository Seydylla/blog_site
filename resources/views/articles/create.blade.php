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

  <main class="w-full max-w-2xl bg-white dark:bg-gray-900 p-8 rounded-2xl border border-mint dark:border-gray-700 shadow-sm mx-auto my-10">
    <h1 class="text-2xl font-bold mb-6 text-ink dark:text-gray-100">Create New Article</h1>

    <form action="/articles/create" method="POST" enctype="multipart/form-data" class="space-y-4">

        @csrf

      <div>
        <label class="block text-sm font-medium mb-1 text-ink dark:text-gray-300">Title</label>
        <input type="text" name="title" required class="w-full border border-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 rounded-lg p-2.5 transition outline-none focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20" />
      </div>

      @error('title')
        <p class="mt-3 text-sm/6 text-red-600">{{$message}}</p>
      @enderror

      <div>
        <label class="block text-sm font-medium mb-1 text-ink dark:text-gray-300">Category</label>
        <select name="catagory" required class="w-full border border-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 rounded-lg p-2.5 bg-white transition outline-none focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
          <option value="Travel">Travel</option>
          <option value="Technology">Technology</option>
          <option value="Food">Food</option>
          <option value="Lifestyle">Lifestyle</option>
          <option value="Design">Design</option>
        </select>
      </div>

      <div>
        <label class="block text-sm font-medium mb-1 text-ink dark:text-gray-300">Header / Excerpt</label>
        <textarea name="header" required class="w-full border border-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 rounded-lg p-2.5 transition outline-none focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20" rows="3"></textarea>
      </div>

      @error('header')
        <p class="mt-3 text-sm/6 text-red-600">{{$message}}</p>
      @enderror

      <div>
        <label class="block text-sm font-medium mb-1 text-ink dark:text-gray-300">Article Content</label>
        <textarea name="article_description" required placeholder="Write your full article here..." class="w-full border border-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 rounded-lg p-2.5 transition outline-none focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20" rows="10"></textarea>
      </div>

      @error('article_description')
        <p class="mt-3 text-sm/6 text-red-600">{{$message}}</p>
      @enderror

      <div class="grid grid-cols-3 gap-4">
        <div>
          <label class="block text-sm font-medium mb-1 text-ink dark:text-gray-300">Article Image</label>
          <input type="file" name="img" required
            class="w-full border border-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 rounded-lg p-2 text-sm text-gray-500 file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-brand/10 file:text-brand hover:file:bg-brand/20 transition outline-none focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20" />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1 text-ink dark:text-gray-300">Read Time (min)</label>
          <input type="number" name="read_time" value="5" required
            class="w-full border border-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 rounded-lg p-2.5 transition outline-none focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20" />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1 text-ink dark:text-gray-300">Writer</label>
          <select name="writer_id" required
            class="w-full border border-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 rounded-lg p-2.5 bg-white transition outline-none focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
            <option value="1">Author 1</option>
            <option value="2">Author 2</option>
          </select>
        </div>

        @error('img')
            <p class="mt-3 text-sm/6 text-red-600">{{$message}}</p>
        @enderror
      </div>

      <div class="flex items-center gap-4 pt-2">
        <a href="/articles" class="w-1/2 text-center text-white bg-red-600 hover:bg-red-700 font-semibold py-3 rounded-full transition">
          Cancel
        </a>
        <button type="submit" class="w-1/2 bg-brand hover:opacity-90 text-white font-semibold py-3 rounded-full transition cursor-pointer">
          Publish Article
        </button>
      </div>
    </form>
  </main>

  <script src="{{ asset('js/main.js') }}"></script>

  <x-footer></x-footer>

</body>
</html>
