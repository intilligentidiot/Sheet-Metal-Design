<?php
$page_title = "Inquiry Received | Tesla Mechanical Designs";
$page_description = "Thank you for contacting Tesla Mechanical Designs. Your inquiry has been received and our engineering team will get back to you shortly.";
$page_robots = "noindex, nofollow";
$page_canonical = "https://sheet-metal-design-alpha.vercel.app/thank-you";
include 'includes/header.php';
?>

    <main class="h-screen flex items-center justify-center text-center px-6">
        <div>
            <div class="inline-flex items-center justify-center w-24 h-24 bg-primary/10 text-primary rounded-full mb-8">
                <span class="material-symbols-outlined text-5xl">check_circle</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 tracking-tighter uppercase">Thank You!</h1>
            <p class="text-lg text-gray-400 mb-10 max-w-lg mx-auto font-light">
                Your message has been received successfully. Our engineering team will review your inquiry and get back to you shortly.
            </p>
            <a href="index.html"
                class="inline-block bg-primary hover:bg-red-700 text-white px-8 py-3 rounded-custom font-bold uppercase text-sm transition-all duration-300 shadow-lg shadow-primary/20"
                title="Explore More Sheet Metal Services or Read Our Blog">
                Back to Homepage
            </a>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>
