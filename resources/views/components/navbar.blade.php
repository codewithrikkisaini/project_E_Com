<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-500" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
    <!-- Top Bar -->
    <div class="bg-[#1e4620] text-white py-2 px-4 sm:px-8 flex justify-between items-center text-xs font-semibold tracking-wider">
        <div class="hidden sm:flex gap-6">
            <span class="flex items-center gap-2"><i class="fas fa-phone-alt text-green-400"></i> +919719700483</span>
            <span class="flex items-center gap-2"><i class="fas fa-envelope text-green-400"></i> contact.ritiksaini@gmail.com</span>
        </div>
        <div class="flex gap-4">
            <a href="#" class="hover:text-green-400 transition-colors"><i class="fab fa-whatsapp text-lg"></i></a>
            <a href="#" class="hover:text-green-400 transition-colors"><i class="fab fa-facebook-f text-lg"></i></a>
        </div>
    </div>

    <!-- Main Nav -->
    <nav class="bg-white/90 backdrop-blur-xl border-b border-slate-200/50 shadow-sm transition-all duration-300" :class="{ 'py-2': scrolled, 'py-4': !scrolled }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex flex-col group">
                <div class="flex items-center">
                    <span class="text-3xl font-serif font-black text-slate-800">Nick's <span class="text-green-700 font-normal">&</span> Morris</span>
                </div>
                <span class="text-[10px] uppercase tracking-[0.3em] font-black text-slate-500 group-hover:text-green-700 transition-colors">Care for Life</span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-10">
                <a href="{{ route('home') }}" class="text-sm font-black uppercase tracking-widest text-slate-600 hover:text-green-700">Home</a>
                <a href="{{ route('products') }}" class="text-sm font-black uppercase tracking-widest text-slate-600 hover:text-green-700">Buy Products</a>
                <a href="{{ route('about') }}" class="text-sm font-black uppercase tracking-widest text-slate-600 hover:text-green-700">About</a>
                <a href="{{ route('blog') }}" class="text-sm font-black uppercase tracking-widest text-slate-600 hover:text-green-700">Blog</a>
                <a href="{{ route('contact') }}" class="text-sm font-black uppercase tracking-widest text-slate-600 hover:text-green-700">Contact</a>
            </div>

            <!-- Action Buttons -->
            <div class="hidden md:flex items-center gap-4">
                <a href="{{ route('login') }}" class="px-6 py-2.5 border-2 border-slate-800 text-slate-800 text-xs font-black uppercase tracking-widest rounded-full hover:bg-slate-800 hover:text-white transition-all duration-300">
                    Register
                </a>
                <a href="{{ route('products') }}" class="px-7 py-3 bg-[#6b624b] text-white text-xs font-black uppercase tracking-widest rounded-full hover:bg-green-900 transition-all duration-300 shadow-lg shadow-slate-200">
                    Buy Now
                </a>
            </div>
        </div>
    </nav>
</header>
