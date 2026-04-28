<div class="admin-shell min-h-screen bg-slate-100 lg:flex">
    <aside class="w-full border-r border-slate-200 bg-white lg:sticky lg:top-0 lg:h-screen lg:w-72">
        <div class="border-b border-slate-100 px-6 py-5">
            <h2 class="text-xl font-bold text-slate-800">NM</h2>
            <h1 class="text-sm font-medium text-slate-600">Dashboard</h1>
            <p class="text-xs text-gray-400">Nick's & Morris</p>
        </div>

        @php
            $active = fn($path) => request()->is($path) ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100';
        @endphp

        <nav class="flex-1 space-y-2 overflow-y-auto px-4 py-6">
            <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/dashboard*') }}"><span>🏠</span><span class="font-semibold">Dashboard</span></a>
            <a href="{{ url('/admin/products') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/products*') }}"><span>📦</span><span>Products</span></a>
            <a href="{{ url('/admin/banner') }}" class="flex items-center gap-3 px-4 py-3 transition {{ request()->is('admin/banner*') ? 'bg-blue-600 text-white rounded-lg' : 'text-gray-700 hover:bg-gray-100' }}"><span>🖼</span><span>Banner</span></a>
            <a href="{{ url('/admin/services') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/services*') }}"><span>🧰</span><span>Services</span></a>
            <a href="{{ url('/admin/about') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/about*') }}"><span>ℹ</span><span>About</span></a>
            <a href="{{ url('/admin/testimonials') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/testimonials*') }}"><span>💬</span><span>Testimonials</span></a>
            <a href="{{ url('/admin/orders') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/orders*') }}"><span>📑</span><span>Orders</span></a>
            <a href="{{ url('/admin/users') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/users*') }}"><span>👤</span><span>Users</span></a>
            <a href="{{ url('/admin/payment-settings') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/payment-settings*') }}"><span>💳</span><span>QR Payment</span></a>
            <a href="{{ url('/admin/settings') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/settings*') }}"><span>⚙</span><span>Settings</span></a>
            
            <div x-data="{ open: {{ request()->is('admin/blog*') ? 'true' : 'false' }} }">
                <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3 transition text-gray-700 hover:bg-gray-100">
                    <div class="flex items-center gap-3"><span>📝</span><span>Blogs</span></div>
                    <span :class="open && 'rotate-180'">⌄</span>
                </button>
                <div x-show="open" class="pl-8 mt-2 space-y-2">
                    <a href="{{ url('/admin/blog-categories') }}" class="block rounded-lg px-4 py-2 text-sm {{ $active('admin/blog-categories*') }}">Categories</a>
                    <a href="{{ url('/admin/blogs') }}" class="block rounded-lg px-4 py-2 text-sm {{ $active('admin/blogs*') }}">Blogs</a>
                </div>
            </div>

            <a href="{{ url('/admin/enquiries?type=general') }}" class="flex items-center gap-3 px-4 py-3 transition {{ request()->fullUrlIs('*type=general*') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100' }}"><span>📩</span><span>General Enquiry</span></a>
            <a href="{{ url('/admin/enquiries?type=product') }}" class="flex items-center gap-3 px-4 py-3 transition {{ request()->fullUrlIs('*type=product*') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100' }}"><span>📦</span><span>Product Enquiry</span></a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 transition hover:bg-red-50 hover:text-red-600"><span>🚪</span><span>Logout</span></a>
        </nav>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-y-auto">
        <header class="border-b border-slate-200 bg-white px-4 py-3 lg:px-8 shrink-0">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <h1 class="text-3xl font-semibold text-slate-900 lg:text-[42px] lg:leading-none">Dashboard</h1>
                <div class="flex items-center gap-3">
                    <a href="{{ url('/') }}" target="_blank" class="rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200 transition">🌍 View Frontend</a>
                    <div class="relative">
                        <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-xl text-slate-400">⌕</span>
                        <input type="text" placeholder="Search..." class="w-72 rounded-2xl border border-slate-200 bg-slate-100 py-2.5 pl-11 pr-4 text-sm text-slate-700 outline-none transition focus:border-cyan-400 focus:bg-white focus:ring-2 focus:ring-cyan-100" />
                    </div>
                    <button type="button" class="rounded-full p-2 text-slate-500 transition hover:bg-slate-100 hover:text-slate-700">🔔</button>
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-sky-600 text-sm font-semibold text-white">AU</div>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-8 flex-1">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-slate-800">Banner</h1>
                <p class="text-sm text-slate-500">Manage home hero banner content and CTA buttons.</p>
            </div>

            @if (session()->has('success'))
                <div class="mb-6 rounded-lg bg-emerald-50 p-4 border border-emerald-200">
                    <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="mb-6 rounded-lg bg-red-50 p-4 border border-red-200">
                    <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 max-w-4xl">
                <form wire:submit="save" class="space-y-6">
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Title</label>
                        <input type="text" wire:model="title" class="block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3">
                        @error('title') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Description</label>
                        <textarea wire:model="description" rows="4" class="block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3"></textarea>
                        @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Banner Image</label>
                        <input type="file" wire:model="image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-1.5 file:px-3 file:rounded file:border file:border-slate-300 file:text-sm file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-100">
                        @error('image') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" class="mt-4 h-32 object-cover rounded border border-slate-200">
                        @elseif ($existingImage)
                            <img src="{{ Storage::url($existingImage) }}" class="mt-4 h-32 object-cover rounded border border-slate-200">
                        @endif
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Button 1 Text</label>
                            <input type="text" wire:model="button1_text" class="block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3">
                            @error('button1_text') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Button 1 URL</label>
                            <input type="text" wire:model="button1_url" class="block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3">
                            @error('button1_url') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Button 2 Text</label>
                            <input type="text" wire:model="button2_text" class="block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3">
                            @error('button2_text') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Button 2 URL</label>
                            <input type="text" wire:model="button2_url" class="block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3">
                            @error('button2_url') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="inline-flex justify-center rounded-lg border border-transparent bg-blue-600 py-2.5 px-6 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Save Banner
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <footer class="border-t border-slate-200 bg-white py-4 mt-auto">
            <p class="text-center text-sm text-slate-500">All rights reserved.</p>
        </footer>
    </main>
</div>
