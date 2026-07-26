<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LumenBlog — Stories Worth Reading</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="assets/js/tailwind.config.js"></script>
  <link rel="stylesheet" href="assets/style/custom.css">

</head>

<body class="min-h-screen bg-bg font-body text-ink">

  <!-- ================= NAVBAR ================= -->
  <?php require base_path('views/partials/nav.php') ?>

  <main>

    <!-- ================= BLOG GRID ================= -->
    <section id="articles" class="mx-auto max-w-7xl px-5 py-20 sm:px-8">
      <div class="flex flex-col items-start justify-between gap-6 sm:flex-row sm:items-end">
        <div>
          <p class="text-sm font-semibold uppercase tracking-widest text-brand">Latest Articles</p>
          <h2 class="font-display mt-2 text-3xl font-bold text-ink sm:text-4xl">Fresh from the blog</h2>
        </div>

        <div class="flex flex-wrap items-center gap-4">
          <div id="categories" class="chip-scroll flex max-w-full gap-2 overflow-x-auto pb-1">
            <!-- Categories rendering dynamically -->
          </div>

          <a href="/articles/create" class="inline-flex items-center gap-2 rounded-xl bg-brand px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:opacity-90">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Create Post
          </a>
        </div>
      </div>

      <div id="postGrid" class="mt-10 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        <?php

        foreach($articles as $article):
          $imagePath = "/images/" . $article['img'];

          // Determine the avatar image file name based on writer_id
          $avatarNumber = ($article['writer_id'] == 2) ? 2 : 1;
          $avatarPath = "/images/avatar-" . $avatarNumber . ".jpg";
        ?>
          <article class="post-card card-lift group overflow-hidden rounded-2xl border border-mint bg-white flex flex-col justify-between h-full" data-category="<?= $article['catagory'] ?>">
            <div>
              <div class="relative overflow-hidden">
                <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($article['title']) ?>" class="h-52 w-full object-cover transition duration-500 group-hover:scale-105" />
                <span class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-bold uppercase tracking-wide text-brand"><?= htmlspecialchars($article['catagory']) ?></span>
              </div>
              <div class="p-6">
                <div class="flex items-center gap-2 text-xs text-slate">
                  <span><?= htmlspecialchars($article['date']) ?></span><span class="h-1 w-1 rounded-full bg-line"></span><span><?= htmlspecialchars($article['read_time']) ?> min read</span>
                </div>
                <h3 class="font-display mt-3 text-lg font-bold leading-snug text-ink transition group-hover:text-brand"><?= htmlspecialchars($article['title']) ?></h3>
                <p class="mt-2 text-sm leading-relaxed text-ink/60"><?= htmlspecialchars($article['header']) ?></p>
              </div>
            </div>
            <div class="p-6 pt-0">
              <div class="flex items-center gap-3 border-t border-fog pt-4">
                <img src="<?= htmlspecialchars($avatarPath) ?>" alt="<?= htmlspecialchars($article['writer_name'] ?? 'Author') ?>" class="h-8 w-8 rounded-full object-cover" />
                <span class="text-sm font-medium text-ink"><?= htmlspecialchars($article['writer_name'] ?? 'Author') ?></span>
                <a href="/article?id=<?= $article['id'] ?>" class="link-underline ml-auto text-sm font-semibold text-coral">Read →</a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <?php if(empty($articles)) : ?>
        <main class="flex-1 flex items-center justify-center px-5">

          <div class="text-center">

          <h1 class="text-4xl font-bold font-display sm:text-5xl text-ink">Sorry, hasn't got any data</h1>

          <p class="mt-3 text-ink/60">The page you are looking for doesn't have any articles</p>

        </div>

      </main>
      <?php endif; ?>
    </section>

  </main>

  <?php require base_path('views/partials/footer.php') ?>

  <!-- ================= SCRIPTS & SYSTEM STATE ================= -->
  <script src="assets/js/main.js"></script>

</body>
</html>