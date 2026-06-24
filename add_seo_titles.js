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

const seoTitles = {
    '/': 'TMD Services - Precision Sheet Metal Design Home',
    '../': 'TMD Services - Precision Sheet Metal Design Home',
    'index.html#services': 'Explore Our Precision Sheet Metal Design & Engineering Services',
    '../index.html#services': 'Explore Our Precision Sheet Metal Design & Engineering Services',
    '#services': 'Explore Our Precision Sheet Metal Design & Engineering Services',
    'faq': 'Answers to Common Questions About Sheet Metal Design',
    '../faq': 'Answers to Common Questions About Sheet Metal Design',
    'blog': 'Read Our Latest Engineering Insights & DFM Strategies',
    '../blog': 'Read Our Latest Engineering Insights & DFM Strategies',
    'tools/bend-calculator': 'Free Sheet Metal Bend Allowance & Deduction Calculator',
    '../tools/bend-calculator': 'Free Sheet Metal Bend Allowance & Deduction Calculator',
    'contact': 'Contact TMD Services to Discuss Your Sheet Metal Project',
    '../contact': 'Contact TMD Services to Discuss Your Sheet Metal Project',
    'mailto:modelingstructuralbim@gmail.com': 'Email TMD Services Engineering Team Directly',
    'blog/the-hidden-reasons-your-sheet-metal-parts-crack-at-the-bend': 'Technical Guide: Why Sheet Metal Parts Crack at the Bend',
    '../blog/the-hidden-reasons-your-sheet-metal-parts-crack-at-the-bend': 'Technical Guide: Why Sheet Metal Parts Crack at the Bend',
    'blog/top-5-dfm-principles-for-cost-effective-sheet-metal-design': 'Engineering Insights: Top 5 DFM Principles for Sheet Metal',
    '../blog/top-5-dfm-principles-for-cost-effective-sheet-metal-design': 'Engineering Insights: Top 5 DFM Principles for Sheet Metal',
    'blog/understanding-bend-deduction-and-bend-allowance-in-cad': 'CAD Tutorial: Understanding Bend Deduction vs. Bend Allowance',
    '../blog/understanding-bend-deduction-and-bend-allowance-in-cad': 'CAD Tutorial: Understanding Bend Deduction vs. Bend Allowance',
    'blog/why-your-complex-sheet-metal-part-costs-far-more-than-it-should': 'Cost Optimization: Why Complex Sheet Metal Parts Cost More',
    '../blog/why-your-complex-sheet-metal-part-costs-far-more-than-it-should': 'Cost Optimization: Why Complex Sheet Metal Parts Cost More',
    'https://www.teslamechanicaldesigns.com/blog/7-basic-principles-of-design-for-manufacturing-dfm-every-designer-should-know/': 'Learn more about the 7 basic principles of Design for Manufacturing (DFM)',
    'https://www.teslamechanicaldesigns.com/blog/top-design-tips-for-design-for-manufacturing-dfm/': 'Read our Top Design Tips for Design for Manufacturing (DFM)'
};

walkDir('public', (filePath) => {
    let content = fs.readFileSync(filePath, 'utf-8');
    let originalContent = content;

    content = content.replace(/<a\s+([^>]*?)href="([^"]+)"([^>]*)>/gi, (match, before, href, after) => {
        let target = seoTitles[href];
        
        // Sometimes href might have a trailing slash or hash that we can map dynamically, 
        // but explicit dictionary mapping is safer and more precise for SEO.
        if (target) {
            let cleanBefore = before.replace(/\btitle="[^"]*"/gi, '').replace(/\s+/g, ' ').trim();
            let cleanAfter = after.replace(/\btitle="[^"]*"/gi, '').replace(/\s+/g, ' ').trim();
            
            let newTag = `<a `;
            if (cleanBefore) newTag += cleanBefore + ' ';
            newTag += `href="${href}"`;
            if (cleanAfter) newTag += ' ' + cleanAfter;
            newTag += ` title="${target}">`;
            
            return newTag;
        }
        return match;
    });

    if (content !== originalContent) {
        fs.writeFileSync(filePath, content, 'utf-8');
        console.log(`Updated SEO titles in ${filePath}`);
    }
});
