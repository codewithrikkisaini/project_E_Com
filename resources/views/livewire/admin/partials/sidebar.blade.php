@php
    $active = fn($path) => request()->is($path)
        ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg'
        : 'text-slate-600 hover:bg-slate-100';
@endphp

<aside class="w-[280px] h-screen sticky top-0 bg-white border-r border-slate-200">

    <!-- Logo -->
    <div class="px-6 py-5 border-b">
        <div class="flex items-center gap-3">
            <div class="h-10 w-10 flex items-center justify-center rounded-xl bg-gray-100 font-bold">
                N
            </div>
            <div>
                <p class="font-bold text-lg">Nick's & Morris</p>
                <p class="text-sm text-gray-500">Care for life</p>
            </div>
        </div>
    </div>

    <!-- Menu -->
    <nav class="px-3 py-4 space-y-2">

        <!-- Item -->
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ $active('admin/dashboard*') }}">
            <span>🏠</span>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.products') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ $active('admin/products*') }}">
            <span>📦</span>
            <span>Products</span>
        </a>

        <a href="{{ route('admin.banner') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ $active('admin/banner*') }}">
            <span>🖼</span>
            <span>Banner</span>
        </a>

        <a href="{{ route('admin.about') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ $active('admin/about*') }}">
            <span>ℹ️</span>
            <span>About</span>
        </a>

        <a href="{{ route('admin.testimonials') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ $active('admin/testimonials*') }}">
            <span>💬</span>
            <span>Testimonials</span>
        </a>

        <a href="{{ route('admin.orders') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ $active('admin/orders*') }}">
            <span>📑</span>
            <span>Orders</span>
        </a>

        <a href="{{ route('admin.users') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ $active('admin/users*') }}">
            <span>👤</span>
            <span>Users</span>
        </a>

        <a href="{{ route('admin.payment-settings') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ $active('admin/payment-settings*') }}">
            <span>💳</span>
            <span>QR Payment</span>
        </a>

        <a href="{{ route('admin.settings') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ $active('admin/settings*') }}">
            <span>⚙️</span>
            <span>Settings</span>
        </a>

        <a href="{{ route('admin.blogs') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ $active('admin/blogs*') }}">
            <span>📝</span>
            <span>Blogs</span>
        </a>

        <!-- Divider -->
        <div class="border-t my-4"></div>

        <p class="px-3 text-blue-600 font-semibold">Enquiries</p>

        <a href="{{ url('/admin/enquiries?type=general') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition 
           {{ request()->fullUrlIs('*type=general*') ? 'bg-blue-100 text-blue-700' : 'text-slate-600 hover:bg-slate-100' }}">
            <span>📩</span>
            <span>General</span>
        </a>

        <a href="{{ url('/admin/enquiries?type=product') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition 
           {{ request()->fullUrlIs('*type=product*') ? 'bg-blue-100 text-blue-700' : 'text-slate-600 hover:bg-slate-100' }}">
            <span>📦</span>
            <span>Product</span>
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="pt-4 border-t">
            @csrf
            <button class="w-full flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-red-50 text-red-500">
                <span>🚪</span>
                Logout
            </button>
        </form>

    </nav>
</aside>