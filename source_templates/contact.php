<?php
$page_title = "Contact Us for Sheet Metal Design Quote | Tesla Mechanical Designs";
$page_description = "Request a free engineering technical review and competitive quote for your sheet metal design project. DFM analysis, precision drafting, and custom enclosure design.";
$page_canonical = "https://sheet-metal-design-alpha.vercel.app/contact";
$page_og_image = "https://sheet-metal-design-alpha.vercel.app/assets/cad_screenshot.png";
$page_keywords = "Contact TMD, Sheet Metal Quote, DFM Analysis Request, Engineering Technical Review, Sheet Metal Design Services";
$extra_head_content = '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
include 'includes/header.php';
?>

    <main class="pt-32 pb-24 min-h-screen px-6 max-w-4xl mx-auto">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold tracking-tighter uppercase mb-4">Get In <span class="text-primary">Touch</span></h1>
            <p class="text-gray-400 font-light mb-6">Request an engineering technical review and competitive quote for your project.</p>
        </div>

        <div class="bg-surface p-8 md:p-12 rounded-custom border border-white/10 shadow-2xl">
            <!-- Custom Serverless API Backend (Vercel) -->
            <form action="/api/contact" method="POST" class="space-y-6">
                <!-- Data for backend processing -->
                <input type="hidden" name="form_name" value="General Contact">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="firstName" class="block text-sm font-medium text-gray-400 uppercase tracking-widest mb-2">First Name</label>
                        <input type="text" id="firstName" name="firstName" required
                            class="w-full bg-darkBg border border-white/10 rounded-lg px-4 py-3 text-white focus:ring-primary focus:border-primary transition-colors">
                    </div>
                    <div>
                        <label for="lastName" class="block text-sm font-medium text-gray-400 uppercase tracking-widest mb-2">Last Name</label>
                        <input type="text" id="lastName" name="lastName" required
                            class="w-full bg-darkBg border border-white/10 rounded-lg px-4 py-3 text-white focus:ring-primary focus:border-primary transition-colors">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-400 uppercase tracking-widest mb-2">Email Address</label>
                    <input type="email" id="email" name="email" required
                        class="w-full bg-darkBg border border-white/10 rounded-lg px-4 py-3 text-white focus:ring-primary focus:border-primary transition-colors">
                </div>

                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-400 uppercase tracking-widest mb-2">Inquiry Type</label>
                    <select id="subject" name="subject"
                        class="w-full bg-darkBg border border-white/10 rounded-lg px-4 py-3 text-gray-300 focus:ring-primary focus:border-primary transition-colors">
                        <option value="quote">Request a Quote</option>
                        <option value="dfm">DFM Analysis</option>
                        <option value="general">General Inquiry</option>
                    </select>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-400 uppercase tracking-widest mb-2">Message</label>
                    <textarea id="message" name="message" rows="5" required
                        class="w-full bg-darkBg border border-white/10 rounded-lg px-4 py-3 text-white focus:ring-primary focus:border-primary transition-colors"></textarea>
                </div>

                <!-- Google reCAPTCHA v2 -->
                <div class="py-2">
                    <div class="g-recaptcha" data-sitekey="6Lexl6EsAAAAAL1FlWIrCfDJ5XpjLjWtDci3aVmU" style="transform:scale(0.85);-webkit-transform:scale(0.85);transform-origin:0 0;-webkit-transform-origin:0 0;">
                        <!-- Fallback visual block if script not loaded -->
                        <div class="bg-darkBg border border-white/10 rounded px-4 py-6 text-sm text-gray-500 uppercase tracking-widest flex items-center justify-center">
                            [ Google reCAPTCHA v2 Component ]
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-primary hover:bg-red-700 text-white px-8 py-4 rounded-custom text-lg font-bold uppercase transition-all duration-300 shadow-xl shadow-primary/20"
                    title="Send Your Project Technical Inquiry to TMD Services">
                    Submit Inquiry
                </button>
            </form>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>
