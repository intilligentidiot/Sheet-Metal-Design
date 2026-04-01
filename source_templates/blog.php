<?php
$page_title = "Insights & Engineering Blog | TMD Services";
$page_description = "Exploring the latest trends in sheet metal fabrication, CNC machining, and industrial design innovation. Technical guides on DFM, bend allowance, andCAD modeling.";
$page_canonical = "https://sheet-metal-design-alpha.vercel.app/blog";
$page_og_image = "https://sheet-metal-design-alpha.vercel.app/assets/manufacturing_floor.png";
$page_keywords = "Sheet Metal Blog, Engineering Insights, DFM Tips, CAD Tutorials, Industrial Design Blog, TMD Services";
include 'includes/header.php';
require_once 'includes/blog-posts.php';
?>

<main class="pt-20">
    <header class="py-16 md:py-24 px-4 md:px-8 bg-industrial-900 thin-border-b cad-bg" data-purpose="page-hero">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Engineering <span class="text-primary">Insights</span>
            </h1>
            <p class="text-gray-400 max-w-2xl text-lg">
                Exploring the latest methodologies in sheet metal DFM, bend allowances, and precision drafting.
            </p>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 md:px-8 py-12 flex flex-col lg:flex-row gap-12" data-purpose="main-layout">
        
        <div class="lg:w-2/3" data-purpose="article-listing">
            <div id="blog-posts-grid" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php foreach ($blog_posts as $post): ?>
                <article class="flex flex-col bg-darkBg border border-white/10 rounded-custom overflow-hidden group hover:border-primary/50 transition-colors">
                    <div class="aspect-video overflow-hidden relative">
                         <div class="absolute inset-0 bg-black/40 group-hover:bg-black/10 transition-colors z-10"></div>
                        <img alt="Engineering Insight: <?= htmlspecialchars($post['title']) ?>" title="<?= htmlspecialchars($post['title']) ?>" loading="lazy" width="600" height="400" class="w-full h-full object-cover transition-all duration-500 group-hover:scale-105" src="<?= htmlspecialchars($post['image']) ?>"/>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <span class="text-primary text-xs font-bold uppercase tracking-widest mb-3">Engineering</span>
                        <h2 class="text-xl font-bold text-white mb-3 group-hover:text-primary transition-colors"><?= htmlspecialchars($post['title']) ?></h2>
                        <p class="text-gray-400 font-light text-sm mb-6 flex-grow"><?= htmlspecialchars($post['excerpt']) ?></p>
                        <div class="flex items-center justify-between mt-auto pt-4 border-t border-white/10">
                            <span class="text-xs text-gray-500 font-bold tracking-widest uppercase"><?= date('M d, Y', strtotime($post['date'])) ?></span>
                            <a class="text-xs font-bold uppercase tracking-widest text-primary hover:text-white transition-colors" href="blog/<?= htmlspecialchars($post['slug']) ?>" title="Read full article: <?= htmlspecialchars($post['title']) ?>">Read More +</a>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <!-- No results message -->
            <div id="no-results" class="hidden py-24 text-center">
                <span class="material-symbols-outlined text-6xl text-gray-700 mb-4 block">search_off</span>
                <p class="text-xl text-gray-400 font-light">No engineering insights found for that query.</p>
                <button onclick="document.getElementById('blog-search').value=''; document.getElementById('blog-search').dispatchEvent(new Event('input'));" class="mt-6 text-primary hover:text-white uppercase tracking-widest text-sm font-bold transition-colors">Clear Search</button>
            </div>
        </div>

        <!-- Sidebar -->
        <aside class="lg:w-1/3 space-y-12">
            <section data-purpose="search-widget" aria-label="Search Blog">
                <h2 class="text-sm font-bold uppercase tracking-widest mb-4 flex items-center">
                    <span class="w-2 h-4 bg-primary mr-2"></span> Search Insights
                </h2>
                <div class="relative">
                    <input type="text" id="blog-search" placeholder="Type keywords..." class="w-full bg-darkBg border border-white/10 focus:ring-primary focus:border-primary text-white rounded-custom py-3 px-4 transition-colors">
                </div>
            </section>

            <!-- Newsletter CTA -->
            <section class="bg-darkBg p-6 border border-white/10 rounded-custom" data-purpose="newsletter-widget">
                <h2 class="text-lg font-bold mb-2 uppercase">Technical Briefing</h2>
                <p class="text-gray-400 font-light text-sm mb-4">Get quarterly engineering insights delivered to your inbox.</p>
                <form class="space-y-3" action="https://formspree.io/f/REPLACE_WITH_YOUR_ID" method="POST">
                    <input type="hidden" name="_next" value="https://sheet-metal-design-alpha.vercel.app/thank-you.html">
                    <input type="hidden" name="_subject" value="New Newsletter Subscription from TMD Insights">
                    <input type="email" name="email" placeholder="email@company.com" required class="w-full bg-surface border-white/10 text-sm focus:ring-primary focus:border-primary rounded-custom text-white">
                    <button type="submit" class="w-full bg-primary hover:bg-red-700 transition-colors py-3 text-sm font-bold uppercase tracking-widest rounded-custom text-white shadow-lg shadow-primary/20">Subscribe</button>
                </form>
            </section>

            <!-- Engineering Toolkit -->
            <section class="bg-darkBg p-6 border border-white/10 rounded-custom" data-purpose="engineering-toolkit">
                <h2 class="text-lg font-bold mb-4 flex items-center gap-2 uppercase">
                    <span class="material-symbols-outlined text-primary">handyman</span>
                    Engineering Toolkit
                </h2>
                <div class="space-y-4">
                    <a href="tools/bend-calculator.html" class="flex flex-col items-center justify-center p-6 bg-surface border border-primary/30 hover:border-primary rounded-custom text-center transition-all group" title="Open Our Free Sheet Metal Bend Allowance Calculator">
                        <span class="material-symbols-outlined text-3xl text-gray-400 group-hover:text-white mb-2 transition-colors">calculate</span>
                        <span class="text-sm font-bold uppercase tracking-widest text-white group-hover:text-primary transition-colors">Bend Allowance Calculator</span>
                        <span class="text-xs text-gray-400 font-light mt-2">Free Technical Tool</span>
                    </a>
                    <a href="#" class="flex flex-col items-center justify-center p-6 bg-primary hover:bg-red-700 text-white rounded-custom text-center transition-all group shadow-lg shadow-primary/20" title="Download Our Professional DFM Checklist (PDF)">
                        <span class="material-symbols-outlined text-3xl mb-2">download</span>
                        <span class="text-sm font-bold uppercase tracking-widest">Download DFM Checklist</span>
                        <span class="text-xs text-white/70 font-light mt-2">PDF Lead Magnet</span>
                    </a>
                </div>
            </section>
        </aside>
    </div>
