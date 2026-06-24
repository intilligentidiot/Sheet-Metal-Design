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

    // 1. Fix TOC overlapping image on mobile
    // Replace: relative md:sticky top-32
    // With:    relative md:sticky md:top-32
    content = content.replace(/\brelative md:sticky top-32\b/g, 'relative md:sticky md:top-32');

    // 2. Remove overflow-x-hidden from body to prevent fixed navbar/menu bugs on some mobile browsers
    content = content.replace(/<body class="overflow-x-hidden /g, '<body class="');
    content = content.replace(/<body class="overflow-x-hidden"/g, '<body>');

    if (content !== originalContent) {
        fs.writeFileSync(filePath, content, 'utf-8');
        console.log(`Fixed overlap and body overflow in ${filePath}`);
    }
});
