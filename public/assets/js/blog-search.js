/**
 * blog-search.js
 * Client-side search for the Insights (Blog) page
 */

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('blog-search');
    const postsGrid = document.getElementById('blog-posts-grid');
    const noResults = document.getElementById('no-results');
    
    if (!searchInput || !postsGrid) return;

    const articles = Array.from(postsGrid.getElementsByTagName('article'));

    searchInput.addEventListener('input', (e) => {
        const query = e.target.value.toLowerCase().trim();
        let visibleCount = 0;

        articles.forEach(article => {
            const title = article.querySelector('h2').textContent.toLowerCase();
            const excerpt = article.querySelector('p').textContent.toLowerCase();
            
            const matches = title.includes(query) || excerpt.includes(query);
            
            if (matches) {
                article.style.display = 'flex';
                visibleCount++;
            } else {
                article.style.display = 'none';
            }
        });

        // Toggle no results message
        if (visibleCount === 0 && query !== '') {
            noResults.classList.remove('hidden');
            postsGrid.classList.add('hidden');
        } else {
            noResults.classList.add('hidden');
            postsGrid.classList.remove('grid'); // Reset to grid
            postsGrid.classList.add('grid');
            postsGrid.classList.remove('hidden');
        }
    });
});
