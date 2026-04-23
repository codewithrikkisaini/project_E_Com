@props(['isHome' => false])
@php
    $navItems = [
        ['name' => 'Home', 'url' => route('home'), 'active' => request()->routeIs('home')],
        ['name' => 'Buy Product', 'url' => route('products'), 'active' => request()->routeIs('products')],
        ['name' => 'About', 'url' => route('about'), 'active' => request()->routeIs('about')],
        ['name' => 'Blog', 'url' => route('blog'), 'active' => request()->routeIs('blog')],
        ['name' => 'Contact', 'url' => route('contact'), 'active' => request()->routeIs('contact')],
    ];
@endphp

<div class="fixed w-full z-50">
    <!-- Top Bar -->
    <div class="bg-[#1e4620] text-white py-2 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex justify-between items-center text-sm font-medium">
            <div class="flex items-center space-x-6">
                <a href="tel:+919719700483" class="flex items-center hover:text-green-200 transition-colors">
                    <i class="fas fa-phone-alt mr-2"></i>
                    <span>+919719700483</span>
                </a>
                <a href="mailto:contact.ritiksaini@gmail.com" class="hidden md:flex items-center hover:text-green-200 transition-colors">
                    <i class="fas fa-envelope mr-2"></i>
                    <span>contact.ritiksaini@gmail.com</span>
                </a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="hover:text-green-200 transition-colors text-lg"><i class="fab fa-whatsapp"></i></a>
                <a href="#" class="hover:text-green-200 transition-colors text-lg"><i class="fab fa-facebook-f"></i></a>
            </div>
        </div>
    </div>

    <!-- Main Navbar -->
    <nav x-data="{ mobileMenuOpen: false }" class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex flex-col">
                        <div class="flex items-center">
                            <span class="text-3xl font-serif font-bold text-slate-800">Nick's <span class="text-green-800">&</span> Morris</span>
                        </div>
                        <span class="text-[10px] uppercase tracking-[0.2em] font-bold text-slate-400 mt-[-4px]">Care for Life</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-8">
                    @foreach($navItems as $item)
                        <a href="{{ $item['url'] }}" 
                           class="text-[15px] font-semibold transition-colors duration-200 {{ $item['active'] ? 'text-green-700' : 'text-slate-600 hover:text-green-700' }}">
                            {{ $item['name'] }}
                        </a>
                    @endforeach
                </div>

                <!-- Action Buttons -->
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="px-6 py-2 border border-slate-300 rounded-xl text-slate-700 font-bold hover:bg-slate-50 transition-all duration-200">
                        Register
                    </a>
                    <a href="{{ route('products') }}" class="px-7 py-2.5 bg-[#6b624b] text-white rounded-xl font-bold hover:bg-[#5a523e] transition-all duration-200 shadow-lg">
                        Buy Now
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="lg:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="text-slate-600 hover:text-green-700">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-cloak class="lg:hidden bg-slate-50 border-t border-slate-100">
            <div class="px-4 py-6 space-y-3">
                @foreach($navItems as $item)
                    <a href="{{ $item['url'] }}" class="block px-4 py-3 rounded-lg text-base font-bold {{ $item['active'] ? 'bg-green-50 text-green-700' : 'text-slate-600 hover:bg-green-50 hover:text-green-700' }}">
                        {{ $item['name'] }}
                    </a>
                @endforeach
                <div class="grid grid-cols-2 gap-4 mt-6 px-4">
                    <a href="{{ route('login') }}" class="flex items-center justify-center px-4 py-3 rounded-lg border border-slate-300 font-bold text-slate-700">Register</a>
                    <a href="{{ route('products') }}" class="flex items-center justify-center px-4 py-3 rounded-lg bg-[#6b624b] text-white font-bold">Buy Now</a>
                </div>
            </div>
        </div>
    </nav>
</div>

<!-- Spacer to prevent content from hiding behind fixed navbar -->
<div class="h-28"></div>
