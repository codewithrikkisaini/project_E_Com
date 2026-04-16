@php
    $active = fn($path) => request()->is($path)
        ? 'bg-sky-50 text-sky-700 shadow-sm ring-1 ring-sky-200'
        : 'text-slate-700 hover:bg-slate-100';
@endphp

<aside class="w-full border-r border-slate-200 bg-white lg:sticky lg:top-0 lg:h-screen lg:w-72">
    <div class="border-b border-slate-100 px-6 py-5">
        <p class="text-xs font-semibold uppercase tracking-wider text-sky-600">Admin Panel</p>
        <h2 class="mt-2 text-2xl font-bold text-slate-900">NM Dashboard</h2>
        <p class="text-sm text-slate-500">Nick's & Morris</p>
    </div>

    <nav class="flex-1 space-y-2 overflow-y-auto px-4 py-4">
        <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 transition {{ $active('admin/dashboard*') }}">
            <span class="text-lg">🏠</span>
            <span class="font-semibold">Dashboard</span>
        </a>

        <a href="{{ url('/admin/products') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 transition {{ $active('admin/products*') }}">
            <span class="text-lg">🛍</span>
            <span>Products</span>
        </a>

        <a href="{{ url('/admin/banner') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 transition {{ $active('admin/banner*') }}">
            <span class="text-lg">🖼</span>
            <span>Banner</span>
        </a>

        <a href="{{ url('/admin/services') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 transition {{ $active('admin/services*') }}">
            <span class="text-lg">🧰</span>
            <span>Services</span>
        </a>

        <a href="{{ url('/admin/about') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 transition {{ $active('admin/about*') }}">
            <span class="text-lg">ℹ️</span>
            <span>About</span>
        </a>

        <a href="{{ url('/admin/testimonials') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 transition {{ $active('admin/testimonials*') }}">
            <span class="text-lg">💬</span>
            <span>Testimonials</span>
        </a>

        <a href="{{ url('/admin/orders') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 transition {{ $active('admin/orders*') }}">
            <span class="text-lg">📑</span>
            <span>Orders</span>
        </a>

        <a href="{{ url('/admin/users') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 transition {{ $active('admin/users*') }}">
            <span class="text-lg">👤</span>
            <span>Users</span>
        </a>

        <a href="{{ url('/admin/payment-settings') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 transition {{ $active('admin/payment-settings*') }}">
            <span class="text-lg">💳</span>
            <span>QR Payment</span>
        </a>

        <a href="{{ url('/admin/settings') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 transition {{ $active('admin/settings*') }}">
            <span class="text-lg">⚙️</span>
            <span>Settings</span>
        </a>

        <div class="border-t border-slate-200 pt-4">
            <p class="px-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Blogs</p>
        </div>

        <a href="{{ url('/admin/blog-categories') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 transition {{ $active('admin/blog-categories*') }}">
            <span class="text-lg">🏷️</span>
            <span>Blog Categories</span>
        </a>

        <a href="{{ url('/admin/blogs') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 transition {{ $active('admin/blogs*') }}">
            <span class="text-lg">📝</span>
            <span>Blogs</span>
        </a>

        <div class="border-t border-slate-200 pt-4">
            <p class="px-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Enquiries</p>
        </div>

        <a href="{{ url('/admin/enquiries?type=general') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition {{ request()->fullUrlIs('*type=general*') ? 'bg-sky-50 text-sky-700 shadow-sm ring-1 ring-sky-200' : 'text-slate-700 hover:bg-slate-100' }}">
            <span class="text-lg">📩</span>
            <span>General Enquiry</span>
        </a>

        <a href="{{ url('/admin/enquiries?type=product') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition {{ request()->fullUrlIs('*type=product*') ? 'bg-sky-50 text-sky-700 shadow-sm ring-1 ring-sky-200' : 'text-slate-700 hover:bg-slate-100' }}">
            <span class="text-lg">📦</span>
            <span>Product Enquiry</span>
        </a>
    </nav>
</aside>
