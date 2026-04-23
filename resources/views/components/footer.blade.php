<footer class="bg-slate-950 pt-24 pb-12 overflow-hidden relative">
    <!-- Background Decoration -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-green-900/10 rounded-full blur-3xl -mr-48 -mt-48"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-green-900/10 rounded-full blur-3xl -ml-48 -mb-48"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20">
            <!-- Brand Column -->
            <div class="space-y-8">
                <a href="{{ route('home') }}" class="flex flex-col">
                    <div class="flex items-center">
                        <span class="text-3xl font-serif font-bold text-white">Nick's <span class="text-green-500">&</span> Morris</span>
                    </div>
                    <span class="text-[10px] uppercase tracking-[0.2em] font-bold text-slate-400 mt-[-4px]">Care for Life</span>
                </a>
                <p class="text-slate-400 leading-relaxed font-medium">
                    Bringing you the finest natural products crafted with care and tradition. Our mission is to enhance your life through quality and purity.
                </p>
                <div class="flex space-x-4">
                    @foreach(['whatsapp', 'facebook-f', 'instagram', 'twitter'] as $social)
                        <a href="#" class="w-10 h-10 bg-slate-900 border border-slate-800 rounded-full flex items-center justify-center text-slate-400 hover:bg-green-600 hover:text-white hover:border-green-600 transition-all duration-300">
                            <i class="fab fa-{{ $social }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white font-bold text-lg mb-8 relative">
                    Category Links
                    <span class="absolute bottom-[-12px] left-0 w-12 h-1 bg-green-600 rounded-full"></span>
                </h3>
                <ul class="space-y-4 font-medium">
                    <li><a href="{{ route('home') }}" class="text-slate-400 hover:text-green-500 transition-colors duration-200">Home</a></li>
                    <li><a href="{{ route('products') }}" class="text-slate-400 hover:text-green-500 transition-colors duration-200">Buy Products</a></li>
                    <li><a href="{{ route('about') }}" class="text-slate-400 hover:text-green-500 transition-colors duration-200">About Our Company</a></li>
                    <li><a href="{{ route('blog') }}" class="text-slate-400 hover:text-green-500 transition-colors duration-200">Latest Blogs</a></li>
                    <li><a href="{{ route('contact') }}" class="text-slate-400 hover:text-green-500 transition-colors duration-200">Contact Us</a></li>
                </ul>
            </div>

            <!-- Shop Info -->
            <div>
                <h3 class="text-white font-bold text-lg mb-8 relative">
                    Customer Support
                    <span class="absolute bottom-[-12px] left-0 w-12 h-1 bg-green-600 rounded-full"></span>
                </h3>
                <ul class="space-y-4 font-medium text-slate-400">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt text-green-600 mt-1.5 mr-3"></i>
                        <span>123 Green Valley, Premium Street, New York, NY 10001</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone-alt text-green-600 mr-3"></i>
                        <span>+919719700483</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope text-green-600 mr-3"></i>
                        <span>contact.ritiksaini@gmail.com</span>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h3 class="text-white font-bold text-lg mb-8 relative">
                    Newsletter
                    <span class="absolute bottom-[-12px] left-0 w-12 h-1 bg-green-600 rounded-full"></span>
                </h3>
                <p class="text-slate-400 mb-6 font-medium">Subscribe for updates on new products and exclusive offers.</p>
                <form class="relative">
                    <input type="email" placeholder="Your email address" class="w-full bg-slate-900 border border-slate-800 rounded-2xl px-6 py-4 text-white focus:ring-2 focus:ring-green-600 focus:border-transparent transition-all duration-300">
                    <button type="submit" class="w-12 h-12 bg-green-600 text-white rounded-xl absolute right-2 top-2 flex items-center justify-center hover:bg-green-700 transition-all duration-300">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="pt-12 border-t border-slate-900 flex flex-col md:flex-row justify-between items-center text-slate-500 text-sm font-medium">
            <p>&copy; {{ date('Y') }} <span class="text-white">Nick's & Morris</span>. All rights reserved.</p>
            <div class="flex space-x-8 mt-4 md:mt-0">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-white transition-colors">Shipping Guide</a>
            </div>
        </div>
    </div>
</footer>
