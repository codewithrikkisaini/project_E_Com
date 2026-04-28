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
                <span>📦</span>
                <span>Products</span>
            </a>

            {{-- Banner --}}
            <a href="{{ url('/admin/banner') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/banner*') }}">
                <span>🖼</span>
                <span>Banner</span>
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
                        <span>Blog</span>
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
                <h1 class="text-3xl font-semibold text-slate-900 lg:text-[42px] lg:leading-none">Enquiries</h1>

                <div class="flex items-center gap-3">
                    <a href="{{ url('/') }}" target="_blank"
                        class="rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200 transition">
                        🌍 View Frontend
                    </a>
                    <div class="relative hidden sm:block">
                        <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-xl text-slate-400">⌕</span>
                        <input type="text" placeholder="Search..."
                            class="w-72 rounded-2xl border border-slate-200 bg-slate-100 py-2.5 pl-11 pr-4 text-sm text-slate-700 outline-none transition focus:border-cyan-400 focus:bg-white focus:ring-2 focus:ring-cyan-100" />
                    </div>
                    <button type="button" class="rounded-full p-2 text-slate-500 transition hover:bg-slate-100 hover:text-slate-700">🔔</button>
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-sky-600 text-sm font-semibold text-white">AU</div>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-8">
            <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-slate-800">{{ ucfirst($type) }} Enquiries</h2>
                    <p class="mt-1 text-sm text-slate-500">View and manage customer enquiries received through the website.</p>
                </div>
            </div>

            @if (session()->has('success'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b border-slate-100 bg-slate-50 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                            <tr>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Customer Info</th>
                                <th class="px-6 py-4">Subject & Message</th>
                                <th class="px-6 py-4">Date</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            @forelse($enquiries as $enquiry)
                                <tr class="transition hover:bg-slate-50/50 {{ $enquiry->status === 'unread' ? 'font-medium text-slate-900' : 'text-slate-600' }}">
                                    <td class="px-6 py-4">
                                        @if($enquiry->status === 'unread')
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-bold text-blue-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span> New
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-bold text-slate-500">
                                                Read
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <span class="{{ $enquiry->status === 'unread' ? 'text-slate-900 font-bold' : 'text-slate-700' }}">{{ $enquiry->name }}</span>
                                            <span class="text-xs text-slate-500">{{ $enquiry->email }}</span>
                                            <span class="text-xs text-slate-500">{{ $enquiry->phone }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 max-w-md">
                                        <div class="flex flex-col gap-1">
                                            @if($enquiry->subject)
                                                <span class="text-slate-800 font-semibold text-xs">{{ $enquiry->subject }}</span>
                                            @endif
                                            <p class="text-slate-600 line-clamp-2 text-xs leading-relaxed">{{ $enquiry->message }}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-slate-500 text-xs">
                                        {{ $enquiry->created_at->format('M d, Y') }}<br>
                                        <span class="text-[10px] opacity-75">{{ $enquiry->created_at->format('h:i A') }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            @if($enquiry->status === 'unread')
                                                <button wire:click="markAsRead({{ $enquiry->id }})" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Mark as Read">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif
                                            <button onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="delete({{ $enquiry->id }})" class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center gap-2">
                                            <span class="text-4xl text-slate-200">📩</span>
                                            <p class="text-slate-500 text-sm font-medium">No {{ $type }} enquiries found yet.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($enquiries->hasPages())
                    <div class="border-t border-slate-100 px-6 py-4">
                        {{ $enquiries->links() }}
                    </div>
                @endif
            </div>
        </section>
    </main>
</div>
