<?php
/**
 * source_templates/build.php
 * Local Static Site Generator for Vercel Deployment
 * 
 * Instructions: Run 'php build.php' inside the source_templates folder.
 */

// 1. Define the pages to build (Source => Destination relative to root)
$pages = [
    'index.php' => '../public/index.html',
    'blog.php' => '../public/blog.html',
    'contact.php' => '../public/contact.html',
    '404.php' => '../public/404.html',
    'thank-you.php' => '../public/thank-you.html'
];

$php_binary = 'C:\xampp\php\php.exe';

// 2. Build Root Pages
echo "🚀 Starting Static Build for /public directory...\n";

foreach ($pages as $source => $dest) {
    echo "  Generating {$dest} from {$source}... ";
    
    // Execute the PHP file and capture output
    $output = shell_exec("$php_binary $source");
    
    if ($output) {
        file_put_contents($dest, $output);
        echo "✅ Done\n";
    } else {
        echo "❌ Failed\n";
    }
}

// 3. Build Blog Posts
$blog_dir = 'blog/';
$blog_files = glob($blog_dir . "*.php");
$output_blog_dir = '../public/blog/';

echo "\n📦 Building Blog Articles...\n";

foreach ($blog_files as $source) {
    if (basename($source) == 'index.php') continue;
    
    $file_name = basename($source);
    $dest = $output_blog_dir . str_replace('.php', '.html', $file_name);
    echo "  Generating {$dest}... ";
    
    // CD into the blog directory to handle relative includes
    $output = shell_exec("cd blog && $php_binary $file_name");
    
    if ($output) {
        file_put_contents($dest, $output);
        echo "✅ Done\n";
    } else {
        echo "❌ Failed\n";
    }
}

echo "\n✨ Build Complete! All HTML files are generated in the /public folder.\n";
echo "💡 Tip: Push your entire folder to Vercel and set the 'Build Command' to NONE and 'Output Directory' to public.\n";
?>
