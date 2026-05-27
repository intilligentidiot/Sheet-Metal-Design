const fs = require('fs');

function fixFile(file, description, canonical) {
  let content = fs.readFileSync(file, 'utf8');
  let changed = false;

  if (description && !content.includes('<meta name="description"')) {
      content = content.replace(/<title>(.*?)<\/title>/i, `<title>$1</title>\n    <meta name="description" content="${description}">`);
      changed = true;
  }
  
  if (canonical && !content.includes('<link rel="canonical"')) {
      // Find where to insert, e.g., before closing head
      content = content.replace(/<\/head>/i, `    <link rel="canonical" href="${canonical}">\n</head>`);
      changed = true;
  }

  if (changed) {
    fs.writeFileSync(file, content, 'utf8');
    console.log("Updated: " + file);
  }
}

fixFile('C:\\xampp\\htdocs\\Sheet-Metal-Design\\public\\blog\\the-hidden-reasons-your-sheet-metal-parts-crack-at-the-bend.html',
    "Discover the hidden reasons why your sheet metal parts crack at the bend line, including tight bend radii, grain direction, and material selection issues.",
    "https://sheet-metal-design-alpha.vercel.app/blog/the-hidden-reasons-your-sheet-metal-parts-crack-at-the-bend"
);

fixFile('C:\\xampp\\htdocs\\Sheet-Metal-Design\\public\\tools\\bend-calculator.html',
    "Use our free online sheet metal bend allowance calculator to determine flat pattern dimensions, K-factors, and bend deductions for precision manufacturing.",
    "https://sheet-metal-design-alpha.vercel.app/tools/bend-calculator"
);
