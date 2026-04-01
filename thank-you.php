<?php
$page_title = "Thank You | Tesla Mechanical Designs";
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
            <a href="index.php"
                class="inline-block border border-primary text-primary hover:bg-primary hover:text-white px-8 py-4 rounded-custom text-lg font-bold uppercase transition-all duration-300 shadow-xl shadow-primary/20">
                Back to Homepage
            </a>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>
