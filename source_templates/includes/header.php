<?php include_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en" class="<?= $is_dark_mode ? 'dark' : '' ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_description) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($page_keywords) ?>">
    <meta name="author" content="<?= htmlspecialchars($site_name) ?>">
    <meta name="robots" content="<?= htmlspecialchars($page_robots) ?>">
    <meta name="theme-color" content="#c2410c">

    <!-- Canonical URL -->
    <link rel="canonical" href="<?= htmlspecialchars($page_canonical) ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:site_name" content="<?= htmlspecialchars($site_name) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($page_description) ?>">
    <meta property="og:type" content="<?= htmlspecialchars($page_og_type) ?>">
    <meta property="og:url" content="<?= htmlspecialchars($page_canonical) ?>">
    <meta property="og:image" content="<?= htmlspecialchars($page_og_image) ?>">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($page_title) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($page_description) ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($page_og_image) ?>">

    <?php if (isset($google_verification)): ?>
    <meta name="google-site-verification" content="<?= htmlspecialchars($google_verification) ?>" />
    <?php endif; ?>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="assets/js/tailwind-config.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            background-color: #0a0a0a;
            color: #fff;
            font-family: "Space Grotesk", sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .cad-bg {
            background-image: linear-gradient(rgba(10, 10, 10, 0.85), rgba(10, 10, 10, 0.85)), url('assets/cad_screenshot.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .grid-overlay {
            background-image: linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .carousel-track {
            display: flex;
            width: calc(250px * 10);
            animation: scroll 40s linear infinite;
        }

        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-250px * 5)); }
        }

        .thin-border-b { border-bottom: 1px solid rgba(255, 255, 255, 0.1); }
        .thin-border-t { border-top: 1px solid rgba(255, 255, 255, 0.1); }
    </style>

    <!-- Organization Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Tesla Mechanical Designs",
        "url": "<?= $site_url ?>",
        "logo": "<?= $site_url ?>/apple-touch-icon.png",
        "description": "High-end engineering solutions for complex sheet metal components. DFM analysis, precision drafting, and custom enclosure design.",
        "contactPoint": {
            "@type": "ContactPoint",
            "contactType": "sales",
            "url": "<?= $site_url ?>/contact"
        },
        "sameAs": [
            "https://www.teslamechanicaldesigns.com"
        ]
    }
    </script>

    <!-- WebSite Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "TMD Services",
      "url": "<?= $site_url ?>",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "<?= $site_url ?>/blog?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>

    <?php if (isset($extra_head_content)) echo $extra_head_content; ?>
</head>

<body>

    <nav class="fixed top-0 w-full z-50 bg-darkBg/80 backdrop-blur-md thin-border-b" aria-label="Main Navigation">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
                <a href="index.html" class="text-xl font-bold tracking-tight uppercase" title="TMD Services - Precision Sheet Metal Home">
                    TMD <span class="text-primary">Services</span>
                </a>
            </div>
            <div class="hidden md:flex space-x-8 text-sm font-medium tracking-wide uppercase">
                <a href="index.html#services" class="hover:text-primary transition-colors" title="Explore Our Sheet Metal Design Capabilities">Services</a>
                <a href="blog.html" class="hover:text-primary transition-colors" title="Read Our Latest Engineering Insights">Insights (Blog)</a>
                <a href="tools/bend-calculator.html" class="hover:text-primary transition-colors" title="Use Our Free Bend Allowance Calculator">Tools</a>
            </div>
            <div>
                <a href="contact.html"
                    class="inline-block bg-primary hover:bg-red-700 text-white px-6 py-2 rounded-custom text-sm font-bold uppercase transition-all duration-300"
                    title="Request a Detailed Project Quote">
                    Contact Us
                </a>
            </div>
        </div>
    </nav>
