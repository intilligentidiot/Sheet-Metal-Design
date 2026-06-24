const fs = require('fs');
const path = require('path');

const dir = 'public/blog';
const files = fs.readdirSync(dir).filter(f => f.endsWith('.html'));

files.forEach(file => {
    const filePath = path.join(dir, file);
    let content = fs.readFileSync(filePath, 'utf-8');

    // Remove the previously injected javascript
    content = content.replace(/<script>\s*document\.addEventListener\("DOMContentLoaded"[\s\S]*?<\/script>/, '');

    // Find the article tag content
    const articleRegex = /<article[^>]*>([\s\S]*?)<\/article>/i;
    const articleMatch = content.match(articleRegex);
    
    if (!articleMatch) {
        console.log(`No article found in ${file}`);
        return;
    }
    
    let articleContent = articleMatch[1];
    const headingRegex = /<(h[23])([^>]*)>(.*?)<\/\1>/gi;
    
    let tocHtml = '';
    let headingCount = 0;
    
    articleContent = articleContent.replace(headingRegex, (match, tag, attrs, text) => {
        let idMatch = attrs.match(/id=["']([^"']+)["']/i);
        let id = idMatch ? idMatch[1] : `heading-${headingCount++}`;
        
        if (!idMatch) {
            attrs += ` id="${id}"`;
        }
        
        let linkClass = "hover:text-primary transition-colors block";
        if (tag.toLowerCase() === 'h3') {
            linkClass += " ml-4 text-xs";
        } else {
            linkClass += " font-medium";
        }
        
        // Strip HTML from text just in case
        let cleanText = text.replace(/<[^>]+>/g, '').trim();
        
        tocHtml += `\n                    <a href="#${id}" class="${linkClass}">${cleanText}</a>`;
        
        return `<${tag}${attrs}>${text}</${tag}>`;
    });
    
    // Replace the article content with updated headings
    content = content.replace(articleMatch[1], articleContent);
    
    // Replace TOC
    const tocRegex = /(<nav id="toc" class="[^"]*toc-container">)[\s\S]*?(<\/nav>)/i;
    content = content.replace(tocRegex, `$1${tocHtml}\n                $2`);
    
    fs.writeFileSync(filePath, content, 'utf-8');
    console.log(`Updated ${file}`);
});
