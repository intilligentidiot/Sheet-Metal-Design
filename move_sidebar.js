const fs = require('fs');
const path = require('path');

const dir = 'public/blog';
const files = fs.readdirSync(dir).filter(f => f.endsWith('.html'));

files.forEach(file => {
    const filePath = path.join(dir, file);
    let content = fs.readFileSync(filePath, 'utf-8');

    // Find the flex container start
    const flexStartRegex = /<div class="flex flex-col lg:flex-row gap-12 items-start">/;
    
    // Find the aside block
    const asideRegex = /<aside class="w-full lg:w-80 sticky top-32 hidden lg:block shrink-0">[\s\S]*?<\/aside>/;
    const asideMatch = content.match(asideRegex);
    
    if (asideMatch) {
        // Remove the aside from its current position
        content = content.replace(asideMatch[0], '');
        
        // Remove empty lines left behind
        content = content.replace(/\s+<\/div>\s+<\/main>/, '\n    </div>\n</main>');

        // Modify aside to have a right border and trigger on md
        let newAside = asideMatch[0]
            .replace('w-full lg:w-80 sticky top-32 hidden lg:block shrink-0', 'w-full md:w-64 lg:w-72 sticky top-32 hidden md:block shrink-0 md:border-r md:border-white/10 md:pr-8')
            .replace('bg-darkBg border border-white/10 rounded-custom p-6', 'bg-darkBg border border-white/10 rounded-custom p-6 shadow-lg');
            
        // Modify flex container to trigger on md
        content = content.replace('flex flex-col lg:flex-row gap-12 items-start', 'flex flex-col md:flex-row gap-8 lg:gap-12 items-start');
        
        // Insert aside RIGHT AFTER the flex container start (so it's on the left)
        content = content.replace(
            '<div class="flex flex-col md:flex-row gap-8 lg:gap-12 items-start">', 
            `<div class="flex flex-col md:flex-row gap-8 lg:gap-12 items-start">\n        <!-- Sidebar (Left) -->\n        ${newAside}`
        );
        
        fs.writeFileSync(filePath, content, 'utf-8');
        console.log(`Updated ${file} to have left sidebar on md screens`);
    }
});
