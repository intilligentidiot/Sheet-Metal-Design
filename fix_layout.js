const fs = require('fs');
const path = require('path');

const dir = 'public/blog';
const files = fs.readdirSync(dir).filter(f => f.endsWith('.html'));

files.forEach(file => {
    const filePath = path.join(dir, file);
    let content = fs.readFileSync(filePath, 'utf-8');

    // Update the content wrapper
    content = content.replace(
        '<div class="lg:w-3/4 w-full">',
        '<div class="flex-1 min-w-0 w-full">'
    );

    // Update the sidebar wrapper
    content = content.replace(
        '<aside class="lg:w-1/4 w-full sticky top-32 hidden lg:block self-start">',
        '<aside class="w-full lg:w-80 sticky top-32 hidden lg:block shrink-0">'
    );

    fs.writeFileSync(filePath, content, 'utf-8');
    console.log(`Updated ${file}`);
});
