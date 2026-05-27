const fs = require('fs');

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

files.forEach(file => {
  let content = fs.readFileSync(file, 'utf8');
  
  // First, completely strip any FAQ links that might have been added
  // This regex looks for FAQ links specifically.
  content = content.replace(/<a[^>]*href="[^"]*faq\.html"[^>]*>FAQ<\/a>/ig, '');

  // Now, add them back cleanly.
  // We have two types of menus: Desktop and Mobile.
  
  // Desktop Menu Regex
  // Looks for the Services link in the Desktop Menu (usually has class="hidden md:flex...")
  const desktopServicesRegex = /(<a href="[^"]*(?:\/)?index\.html#services"[^>]*>Services<\/a>)/i;
  
  // Mobile Menu Regex
  // Looks for the Services link in the Mobile Menu (usually has class="... mobile-menu-link")
  // We can differentiate because mobile links usually have 'mobile-menu-link' class.
  
  // Instead of replacing blindly, let's process line by line or find exact matches.
  // Actually, we can just replace the Services link.
  
  const faqHref = file.includes('blog\\') || file.includes('tools\\') ? '../faq.html' : 'faq.html';
  
  // Let's replace the Desktop Services link
  content = content.replace(
      /(<a href="[^"]*(?:index\.html)?#services"[^>]*class="[^"]*transition-colors(?! mobile-menu-link)[^"]*"[^>]*>Services<\/a>)/i,
      `$1\n                <a href="${faqHref}" class="hover:text-primary transition-colors" title="Frequently Asked Questions">FAQ</a>`
  );

  // Let's replace the Mobile Services link
  content = content.replace(
      /(<a href="[^"]*(?:index\.html)?#services"[^>]*class="[^"]*mobile-menu-link[^"]*"[^>]*>Services<\/a>)/i,
      `$1\n                <a href="${faqHref}" class="hover:text-primary transition-colors mobile-menu-link">FAQ</a>`
  );
  
  // Clean up any double spaces or broken formatting we might have caused
  content = content.replace(/\n\s*\n\s*<a href="[^"]*faq\.html/g, '\n                <a href="' + faqHref);

  fs.writeFileSync(file, content, 'utf8');
});

console.log("Nav bars cleaned up.");
