<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create Article — LumenBlog</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="/assets/js/tailwind.config.js"></script>
  <link rel="stylesheet" href="assets/style/custom.css">
</head>
<body class="bg-bg font-body text-ink min-h-screen p-5 sm:p-10 flex flex-col justify-center items-center">

  <main class="w-full max-w-2xl bg-white p-8 rounded-2xl border border-mint shadow-sm my-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Article</h1>

    <form action="/articles/create" method="POST" enctype="multipart/form-data" class="space-y-4">
      <div>
        <label class="block text-sm font-medium mb-1">Title</label>
        <input type="text" name="title" required class="w-full border border-gray-200 rounded-lg p-2.5 transition outline-none focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20" />
      </div>

      <?php if (isset($errors['title'])) : ?>
        <p class="mt-3 text-sm/6 text-red-600 dark:text-red-400"><?= $errors['title'] ?></p>
      <?php endif; ?>

      <div>
        <label class="block text-sm font-medium mb-1">Category</label>
        <select name="catagory" required class="w-full border border-gray-200 rounded-lg p-2.5 bg-white transition outline-none focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
          <option value="Travel">Travel</option>
          <option value="Technology">Technology</option>
          <option value="Food">Food</option>
          <option value="Lifestyle">Lifestyle</option>
          <option value="Design">Design</option>
        </select>
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">Header / Excerpt</label>
        <textarea name="header" required class="w-full border border-gray-200 rounded-lg p-2.5 transition outline-none focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20" rows="3"></textarea>
      </div>

      <?php if (isset($errors['header'])) : ?>
        <p class="mt-3 text-sm/6 text-red-600 dark:text-red-400"><?= $errors['header'] ?></p>
      <?php endif; ?>

      <!-- Main Article Content Area -->
      <div>
        <label class="block text-sm font-medium mb-1">Article Content</label>
        <textarea name="article_description" required placeholder="Write your full article here..." class="w-full border border-gray-200 rounded-lg p-2.5 transition outline-none focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20" rows="10"></textarea>
      </div>

      <?php if (isset($errors['article'])) : ?>
        <p class="mt-3 text-sm/6 text-red-600 dark:text-red-400"><?= $errors['article'] ?></p>
      <?php endif; ?>

      <div class="grid grid-cols-3 gap-4">
        <div>
          <label class="block text-sm font-medium mb-1">Article Image</label>
          <input type="file" name="img" required 
            class="w-full border border-gray-200 rounded-lg p-2 text-sm text-gray-500 file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-brand/10 file:text-brand hover:file:bg-brand/20 transition outline-none focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20" />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Read Time (min)</label>
          <input type="number" name="read_time" value="5" required 
            class="w-full border border-gray-200 rounded-lg p-2.5 transition outline-none focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20" />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Writer</label>
          <select name="writer_id" required 
            class="w-full border border-gray-200 rounded-lg p-2.5 bg-white transition outline-none focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
            <option value="1">Author 1</option>
            <option value="2">Author 2</option>
          </select>
        </div>

        <?php if (isset($errors['img'])) : ?>
          <p class="mt-3 text-sm/6 text-red-600 dark:text-red-400"><?= $errors['img'] ?></p>
        <?php endif; ?>
      </div>

      <!-- Action Buttons -->
      <div class="flex items-center gap-4 pt-2">
        <a href="/articles" class="w-1/2 text-center text-white bg-red-600 hover:bg-red-700 text-slate font-semibold py-3 rounded-full transition">
          Cancel
        </a>
        <button type="submit" class="w-1/2 bg-brand hover:opacity-90 text-white font-semibold py-3 rounded-full transition cursor-pointer">
          Publish Article
        </button>
      </div>
    </form>
  </main>

</body>
</html>