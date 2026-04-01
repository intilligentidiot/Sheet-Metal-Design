<?php
$page_title = "Sheet Metal Design Services | Tesla Mechanical Designs";
include 'includes/header.php';
?>

    <main>
        <header class="relative h-screen flex items-center justify-center overflow-hidden bg-darkBg" id="hero">
            <!-- Background: Video Placeholder (replace src with actual video tag when ready) -->
            <div class="absolute inset-0 w-full h-full z-0">
                <img src="assets/manufacturing_floor.png" alt="" class="w-full h-full object-cover" aria-hidden="true">
            </div>
            <!-- Dark Gradient Overlay -->
            <div
                class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-black/50 z-[1] pointer-events-none">
            </div>
            <!-- Video Badge (bottom-left indicator) -->
            <div
                class="absolute bottom-6 left-6 z-20 flex items-center gap-3 bg-black/70 border border-white/10 backdrop-blur-sm rounded-full px-4 py-2">
                <span class="w-2.5 h-2.5 bg-primary rounded-full animate-pulse"></span>
                <span class="text-xs font-bold uppercase tracking-widest text-white/70">Video Placeholder &mdash;
                    Replace with 18s Loop</span>
            </div>
            <div class="grid-overlay absolute inset-0 pointer-events-none z-[2]" aria-hidden="true"></div>
            <div class="container mx-auto px-6 relative z-10 text-center">
                <div class="inline-block px-4 py-1.5 mb-6 border border-primary/40 bg-primary/10 rounded-full">
                    <span class="text-primary text-xs font-bold tracking-[0.2em] uppercase">ISO 9001:2015
                        Certified</span>
                </div>
                <h1 class="text-5xl md:text-8xl font-bold text-white mb-8 tracking-tighter uppercase leading-[0.9]">
                    Precision <br /><span class="text-primary">Sheet Metal</span> Design
                </h1>
                <p class="max-w-2xl mx-auto text-lg md:text-xl text-gray-300 mb-10 font-light leading-relaxed">
                    High-end engineering solutions for complex sheet metal components. From conceptual DFM to functional
                    prototyping with extreme tolerances.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="contact.php"
                        class="w-full sm:w-auto bg-primary hover:bg-red-700 text-white px-10 py-5 rounded-custom text-lg font-bold uppercase transition-all duration-300 shadow-lg shadow-primary/20">
                        Get a Quote
                    </a>
                    <a href="tools/bend-calculator.html"
                        class="w-full sm:w-auto border border-brand hover:border-brand/50 bg-brand/5 backdrop-blur-sm text-brand hover:text-white px-10 py-5 rounded-custom text-lg font-bold uppercase transition-all duration-300">
                        Bend Allowance Calculator
                    </a>
                </div>
            </div>
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce opacity-50">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </header>

        <section class="py-24 bg-darkBg thin-border-t" id="services">
            <div class="max-w-7xl mx-auto px-6">
                <div class="mb-16">
                    <h2 class="text-3xl font-bold uppercase tracking-tight mb-4">Core Capabilities</h2>
                    <div class="h-1 w-20 bg-primary"></div>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-3 gap-[1px] bg-white/10 border border-white/10 rounded-custom overflow-hidden">
                    <div class="bg-surface p-12 hover:bg-white/[0.02] transition-colors group">
                        <div class="mb-8 text-primary">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold uppercase mb-4 group-hover:text-primary transition-colors">Design
                            for Manufacturing (DFM)</h3>
                        <p class="text-gray-400 font-light leading-relaxed mb-6">
                            Design for Manufacturability analysis to reduce production costs, material waste, and lead
                            times without compromising structural integrity.
                        </p>
                        <ul class="text-sm space-y-3 text-gray-500">
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>
                                Bend Allowance calculation</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>
                                Flat Pattern development</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>
                                Tolerance Stack-up Analysis</li>
                        </ul>
                    </div>

                    <div class="bg-surface p-12 hover:bg-white/[0.02] transition-colors group">
                        <div class="mb-8 text-primary">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold uppercase mb-4 group-hover:text-primary transition-colors">
                            Precision Drafting</h3>
                        <p class="text-gray-400 font-light leading-relaxed mb-6">
                            High-fidelity SolidWorks & Inventor modeling tailored specifically for sheet metal
                            workflows, ensuring accurate translation into shop execution.
                        </p>
                        <ul class="text-sm space-y-3 text-gray-500">
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>
                                Detailed 3D Part & Assembly Modeling</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>
                                2D Manufacturing Drawings</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>
                                3D to 2D conversion</li>
                        </ul>
                    </div>

                    <div class="bg-surface p-12 hover:bg-white/[0.02] transition-colors group">
                        <div class="mb-8 text-primary">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.628.283a2 2 0 01-1.631 0l-.628-.283a6 6 0 00-3.86-.517l-2.387.477a2 2 0 00-1.022.547l-1.16 1.16a2 2 0 001.414 3.414h15.414a2 2 0 001.414-3.414l-1.16-1.16z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M12 11V3m0 0l-3 3m3-3l3 3"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold uppercase mb-4 group-hover:text-primary transition-colors">Sheet
                            Metal Enclosures</h3>
                        <p class="text-gray-400 font-light leading-relaxed mb-6">
                            Specialized drafting for custom hardware environments. Accelerated development cycles from
                            conceptual drawing to physical prototype.
                        </p>
                        <ul class="text-sm space-y-3 text-gray-500">
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>
                                Custom Enclosure Design</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>
                                Component Nesting Integration</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>
                                Prototype Design & Support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Us -->
        <section class="py-24 bg-darkBg" id="why-choose-us">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="border-l border-primary/40 pl-8 py-4">
                        <div class="text-4xl font-bold mb-2 text-white">15+</div>
                        <div class="text-xs uppercase tracking-widest text-gray-400 font-semibold">Years Experience
                        </div>
                    </div>
                    <div class="border-l border-primary/40 pl-8 py-4">
                        <div class="text-4xl font-bold mb-2 text-white">99.8%</div>
                        <div class="text-xs uppercase tracking-widest text-gray-400 font-semibold">Precision Rate</div>
                    </div>
                    <div class="border-l border-primary/40 pl-8 py-4">
                        <div class="text-4xl font-bold mb-2 text-white">ISO 9001</div>
                        <div class="text-xs uppercase tracking-widest text-gray-400 font-semibold">Certified Facility
                        </div>
                    </div>
                    <div class="border-l border-primary/40 pl-8 py-4">
                        <div class="text-4xl font-bold mb-2 text-white">24h</div>
                        <div class="text-xs uppercase tracking-widest text-gray-400 font-semibold">Quote Turnaround
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section class="py-24 bg-surface thin-border-t" id="how-it-works">
            <div class="max-w-5xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold uppercase tracking-tight mb-4">How It Works</h2>
                <div class="h-1 w-20 bg-primary mx-auto mb-12"></div>

                <!-- YouTube Click-to-Play Embed -->
                <div id="video-container"
                    class="aspect-video bg-industrial-900 border border-white/10 rounded-custom relative flex items-center justify-center shadow-2xl shadow-black/50 group cursor-pointer overflow-hidden mb-6 w-full"
                    onclick="loadVideo()" aria-label="Play DFM Process Video">
                    <!-- Thumbnail image shown before play -->
                    <div id="video-thumbnail" class="absolute inset-0 w-full h-full">
                        <img src="assets/cad_screenshot.png" alt="DFM Process Video Thumbnail"
                            class="w-full h-full object-cover">
                        <!-- Dark overlay on thumbnail -->
                        <div
                            class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-colors duration-300">
                        </div>
                    </div>
                    <!-- Play button -->
                    <div id="play-btn"
                        class="relative z-20 w-24 h-24 bg-primary rounded-full flex items-center justify-center shadow-xl shadow-primary/40 group-hover:scale-110 group-hover:shadow-primary/60 transition-all duration-300">
                        <span class="material-symbols-outlined text-white text-5xl ml-2">play_arrow</span>
                    </div>
                    <!-- YouTube iframe loads here on click -->
                    <div id="yt-embed-area" class="absolute inset-0 hidden z-30"></div>
                </div>
                <p class="text-gray-400 text-lg font-light italic">"Watch our DFM process in action: From CAD model to
                    Flat Pattern."</p>
                <script>
                    function loadVideo() {
                        var container = document.getElementById('video-container');
                        var thumbnail = document.getElementById('video-thumbnail');
                        var playBtn = document.getElementById('play-btn');
                        var embedArea = document.getElementById('yt-embed-area');
                        // Hide thumbnail and play button
                        thumbnail.style.display = 'none';
                        playBtn.style.display = 'none';
                        // Show YouTube iframe
                        embedArea.classList.remove('hidden');
                        embedArea.innerHTML = '<iframe class="w-full h-full" src="assets/sheet-metal.mp4" title="Sheet Metal DFM Process" frameborder="0" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
                        container.style.cursor = 'default';
                        container.setAttribute('onclick', '');
                    }
                </script>
            </div>
        </section>

        <!-- Process Section -->
        <section class="py-24 bg-darkBg thin-border-t" id="process">
            <div class="max-w-6xl mx-auto px-6">
                <div class="mb-16 text-center">
                    <h2 class="text-3xl font-bold uppercase tracking-tight mb-4">Our Methodology</h2>
                    <div class="h-1 w-20 bg-primary mx-auto"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                    <!-- Connecting Line -->
                    <div
                        class="hidden md:block absolute top-[45px] left-[16.66%] right-[16.66%] h-px bg-industrial-700 z-0">
                    </div>

                    <div class="relative z-10 flex flex-col items-center text-center group">
                        <div
                            class="w-24 h-24 bg-surface border-2 border-industrial-700 rounded-full flex items-center justify-center mb-6 group-hover:border-primary group-hover:bg-primary/5 transition-all duration-500 shadow-xl">
                            <span
                                class="text-3xl font-bold text-industrial-500 group-hover:text-primary transition-colors">1</span>
                        </div>
                        <h3 class="text-xl font-bold uppercase mb-3 text-white">Design Review</h3>
                        <p class="text-gray-400 text-sm font-light">Comprehensive DFM analysis and tolerance stack-up
                            validation.</p>
                    </div>

                    <div class="relative z-10 flex flex-col items-center text-center group">
                        <div
                            class="w-24 h-24 bg-surface border-2 border-industrial-700 rounded-full flex items-center justify-center mb-6 group-hover:border-primary group-hover:bg-primary/5 transition-all duration-500 shadow-xl">
                            <span
                                class="text-3xl font-bold text-industrial-500 group-hover:text-primary transition-colors">2</span>
                        </div>
                        <h3 class="text-xl font-bold uppercase mb-3 text-white">Prototyping</h3>
                        <p class="text-gray-400 text-sm font-light">Rapid iteration with precise flat pattern generation
                            and bend testing.</p>
                    </div>

                    <div class="relative z-10 flex flex-col items-center text-center group">
                        <div
                            class="w-24 h-24 bg-surface border-2 border-industrial-700 rounded-full flex items-center justify-center mb-6 group-hover:border-primary group-hover:bg-primary/5 transition-all duration-500 shadow-xl">
                            <span
                                class="text-3xl font-bold text-industrial-500 group-hover:text-primary transition-colors">3</span>
                        </div>
                        <h3 class="text-xl font-bold uppercase mb-3 text-white">Final Production</h3>
                        <p class="text-gray-400 text-sm font-light">High-volume fabrication executing under certified
                            ISO 9001 quality controls.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <?php include 'includes/latest-blog.php'; ?>

        <!-- Interactive FAQ Section -->
        <section class="py-24 bg-surface thin-border-t" id="faq">
            <div class="max-w-3xl mx-auto px-6">
                <div class="mb-12 text-center">
                    <h2 class="text-3xl font-bold uppercase tracking-tight mb-4">Frequently Asked Questions</h2>
                    <div class="h-1 w-20 bg-primary mx-auto"></div>
                </div>

                <div class="space-y-4">
                    <!-- FAQ Item 1 -->
                    <details
                        class="group bg-darkBg border border-white/10 rounded-custom overflow-hidden transition-all duration-300">
                        <summary
                            class="flex justify-between items-center font-bold cursor-pointer list-none p-6 text-lg hover:text-primary transition-colors">
                            <span>What is the standard tolerance for sheet metal design?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-400 font-light mt-0 p-6 pt-0 leading-relaxed border-t border-white/5">
                            Standard tolerances for sheet metal design typically range from +/- 0.005 inches to +/-
                            0.015 inches, depending on the material thickness and specific fabrication processes like
                            laser cutting or CNC bending.
                        </div>
                    </details>
                    <!-- FAQ Item 2 -->
                    <details
                        class="group bg-darkBg border border-white/10 rounded-custom overflow-hidden transition-all duration-300">
                        <summary
                            class="flex justify-between items-center font-bold cursor-pointer list-none p-6 text-lg hover:text-primary transition-colors">
                            <span>How does bend allowance affect manufacturing costs?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-400 font-light mt-0 p-6 pt-0 leading-relaxed border-t border-white/5">
                            Accurate bend allowance calculations reduce scrap rates and eliminate the need for
                            trial-and-error prototypes, significantly lowering overall material and labor costs.
                        </div>
                    </details>
                    <!-- FAQ Item 3 -->
                    <details
                        class="group bg-darkBg border border-white/10 rounded-custom overflow-hidden transition-all duration-300">
                        <summary
                            class="flex justify-between items-center font-bold cursor-pointer list-none p-6 text-lg hover:text-primary transition-colors">
                            <span>Which materials are best for outdoor enclosures?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-400 font-light mt-0 p-6 pt-0 leading-relaxed border-t border-white/5">
                            For outdoor enclosures, Aluminum and Stainless Steel are preferred due to their natural
                            corrosion resistance. Galvanized steel or steel with powder coating can also be used
                            effectively depending on the specific environmental requirements.
                        </div>
                    </details>
                </div>
            </div>
        </section>

        <!-- Final CTA -->
        <section class="py-24 relative overflow-hidden" id="final-cta" style="background-color: #141414;">
            <div class="grid-overlay absolute inset-0 opacity-20 pointer-events-none"></div>
            <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 tracking-tighter uppercase leading-tight">
                    Ready to start your <br /><span class="text-primary">next project?</span>
                </h2>
                <p class="text-gray-400 text-lg mb-12 max-w-2xl mx-auto font-light">
                    Connect with our engineering team today for a comprehensive technical review and competitive quote.
                </p>
                <a href="contact.php"
                    class="inline-block bg-primary hover:bg-red-700 text-white px-12 py-5 rounded-custom text-xl font-bold uppercase transition-all duration-300 shadow-xl shadow-primary/20">
                    Contact Us Today
                </a>
            </div>
        </section>
    </main>

    <!-- Certifications & Standards -->
    <section class="py-12 bg-industrial-900 thin-border-t border-b border-black">
        <div class="max-w-7xl mx-auto px-6 flex flex-col items-center">
            <h3 class="text-xs uppercase tracking-widest text-industrial-500 font-bold mb-8 text-center">Industry
                Certifications & Standards</h3>
            <div
                class="flex flex-wrap justify-center gap-12 items-center opacity-70 grayscale hover:grayscale-0 transition-all duration-500">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-4xl">workspace_premium</span>
                    <span class="font-bold text-xl tracking-tight">ISO 9001:2015</span>
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
