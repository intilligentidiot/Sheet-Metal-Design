<?php
require_once 'blog-posts.php';
// Get the latest 3 posts
$latest_posts = array_slice($blog_posts, 0, 3);
?>
<section class="py-24 bg-surface thin-border-t" id="latest-insights">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-16 flex justify-between items-end">
            <div>
                <h2 class="text-3xl font-bold uppercase tracking-tight mb-4">Latest Insights</h2>
                <div class="h-1 w-20 bg-primary"></div>
            </div>
            <a href="blog.php" class="text-primary hover:text-white uppercase tracking-widest text-sm font-bold transition-colors">View All &rarr;</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($latest_posts as $post): ?>
            <article class="bg-darkBg border border-white/10 rounded-custom overflow-hidden group hover:border-primary/50 transition-colors duration-300 flex flex-col h-full">
                <div class="h-48 overflow-hidden relative">
                    <img src="<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors duration-300"></div>
                </div>
                <div class="p-8 flex flex-col flex-grow">
                    <time datetime="<?= htmlspecialchars($post['date']) ?>" class="text-xs uppercase tracking-widest text-primary font-bold mb-4 block">
                        <?= date('F j, Y', strtotime($post['date'])) ?>
                    </time>
                    <h3 class="text-xl font-bold uppercase mb-4 group-hover:text-primary transition-colors leading-tight">
                        <a href="blog/<?= htmlspecialchars($post['slug']) ?>"><?= htmlspecialchars($post['title']) ?></a>
                    </h3>
                    <p class="text-gray-400 font-light text-sm mb-6 flex-grow leading-relaxed">
                        <?= htmlspecialchars($post['excerpt']) ?>
                    </p>
                    <a href="blog/<?= htmlspecialchars($post['slug']) ?>" class="text-white hover:text-primary text-sm font-bold uppercase tracking-widest transition-colors mt-auto inline-flex items-center">
                        Read More <span class="material-symbols-outlined ml-1 text-lg">arrow_right_alt</span>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
