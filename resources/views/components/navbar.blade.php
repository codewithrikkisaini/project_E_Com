<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-500" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
    <!-- Top Bar -->
    <div class="text-white py-2 px-4 sm:px-8 flex justify-between items-center text-xs font-semibold tracking-wider" style="background-color: {{ $site_settings['settings_header_footer_color'] ?? '#1e4620' }}">
        <div class="hidden sm:flex gap-6">
            @if(!empty($site_settings['settings_mobiles']))
                <span class="flex items-center gap-2"><i class="fas fa-phone-alt text-green-400"></i> {{ $site_settings['settings_mobiles'] }}</span>
            @endif
            @if(!empty($site_settings['settings_email']))
                <span class="flex items-center gap-2"><i class="fas fa-envelope text-green-400"></i> {{ $site_settings['settings_email'] }}</span>
            @endif
        </div>
        <div class="flex gap-4">
            @if(!empty($site_settings['settings_whatsapp']))
                <a href="{{ $site_settings['settings_whatsapp'] }}" target="_blank" class="hover:text-green-400 transition-colors"><i class="fab fa-whatsapp text-lg"></i></a>
            @endif
            @if(!empty($site_settings['settings_facebook']))
                <a href="{{ $site_settings['settings_facebook'] }}" target="_blank" class="hover:text-green-400 transition-colors"><i class="fab fa-facebook-f text-lg"></i></a>
            @endif
            @if(!empty($site_settings['settings_instagram']))
                <a href="{{ $site_settings['settings_instagram'] }}" target="_blank" class="hover:text-green-400 transition-colors"><i class="fab fa-instagram text-lg"></i></a>
            @endif
            @if(!empty($site_settings['settings_youtube']))
                <a href="{{ $site_settings['settings_youtube'] }}" target="_blank" class="hover:text-green-400 transition-colors"><i class="fab fa-youtube text-lg"></i></a>
            @endif
        </div>
    </div>

    <!-- Main Nav -->
    <nav class="bg-white/90 backdrop-blur-xl border-b border-slate-200/50 shadow-sm transition-all duration-300" :class="{ 'py-2': scrolled, 'py-4': !scrolled }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex flex-col group">
                @if(!empty($site_settings['settings_light_logo']))
                    <img src="{{ Storage::url($site_settings['settings_light_logo']) }}" alt="{{ $site_settings['settings_website_name'] ?? 'Logo' }}" class="h-10 object-contain">
                @else
                    <div class="flex items-center">
                        <span class="text-3xl font-serif font-black text-slate-800">{{ $site_settings['settings_website_name'] ?? "Nick's & Morris" }}</span>
                    </div>
                @endif
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
                    Login
                </a>
                <a href="{{ route('products') }}" class="px-7 py-3 bg-[#6b624b] text-white text-xs font-black uppercase tracking-widest rounded-full hover:bg-green-900 transition-all duration-300 shadow-lg shadow-slate-200">
                    Buy Now
                </a>
            </div>
        </div>
    </nav>
</header>
