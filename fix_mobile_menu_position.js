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

    // We need to move the Mobile Menu Overlay OUT of the <nav> element.
    // The structure is roughly:
    // <!-- Mobile Menu Overlay -->
    // <div id="mobile-menu" ...>
    //   ...
    // </div>
    // </nav>

    // Let's use a regex to match the mobile menu overlay and the closing </nav> tag
    // Since nested divs exist inside mobile-menu, regex is tricky.
    // But we know it ends right before </nav>
    
    const parts = content.split(/<!-- Mobile Menu Overlay -->/);
    if (parts.length === 2) {
        let beforeMenu = parts[0];
        let rest = parts[1];
        
        // Find the last </nav> in the rest
        // Actually, the mobile menu overlay ends right before the </nav> tag that closes the main nav.
        let navCloseIndex = rest.indexOf('</nav>');
        if (navCloseIndex !== -1) {
            let menuHtml = rest.substring(0, navCloseIndex);
            let afterNav = rest.substring(navCloseIndex + '</nav>'.length);
            
            // Reconstruct:
            content = beforeMenu + '</nav>\n\n    <!-- Mobile Menu Overlay -->' + menuHtml + afterNav;
            
            fs.writeFileSync(filePath, content, 'utf-8');
            console.log(`Moved mobile menu in ${filePath}`);
        }
    }
});
