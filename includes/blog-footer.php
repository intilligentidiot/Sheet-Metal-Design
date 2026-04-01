    <footer class="bg-darkBg py-12 thin-border-t mt-auto w-full" aria-label="Footer">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex items-center space-x-2">
                <span class="text-lg font-bold tracking-tight uppercase">TMD <span class="text-primary">Services</span></span>
                <span class="text-gray-600 ml-4 pl-4 border-l border-white/10 text-xs text-center">
                    &copy; <?php echo date("Y"); ?> <?php echo isset($site_name) ? htmlspecialchars($site_name) : 'Tesla Mechanical Designs'; ?>
                </span>
            </div>
            <div class="flex space-x-6 text-xs uppercase tracking-widest text-gray-400 font-semibold">
                <a href="../index.php" class="hover:text-primary transition-colors">Home</a>
                <a href="../blog.php" class="hover:text-primary transition-colors">Blog</a>
                <a href="../contact.php" class="hover:text-primary transition-colors">Contact</a>
            </div>
        </div>
    </footer>
</body>
</html>
