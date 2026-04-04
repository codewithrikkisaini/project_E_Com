<div class="admin-shell min-h-screen bg-slate-100 lg:flex">
    {{-- Sidebar --}}
    <aside class="w-full border-r border-slate-200 bg-white lg:sticky lg:top-0 lg:h-screen lg:w-72">
        <div class="border-b border-slate-100 px-6 py-5">
            <h2 class="text-xl font-bold text-slate-800">NM</h2>
            <h1 class="text-sm font-medium text-slate-600">Dashboard</h1>
            <p class="text-xs text-gray-400">Nick's & Morris</p>
        </div>

        @php
            $active = fn($path) => request()->is($path)
                ? 'bg-gray-100 text-gray-900'
                : 'text-gray-700 hover:bg-gray-100';
        @endphp

        <nav class="flex-1 space-y-2 overflow-y-auto px-4 py-6">

            {{-- Dashboard --}}
            <a href="{{ url('/admin/dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/dashboard*') }}">
                <span>🏠</span>
                <span class="font-semibold">Dashboard</span>
            </a>

            {{-- Products --}}
            <a href="{{ url('/admin/products') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/products*') }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5v4M15 5v4" />
                </svg>
                <span>Products</span>
            </a>

            {{-- Banner --}}
            <a href="{{ url('/admin/banner') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/banner*') }}">
                <span>🖼</span>
                <span>Banner</span>
            </a>

            {{-- Services --}}
            <a href="{{ url('/admin/services') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/service*') }}">
                <span>🧰</span>
                <span>Services</span>
            </a>

            {{-- About --}}
            <a href="{{ url('/admin/about') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/about*') }}">
                <span>ℹ</span>
                <span>About</span>
            </a>

            {{-- Testimonials --}}
            <a href="{{ url('/admin/testimonials') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/testimonials*') }}">
                <span>💬</span>
                <span>Testimonials</span>
            </a>

            {{-- Orders --}}
            <a href="{{ url('/admin/orders') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/orders*') }}">
                <span>📑</span>
                <span>Orders</span>
            </a>

            {{-- Users --}}
            <a href="{{ url('/admin/users') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/users*') }}">
                <span>👤</span>
                <span>Users</span>
            </a>

            {{-- QR Payment --}}
            <a href="{{ url('/admin/payment-settings') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/payment-settings*') }}">
                <span>💳</span>
                <span>QR Payment</span>
            </a>

            {{-- Settings --}}
            <a href="{{ url('/admin/settings') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/settings*') }}">
                <span>⚙</span>
                <span>Settings</span>
            </a>

            {{-- BLOG DROPDOWN --}}
            <div x-data="{ open: {{ request()->is('admin/blog*') ? 'true' : 'false' }} }">

                <button @click="open = !open"
                    class="flex items-center justify-between w-full px-4 py-3 transition text-gray-700 hover:bg-gray-100">

                    <div class="flex items-center gap-3">
                        <span>📝</span>
                        <span>Blogs</span>
                    </div>

                    <span :class="open && 'rotate-180'">⌄</span>
                </button>

                <div x-show="open" class="pl-8 mt-2 space-y-2">

                    <a href="{{ url('/admin/blog-categories') }}"
                        class="block rounded-lg px-4 py-2 text-sm {{ $active('admin/blog-categories*') }}">
                        Categories
                    </a>

                    <a href="{{ url('/admin/blogs') }}"
                        class="block rounded-lg px-4 py-2 text-sm {{ $active('admin/blogs*') }}">
                        Blogs
                    </a>

                </div>
            </div>

            {{-- ENQUIRIES --}}
            <div class="pt-4 border-t">
                <p class="px-4 text-sm font-semibold text-indigo-600">Enquiries</p>
            </div>

            <a href="{{ url('/admin/enquiries?type=general') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ request()->fullUrlIs('*type=general*') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100' }}">
                <span>📩</span>
                <span>General Enquiry</span>
            </a>

            <a href="{{ url('/admin/enquiries?type=product') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ request()->fullUrlIs('*type=product*') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100' }}">
                <span>📦</span>
                <span>Product Enquiry</span>
            </a>

            {{-- LOGOUT --}}
            <div class="pt-4 border-t">
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:text-red-600 hover:bg-red-50 transition">
                    <span>🚪</span>
                    <span>Logout</span>
                </a>
            </div>

        </nav>
    </aside>

    <main class="flex-1">
        <header class="border-b border-slate-200 bg-white px-4 py-3 lg:px-8">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <h1 class="text-3xl font-semibold text-slate-900 lg:text-[42px] lg:leading-none">Dashboard</h1>

                <div class="flex items-center gap-3">
                    <div class="relative">
                        <span
                            class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-xl text-slate-400">⌕</span>
                        <input type="text" placeholder="Search..."
                            class="w-72 rounded-2xl border border-slate-200 bg-slate-100 py-2.5 pl-11 pr-4 text-sm text-slate-700 outline-none transition focus:border-cyan-400 focus:bg-white focus:ring-2 focus:ring-cyan-100" />
                    </div>
                    <button type="button"
                        class="rounded-full p-2 text-slate-500 transition hover:bg-slate-100 hover:text-slate-700">🔔</button>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-sky-600 text-sm font-semibold text-white">
                        AU</div>
                    <button type="button"
                        class="rounded-full p-2 text-slate-500 transition hover:bg-slate-100 hover:text-slate-700">⌄</button>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-8">
            <div class="admin-card p-6 text-slate-600">
                Header screenshot ke hisaab se set ho gaya. Ab next bol do: cards/table bhi same style me bana deta
                hoon.
            </div>
        </section>
    </main>
</div>
