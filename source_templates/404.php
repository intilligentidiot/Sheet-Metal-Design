<?php
$page_title = "404 Page Not Found | Tesla Mechanical Designs";
$page_description = "The page you are looking for does not exist or has been moved. Return to the Tesla Mechanical Designs homepage.";
$page_robots = "noindex, nofollow";
$page_canonical = "https://sheetmetal.teslamechanicaldesigns.com/404";
include 'includes/header.php';
?>

    <main class="h-screen flex items-center justify-center text-center px-6">
        <div>
            <h1 class="text-7xl md:text-9xl font-bold text-primary mb-6 tracking-tighter uppercase">404</h1>
            <h2 class="text-3xl md:text-5xl font-bold mb-6 uppercase">Page Not Found</h2>
            <p class="text-lg text-gray-400 mb-10 max-w-lg mx-auto font-light">
                The page you are looking for does not exist, has been removed, had its name changed, or is temporarily unavailable.
            </p>
            <a href="index.php"
                class="inline-block bg-primary hover:bg-red-700 text-white px-8 py-4 rounded-custom text-lg font-bold uppercase transition-all duration-300 shadow-xl shadow-primary/20">
                Return to Homepage
            </a>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>
