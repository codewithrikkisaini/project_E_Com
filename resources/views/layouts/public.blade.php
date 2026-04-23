<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? "Nick's & Morris" }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f6f7f6] text-slate-900 antialiased">
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur">
        <div class="bg-[#2d7138] text-white">
            <div class="mx-auto flex w-full max-w-6xl items-center justify-between px-4 py-2 text-xs sm:px-6">
                <div class="flex flex-wrap items-center gap-4">
                    <span>+91 9719700483</span>
                    <span>contact.ritiksaini@gmail.com</span>
                </div>
                <div class="hidden items-center gap-3 sm:flex">
                    <span>WhatsApp</span>
                    <span>Facebook</span>
                    <span>LinkedIn</span>
                </div>
            </div>
        </div>

        <nav class="mx-auto flex w-full max-w-6xl items-center justify-between px-4 py-4 sm:px-6">
            <a href="{{ route('home') }}" class="text-sm font-bold text-slate-700 sm:text-base">Nick's & Morris</a>

            <div class="hidden items-center gap-7 text-sm font-medium text-slate-600 md:flex">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-slate-900' : 'hover:text-slate-900' }}">Home</a>
                <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'text-slate-900' : 'hover:text-slate-900' }}">Buy Product</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-slate-900' : 'hover:text-slate-900' }}">About</a>
                <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') ? 'text-slate-900' : 'hover:text-slate-900' }}">Blog</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-slate-900' : 'hover:text-slate-900' }}">Contact</a>
            </div>

            <div class="flex items-center gap-2">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-700 sm:text-sm">My Account</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded-full bg-[#6f7053] px-4 py-2 text-xs font-semibold text-white sm:text-sm">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-700 sm:text-sm">My Account</a>
                    <a href="{{ route('services') }}" class="rounded-full bg-[#5b8f6b] px-4 py-2 text-xs font-semibold text-white sm:text-sm">Buy Now</a>
                @endauth
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="mt-20 bg-[#2d7138] text-white">
        <div class="mx-auto grid w-full max-w-6xl gap-10 px-4 py-12 sm:px-6 lg:grid-cols-3">
            <div>
                <h3 class="text-lg font-semibold">Nick's & Morris</h3>
                <p class="mt-3 text-sm text-emerald-100">Admin is ISO 0000.2026 Certified. 25+ years of trusted pharmaceutical partnership and 500+ quality products.</p>
            </div>
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wide text-emerald-100">Latest Products</h4>
                <ul class="mt-3 space-y-2 text-sm text-white/90">
                    <li>NeuroBoost Elite - Advanced Cognitive Support</li>
                    <li>Nf-Xiverin 200 Sustained Release Capsules</li>
                </ul>
            </div>
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wide text-emerald-100">Contact Us</h4>
                <ul class="mt-3 space-y-2 text-sm text-white/90">
                    <li>Phone: +91 9719700483</li>
                    <li>Email: contact.ritiksaini@gmail.com</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/20">
            <div class="mx-auto flex w-full max-w-6xl flex-col justify-between gap-3 px-4 py-4 text-sm text-white/85 sm:flex-row sm:px-6">
                <p>All rights reserved.</p>
                <div class="flex items-center gap-5">
                    <a href="{{ route('about') }}">About</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms & Conditions</a>
                    <a href="#">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
