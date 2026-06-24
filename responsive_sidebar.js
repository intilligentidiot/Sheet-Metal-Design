const fs = require('fs');
const path = require('path');

const dir = 'public/blog';
const files = fs.readdirSync(dir).filter(f => f.endsWith('.html'));

files.forEach(file => {
    const filePath = path.join(dir, file);
    let content = fs.readFileSync(filePath, 'utf-8');

    // Make the aside responsive: visible on mobile, not sticky on mobile, with a collapsible detail tag for mobile.
    // Instead of completely rewriting, we can replace the specific classes.
    
    // 1. Update the <aside> classes
    // Replace: <aside class="w-full md:w-64 lg:w-80 sticky top-32 hidden md:block shrink-0 pr-6 xl:pr-12">
    // With:    <aside class="w-full md:w-64 lg:w-80 relative md:sticky top-32 shrink-0 md:pr-6 xl:pr-12 mb-8 md:mb-0 z-40">
    content = content.replace(
        /<aside class="w-full md:w-64 lg:w-80 sticky top-32 hidden md:block shrink-0 pr-6 xl:pr-12">/,
        '<aside class="w-full md:w-64 lg:w-80 relative md:sticky top-32 shrink-0 md:pr-6 xl:pr-12 mb-8 md:mb-0 z-40">'
    );

    // 2. Wrap the <nav> in a <details> tag for mobile, or just let it be a box.
    // Actually, letting it just be a box on mobile is fine, but it might be too tall.
    // Let's add a max-height and overflow-y-auto on mobile, or just leave it.
    // We will just let it be a normal block. It's only headers now, so it's short.

    fs.writeFileSync(filePath, content, 'utf-8');
    console.log(`Made sidebar responsive in ${file}`);
});
