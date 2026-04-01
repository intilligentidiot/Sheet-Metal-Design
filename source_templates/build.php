<?php
/**
 * source_templates/build.php
 * Local Static Site Generator for Cloudflare Pages
 * 
 * Instructions: Run 'php build.php' inside the source_templates folder.
 */

// 1. Define the pages to build (Source => Destination relative to root)
$pages = [
    'index.php' => '../index.html',
    'blog.php' => '../blog.html',
    'contact.php' => '../contact.html',
    '404.php' => '../404.html',
    'thank-you.php' => '../thank-you.html'
];

$php_binary = 'C:\xampp\php\php.exe';

// 2. Build Root Pages
echo "🚀 Starting Static Build from source_templates...\n";

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
$output_blog_dir = '../blog/';

if (!is_dir($output_blog_dir)) {
    mkdir($output_blog_dir, 0777, true);
}

echo "\n📦 Building Blog Articles...\n";

foreach ($blog_files as $source) {
    $file_name = basename($source);
    if ($file_name == 'index.php') continue;
    
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

echo "\n✨ Build Complete! All HTML files are generated in the root directory.\n";
echo "💡 Tip: Only push the .html files and assets to Cloudflare; keep source_templates local.\n";
?>
