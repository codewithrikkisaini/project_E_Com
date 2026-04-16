<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'E-Com' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 antialiased">
    <div class="fixed inset-0 -z-10 bg-[radial-gradient(circle_at_20%_20%,#0ea5e930_0,#020617_45%),radial-gradient(circle_at_80%_0,#22c55e26_0,#020617_35%),linear-gradient(135deg,#020617,#0f172a)]"></div>

    <header class="sticky top-0 z-40 border-b border-white/10 bg-slate-950/70 backdrop-blur">
        <nav class="mx-auto flex w-full max-w-6xl items-center justify-between px-4 py-4 sm:px-6">
            <a href="{{ route('home') }}" class="text-lg font-extrabold tracking-wide text-cyan-300">E-COM</a>

            <div class="flex items-center gap-2 text-sm font-semibold sm:gap-4">
                <a href="{{ route('home') }}" class="rounded-full px-3 py-1.5 transition {{ request()->routeIs('home') ? 'bg-cyan-400/20 text-cyan-200' : 'text-slate-300 hover:text-white' }}">Home</a>
                <a href="{{ route('about') }}" class="rounded-full px-3 py-1.5 transition {{ request()->routeIs('about') ? 'bg-cyan-400/20 text-cyan-200' : 'text-slate-300 hover:text-white' }}">About</a>
                <a href="{{ route('services') }}" class="rounded-full px-3 py-1.5 transition {{ request()->routeIs('services') ? 'bg-cyan-400/20 text-cyan-200' : 'text-slate-300 hover:text-white' }}">Services</a>
                <a href="{{ route('contact') }}" class="rounded-full px-3 py-1.5 transition {{ request()->routeIs('contact') ? 'bg-cyan-400/20 text-cyan-200' : 'text-slate-300 hover:text-white' }}">Contact</a>

                @auth
                    <a href="{{ route('admin.dashboard') }}" class="rounded-full bg-emerald-400/20 px-3 py-1.5 text-emerald-200 hover:bg-emerald-400/30">Backend</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="rounded-full bg-rose-400/20 px-3 py-1.5 text-rose-200 hover:bg-rose-400/30">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="rounded-full bg-cyan-500 px-3 py-1.5 text-slate-950 hover:bg-cyan-400">Login</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="mx-auto w-full max-w-6xl px-4 py-12 sm:px-6">
        @yield('content')
    </main>
</body>
</html>
