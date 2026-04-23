<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySite</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-slate-50 text-slate-900 antialiased flex flex-col min-h-screen">
    @php
        $isHome = request()->is('/') || request()->is('');
    @endphp

    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ url('/') }}" class="text-2xl font-bold text-slate-900">
                            MySite
                        </a>
                    </div>
                    <div class="hidden sm:-my-px sm:ml-10 sm:flex sm:space-x-8">
                        <a href="{{ url('/') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors hover:text-blue-600 {{ $isHome ? 'border-blue-600 text-blue-600' : 'border-transparent text-slate-500 hover:border-blue-300' }}">
                            Home
                        </a>
                        <a href="{{ url('/products') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors hover:text-blue-600 {{ request()->is('products') ? 'border-blue-600 text-blue-600' : 'border-transparent text-slate-500 hover:border-blue-300' }}">
                            Buy Product
                        </a>
                        <a href="{{ url('/about') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors hover:text-blue-600 {{ request()->is('about') ? 'border-blue-600 text-blue-600' : 'border-transparent text-slate-500 hover:border-blue-300' }}">
                            About
                        </a>
                        <a href="{{ url('/blog') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors hover:text-blue-600 {{ request()->is('blog') ? 'border-blue-600 text-blue-600' : 'border-transparent text-slate-500 hover:border-blue-300' }}">
                            Blog
                        </a>
                        <a href="{{ url('/contact') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors hover:text-blue-600 {{ request()->is('contact') ? 'border-blue-600 text-blue-600' : 'border-transparent text-slate-500 hover:border-blue-300' }}">
                            Contact
                        </a>
                    </div>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none focus:bg-slate-100 focus:text-slate-500" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ url('/') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors hover:text-blue-600 hover:bg-blue-50 {{ $isHome ? 'border-blue-600 text-blue-600 bg-blue-50' : 'border-transparent text-slate-600 hover:border-blue-300' }}">Home</a>
                <a href="{{ url('/products') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors hover:text-blue-600 hover:bg-blue-50 {{ request()->is('products') ? 'border-blue-600 text-blue-600 bg-blue-50' : 'border-transparent text-slate-600 hover:border-blue-300' }}">Buy Product</a>
                <a href="{{ url('/about') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors hover:text-blue-600 hover:bg-blue-50 {{ request()->is('about') ? 'border-blue-600 text-blue-600 bg-blue-50' : 'border-transparent text-slate-600 hover:border-blue-300' }}">About</a>
                <a href="{{ url('/blog') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors hover:text-blue-600 hover:bg-blue-50 {{ request()->is('blog') ? 'border-blue-600 text-blue-600 bg-blue-50' : 'border-transparent text-slate-600 hover:border-blue-300' }}">Blog</a>
                <a href="{{ url('/contact') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors hover:text-blue-600 hover:bg-blue-50 {{ request()->is('contact') ? 'border-blue-600 text-blue-600 bg-blue-50' : 'border-transparent text-slate-600 hover:border-blue-300' }}">Contact</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
        {{ $slot ?? '' }}
    </main>

    @livewireScripts
</body>
</html>
