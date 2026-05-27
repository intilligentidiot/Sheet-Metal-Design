const fs = require('fs');
const path = require('path');

const files = [
  'C:\\xampp\\htdocs\\Sheet-Metal-Design\\public\\404.html',
  'C:\\xampp\\htdocs\\Sheet-Metal-Design\\public\\blog.html',
  'C:\\xampp\\htdocs\\Sheet-Metal-Design\\public\\contact.html',
  'C:\\xampp\\htdocs\\Sheet-Metal-Design\\public\\faq.html',
  'C:\\xampp\\htdocs\\Sheet-Metal-Design\\public\\index.html',
  'C:\\xampp\\htdocs\\Sheet-Metal-Design\\public\\thank-you.html',
  'C:\\xampp\\htdocs\\Sheet-Metal-Design\\public\\blog\\the-hidden-reasons-your-sheet-metal-parts-crack-at-the-bend.html',
  'C:\\xampp\\htdocs\\Sheet-Metal-Design\\public\\blog\\the-role-of-precision-drafting-in-modern-manufacturing.html',
  'C:\\xampp\\htdocs\\Sheet-Metal-Design\\public\\blog\\top-5-dfm-principles-for-cost-effective-sheet-metal-design.html',
  'C:\\xampp\\htdocs\\Sheet-Metal-Design\\public\\blog\\understanding-bend-deduction-and-bend-allowance-in-cad.html',
  'C:\\xampp\\htdocs\\Sheet-Metal-Design\\public\\tools\\bend-calculator.html'
];

function getRelPath(filePath, targetFile) {
    const dir = path.dirname(filePath);
    const targetPath = path.join('C:\\xampp\\htdocs\\Sheet-Metal-Design\\public', targetFile);
    let rel = path.relative(dir, targetPath).replace(/\\/g, '/');
    return rel;
}

const report = [];

files.forEach(file => {
  let content = fs.readFileSync(file, 'utf8');
  let changed = false;

  const faqRelPath = getRelPath(file, 'faq.html');
  
  // Update Desktop Menu: add FAQ link after Services if not exists
  const desktopServicesRegex = /(<a href="[^"]*#services"[^>]*>Services<\/a>)\s*(?!<a href="[^"]*faq\.html")/i;
  if (desktopServicesRegex.test(content)) {
      content = content.replace(desktopServicesRegex, `$1\n                <a href="${faqRelPath}" class="hover:text-primary transition-colors" title="Frequently Asked Questions">FAQ</a>`);
      changed = true;
  }

  // Update Mobile Menu: add FAQ link after Services if not exists
  const mobileServicesRegex = /(<a href="[^"]*#services"[^>]*>Services<\/a>)\s*(?!<a href="[^"]*faq\.html")/i;
  if (mobileServicesRegex.test(content)) {
      content = content.replace(mobileServicesRegex, `$1\n                <a href="${faqRelPath}" class="hover:text-primary transition-colors mobile-menu-link">FAQ</a>`);
      changed = true;
  }
  
  // Remove duplicate FAQ links if any (sanity check)
  // But wait, the regexes above prevent adding if it already exists right after.
  
  if (changed) {
    fs.writeFileSync(file, content, 'utf8');
  }

  // Extract SEO Data
  const titleMatch = content.match(/<title>(.*?)<\/title>/i);
  const descMatch = content.match(/<meta name="description" content="(.*?)">/i);
  const h1Match = content.match(/<h1[^>]*>(.*?)<\/h1>/si);
  const canonicalMatch = content.match(/<link rel="canonical" href="(.*?)">/i);
  const faqSchemaMatch = content.match(/"@type"\s*:\s*"FAQPage"/i);

  report.push({
      file: path.basename(file),
      title: titleMatch ? titleMatch[1] : null,
      desc: descMatch ? descMatch[1] : null,
      h1: h1Match ? h1Match[1].replace(/<[^>]+>/g, '').trim().replace(/\s+/g, ' ') : null,
      canonical: canonicalMatch ? canonicalMatch[1] : null,
      hasFAQSchema: !!faqSchemaMatch
  });
});

console.log(JSON.stringify(report, null, 2));
