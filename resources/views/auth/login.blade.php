<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backend Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">
    <div class="grid min-h-screen lg:grid-cols-[1.1fr_0.9fr]">
        <section class="relative flex items-center overflow-hidden bg-gradient-to-br from-[#0f235a] via-[#2447a5] to-[#4a2e84] px-6 py-12 text-white sm:px-10 lg:px-16">
            <div class="absolute inset-0 opacity-25">
                <div class="absolute left-12 top-16 h-44 w-44 rounded-full bg-white/20 blur-3xl"></div>
                <div class="absolute bottom-10 right-12 h-52 w-52 rounded-full bg-cyan-300/20 blur-3xl"></div>
            </div>

            <div class="relative z-10 max-w-xl">
                <p class="text-xs font-semibold uppercase tracking-[0.35em] text-blue-100">Admin Command Center</p>
                <h1 class="mt-4 text-5xl font-bold leading-tight sm:text-6xl">Dynamic business overview for your store</h1>
                <p class="mt-5 max-w-lg text-base leading-7 text-blue-100">Login to manage products, orders, enquiries, payment verification, and content updates from one clean Tailwind-powered backend.</p>

                <div class="mt-8 grid gap-3 sm:grid-cols-3">
                    <div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
                        <p class="text-xs uppercase tracking-wide text-blue-100">Orders today</p>
                        <p class="mt-2 text-3xl font-bold">0</p>
                    </div>
                    <div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
                        <p class="text-xs uppercase tracking-wide text-blue-100">Revenue</p>
                        <p class="mt-2 text-3xl font-bold">₹0.00</p>
                    </div>
                    <div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
                        <p class="text-xs uppercase tracking-wide text-blue-100">Enquiries</p>
                        <p class="mt-2 text-3xl font-bold">0</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="flex items-center justify-center px-6 py-12 sm:px-10 lg:px-16">
            <div class="w-full max-w-md rounded-3xl border border-slate-200 bg-white p-8 shadow-2xl shadow-slate-200/80">
                <div class="text-center">
                    <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">Secure Access</p>
                    <h2 class="mt-3 text-4xl font-bold text-slate-900">Backend Login</h2>
                    <p class="mt-3 text-sm leading-6 text-slate-500">Sign in to open the admin dashboard and manage your storefront.</p>
                </div>

                @if ($errors->any())
                    <div class="mt-5 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="mt-6 space-y-4">
                    @csrf

                    <div>
                        <label for="email" class="mb-1 block text-sm font-medium text-slate-700">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100" />
                    </div>

                    <div>
                        <label for="password" class="mb-1 block text-sm font-medium text-slate-700">Password</label>
                        <input id="password" name="password" type="password" required
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100" />
                    </div>

                    <label class="flex items-center gap-2 text-sm text-slate-600">
                        <input type="checkbox" name="remember" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500" />
                        Remember me
                    </label>

                    <button type="submit" class="w-full rounded-2xl bg-gradient-to-r from-blue-700 to-cyan-600 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:brightness-110">
                        Login & Open Backend
                    </button>
                </form>

                <div class="mt-6 rounded-2xl bg-slate-50 p-4 text-sm text-slate-600">
                    Seeded login:
                    <span class="font-semibold text-slate-900">test@example.com</span>
                    /
                    <span class="font-semibold text-slate-900">password</span>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