</main>

    <!-- Interactive FAQ Section -->
    <section class="py-24 bg-surface thin-border-t" id="faq">
        <div class="max-w-3xl mx-auto px-6">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold uppercase tracking-tight mb-4">Frequently Asked Questions</h2>
                <div class="h-1 w-20 bg-primary mx-auto"></div>
            </div>
            
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <details class="group bg-darkBg border border-white/10 rounded-custom overflow-hidden transition-all duration-300">
                    <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-6 text-lg hover:text-primary transition-colors">
                        <span>What is the standard tolerance for sheet metal design?</span>
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                        </span>
                    </summary>
                    <div class="text-gray-400 font-light mt-0 p-6 pt-0 leading-relaxed border-t border-white/5">
                        Standard tolerances for sheet metal design typically range from +/- 0.005 inches to +/- 0.015 inches, depending on the material thickness and specific fabrication processes like laser cutting or CNC bending.
                    </div>
                </details>
                <!-- FAQ Item 2 -->
                <details class="group bg-darkBg border border-white/10 rounded-custom overflow-hidden transition-all duration-300">
                    <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-6 text-lg hover:text-primary transition-colors">
                        <span>How does bend allowance affect manufacturing costs?</span>
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                        </span>
                    </summary>
                    <div class="text-gray-400 font-light mt-0 p-6 pt-0 leading-relaxed border-t border-white/5">
                        Accurate bend allowance calculations reduce scrap rates and eliminate the need for trial-and-error prototypes, significantly lowering overall material and labor costs.
                    </div>
                </details>
                <!-- FAQ Item 3 -->
                <details class="group bg-darkBg border border-white/10 rounded-custom overflow-hidden transition-all duration-300">
                    <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-6 text-lg hover:text-primary transition-colors">
                        <span>Which materials are best for outdoor enclosures?</span>
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                        </span>
                    </summary>
                    <div class="text-gray-400 font-light mt-0 p-6 pt-0 leading-relaxed border-t border-white/5">
                        For outdoor enclosures, Aluminum and Stainless Steel are preferred due to their natural corrosion resistance. Galvanized steel or steel with powder coating can also be used effectively depending on the specific environmental requirements.
                    </div>
                </details>
            </div>
        </div>
    </section>

    <!-- Certifications & Standards -->
    <section class="py-12 bg-industrial-900 thin-border-t border-b border-black">
        <div class="max-w-7xl mx-auto px-6 flex flex-col items-center">
            <h3 class="text-xs uppercase tracking-widest text-industrial-500 font-bold mb-8 text-center">Industry Certifications & Standards</h3>
            <div class="flex flex-wrap justify-center gap-12 items-center opacity-70 grayscale hover:grayscale-0 transition-all duration-500">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-4xl">precision_manufacturing</span>
                    <span class="font-bold text-xl tracking-tight">Precision Focused</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-4xl">local_fire_department</span>
                    <div class="flex flex-col">
                        <span class="font-bold text-lg leading-none tracking-tight">AWS</span>
                        <span class="text-[10px] uppercase font-bold tracking-widest">Certified Welding</span>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-4xl">verified_user</span>
                    <div class="flex flex-col">
                        <span class="font-bold text-lg leading-none tracking-tight">AS9100</span>
                        <span class="text-[10px] uppercase font-bold tracking-widest">Aerospace Std</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
<script src="assets/js/blog-search.js"></script>
