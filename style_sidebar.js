const fs = require('fs');
const path = require('path');

const dir = 'public/blog';
const files = fs.readdirSync(dir).filter(f => f.endsWith('.html'));

files.forEach(file => {
    const filePath = path.join(dir, file);
    let content = fs.readFileSync(filePath, 'utf-8');

    // First, let's locate the entire <aside> block.
    // The previous aside was: <aside class="w-full md:w-64 lg:w-72 sticky top-32 hidden md:block shrink-0 md:border-r md:border-white/10 md:pr-8">
    // Wait, the regex might be tricky if I don't match exactly.
    const asideRegex = /<!-- Sidebar \(Left\) -->[\s\S]*?<\/aside>/;
    
    // Find the article tag content to parse headings again
    const articleRegex = /<article[^>]*>([\s\S]*?)<\/article>/i;
    const articleMatch = content.match(articleRegex);
    
    if (!articleMatch) {
        console.log(`No article found in ${file}`);
        return;
    }
    
    let articleContent = articleMatch[1];
    const headingRegex = /<(h[23])([^>]*)>(.*?)<\/\1>/gi;
    
    let tocHtml = '';
    
    // We already injected IDs, so we can just extract them.
    let headingMatch;
    while ((headingMatch = headingRegex.exec(articleContent)) !== null) {
        let tag = headingMatch[1];
        let attrs = headingMatch[2];
        let text = headingMatch[3];
        
        let idMatch = attrs.match(/id=["']([^"']+)["']/i);
        if (!idMatch) continue; // Should have IDs by now
        let id = idMatch[1];
        
        // Strip HTML from text just in case
        let cleanText = text.replace(/<[^>]+>/g, '').trim();
        
        if (tag.toLowerCase() === 'h3') {
            tocHtml += `\n                    <a href="#${id}" class="hover:text-white hover:translate-x-1 transition-all duration-300 block ml-4 text-xs flex items-start gap-2 text-gray-500">
                        <span class="w-1 h-1 rounded-full bg-primary/40 mt-1.5 shrink-0"></span>
                        <span class="leading-relaxed">${cleanText}</span>
                    </a>`;
        } else {
            tocHtml += `\n                    <a href="#${id}" class="hover:text-white hover:translate-x-1 transition-all duration-300 block font-medium leading-relaxed text-gray-300 border-l-2 border-transparent hover:border-primary pl-2 -ml-2">
                        ${cleanText}
                    </a>`;
        }
    }
    
    const newAsideHtml = `<!-- Sidebar (Left) -->
        <aside class="w-full md:w-64 lg:w-80 sticky top-32 hidden md:block shrink-0 pr-6 xl:pr-12">
            <div class="bg-[#111] backdrop-blur-md border border-white/5 border-l-4 border-l-primary rounded-xl p-6 shadow-2xl relative overflow-hidden group">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-primary/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                
                <h3 class="text-xs font-bold uppercase tracking-widest mb-6 text-white flex items-center gap-3">
                    <i class="fa-solid fa-list-ul text-primary"></i> 
                    Table of Contents
                </h3>
                
                <nav id="toc" class="flex flex-col space-y-4 relative z-10">
                    ${tocHtml.trim()}
                </nav>
            </div>
        </aside>`;
        
    // Replace the old aside with the new one
    if (content.match(asideRegex)) {
        content = content.replace(asideRegex, newAsideHtml);
        fs.writeFileSync(filePath, content, 'utf-8');
        console.log(`Updated ${file} with professional sidebar`);
    } else {
        console.log(`Sidebar not found in ${file}`);
    }
});
