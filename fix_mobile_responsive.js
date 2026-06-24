const fs = require('fs');
const path = require('path');

function walkDir(dir, callback) {
    fs.readdirSync(dir).forEach(f => {
        let dirPath = path.join(dir, f);
        let isDirectory = fs.statSync(dirPath).isDirectory();
        if (isDirectory) {
            walkDir(dirPath, callback);
        } else if (dirPath.endsWith('.html')) {
            callback(dirPath);
        }
    });
}

const targetDir = 'public';

walkDir(targetDir, (filePath) => {
    let content = fs.readFileSync(filePath, 'utf-8');
    let originalContent = content;

    // 1. Body overflow-x-hidden
    // We match `<body` and add class if it has none, or append to existing class
    // Wait, body has no class currently. `<body class="overflow-x-hidden">`
    if (content.includes('<body>')) {
        content = content.replace('<body>', '<body class="overflow-x-hidden font-sans text-gray-100 antialiased selection:bg-primary/30">');
    } else if (content.includes('<body class="')) {
        if (!content.includes('overflow-x-hidden')) {
            content = content.replace('<body class="', '<body class="overflow-x-hidden ');
        }
    }

    // 2. Mobile Menu overflow-y-auto
    content = content.replace(
        /id="mobile-menu" class="(.*?)"/g,
        (match, classes) => {
            if (!classes.includes('overflow-y-auto')) {
                return `id="mobile-menu" class="${classes} overflow-y-auto"`;
            }
            return match;
        }
    );

    // 3. Footer height overflow: Remove `h-20`
    // Match something like `<div class="max-w-7xl mx-auto px-6 h-20 flex ...">` inside footer
    content = content.replace(/<footer[\s\S]*?<\/footer>/gi, (footerHtml) => {
        // Only replace h-20 if it's inside the footer
        return footerHtml.replace(/\bh-20\b/g, '');
    });

    // 4. Optimization: py-24 -> py-16 md:py-24
    content = content.replace(/\bpy-24\b/g, 'py-16 md:py-24');
    
    // Optimization: py-20 -> py-12 md:py-20
    content = content.replace(/\bpy-20\b/g, 'py-12 md:py-20');

    if (content !== originalContent) {
        fs.writeFileSync(filePath, content, 'utf-8');
        console.log(`Updated mobile responsiveness in ${filePath}`);
    }
});
