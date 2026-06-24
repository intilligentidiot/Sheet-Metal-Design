const fs = require('fs');
const path = require('path');

const dir = 'public/blog';
const files = fs.readdirSync(dir).filter(f => f.endsWith('.html'));

files.forEach(file => {
    const filePath = path.join(dir, file);
    let content = fs.readFileSync(filePath, 'utf-8');

    // Find the entire <aside> block.
    const asideRegex = /<!-- Sidebar \(Left\) -->[\s\S]*?<\/aside>/;
    
    // Find the article tag content to parse headings again
    const articleRegex = /<article[^>]*>([\s\S]*?)<\/article>/i;
    const articleMatch = content.match(articleRegex);
    
    if (!articleMatch) {
        return;
    }
    
    let articleContent = articleMatch[1];
    
    // ONLY match h2, ignoring h3 subheadings
    const headingRegex = /<(h2)([^>]*)>(.*?)<\/\1>/gi;
    
    let tocHtml = '';
    
    let headingMatch;
    while ((headingMatch = headingRegex.exec(articleContent)) !== null) {
        let tag = headingMatch[1];
        let attrs = headingMatch[2];
        let text = headingMatch[3];
        
        let idMatch = attrs.match(/id=["']([^"']+)["']/i);
        if (!idMatch) continue; 
        let id = idMatch[1];
        
        // Strip HTML from text
        let cleanText = text.replace(/<[^>]+>/g, '').trim();
        
        tocHtml += `\n                    <a href="#${id}" class="hover:text-white hover:translate-x-1 transition-all duration-300 block font-medium leading-relaxed text-gray-300 border-l-2 border-transparent hover:border-primary pl-2 -ml-2">
                        ${cleanText}
                    </a>`;
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
        console.log(`Updated ${file} to remove subheadings from TOC`);
    }
});
