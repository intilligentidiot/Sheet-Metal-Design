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

walkDir('public', (filePath) => {
    let content = fs.readFileSync(filePath, 'utf-8');
    let originalContent = content;

    // Remove any number of </nav> tags right before the mobile menu overlay, replacing them with exactly one.
    content = content.replace(/(?:<\/nav>\s*)+<!-- Mobile Menu Overlay -->/g, '</nav>\n\n    <!-- Mobile Menu Overlay -->');

    // Fix the missing </nav> for the inner menu links
    // The last link ends with mobile-menu-link">Contact</a>
    content = content.replace(/(mobile-menu-link"[^>]*>Contact<\/a>)\s*<div class="mt-auto/g, '$1\n            </nav>\n            <div class="mt-auto');

    if (content !== originalContent) {
        fs.writeFileSync(filePath, content, 'utf-8');
        console.log(`Fixed nav in ${filePath}`);
    }
});
