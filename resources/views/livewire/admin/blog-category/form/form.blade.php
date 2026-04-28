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
            <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/dashboard*') }}">
                <span>🏠</span>
                <span class="font-semibold">Dashboard</span>
            </a>
            <a href="{{ url('/admin/products') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/products*') }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5v4M15 5v4" />
                </svg>
                <span>Products</span>
            </a>
            <a href="{{ url('/admin/banner') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/banner*') }}"><span>🖼</span><span>Banner</span></a>
            <a href="{{ url('/admin/services') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/services*') }}"><span>🧰</span><span>Services</span></a>
            <a href="{{ url('/admin/about') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/about*') }}"><span>ℹ</span><span>About</span></a>
            <a href="{{ url('/admin/testimonials') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/testimonials*') }}"><span>💬</span><span>Testimonials</span></a>
            <a href="{{ url('/admin/orders') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/orders*') }}"><span>📑</span><span>Orders</span></a>
            <a href="{{ url('/admin/users') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/users*') }}"><span>👤</span><span>Users</span></a>
            <a href="{{ url('/admin/payment-settings') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/payment-settings*') }}"><span>💳</span><span>QR Payment</span></a>
            <a href="{{ url('/admin/settings') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/settings*') }}"><span>⚙</span><span>Settings</span></a>
            
            {{-- BLOG DROPDOWN --}}
            <div x-data="{ open: {{ request()->is('admin/blog*') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full px-4 py-3 transition {{ request()->is('admin/blog*') ? 'bg-blue-600 text-white rounded-lg' : 'text-gray-700 hover:bg-gray-100' }}">
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
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 transition hover:bg-red-50 hover:text-red-600">
                <span>🚪</span><span>Logout</span>
            </a>
        </nav>
    </aside>

    <main class="flex-1">
        <header class="border-b border-slate-200 bg-white px-4 py-3 lg:px-8">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <h1 class="text-3xl font-semibold text-slate-900 lg:text-[42px] lg:leading-none">Dashboard</h1>
                <div class="flex items-center gap-3">
                    <div class="relative">
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
            <div>
                @if($categoryFormOpen)
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                        <h3 class="text-lg font-bold text-slate-800 mb-4">
                            {{ $category ? 'Edit Category' : 'Create New Category' }}
                        </h3>

                        <form wire:submit="save" class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-slate-700">Name</label>
                                <input type="text" id="name" wire:model="name" wire:keyup="generateSlug" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3">
                                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="slug" class="block text-sm font-medium text-slate-700">Slug</label>
                                <input type="text" id="slug" wire:model="slug" class="mt-1 block w-full rounded-md border-slate-300 bg-slate-50 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3">
                                @error('slug') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="pt-4 flex items-center justify-between border-t border-slate-100">
                                <button type="button" wire:click="closeForm" class="text-sm text-slate-500 hover:text-slate-800">Cancel</button>
                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 ml-auto">
                                    {{ $category ? 'Update Category' : 'Save Category' }}
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <h1 class="text-2xl font-bold text-slate-800">Categories</h1>
                            <p class="text-sm text-slate-500">Manage your blog categories</p>
                        </div>
                        <button wire:click="openCreateForm" class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">
                            <i class="fas fa-plus mr-2"></i> Create Category
                        </button>
                    </div>

                    @if (session()->has('success'))
                        <div class="mb-4 rounded-lg bg-emerald-50 p-4 border border-emerald-200">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-emerald-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-emerald-800">
                                        {{ session('success') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                        <div class="p-4 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div class="relative w-full sm:w-72">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                    <i class="fas fa-search"></i>
                                </span>
                                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search categories" class="block w-full rounded-lg border-slate-200 pl-10 focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2">
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-slate-500">Per page:</span>
                                <select class="rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 py-2">
                                    <option>10</option>
                                    <option>25</option>
                                    <option>50</option>
                                </select>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-100">
                                <thead class="bg-slate-50/50">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider w-16">#</th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Name</th>
                                        <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100">
                                    @forelse ($categories as $index => $cat)
                                        <tr class="hover:bg-slate-50/50 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 font-medium">
                                                {{ $categories->firstItem() + $index }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-slate-700">{{ $cat->name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex justify-end gap-2">
                                                    <button wire:click="edit({{ $cat->id }})" class="inline-flex items-center justify-center rounded-full bg-blue-600 px-4 py-1.5 text-xs font-semibold text-white hover:bg-blue-700 transition-colors shadow-sm">
                                                        <i class="fas fa-edit mr-1.5"></i> Edit
                                                    </button>
                                                    <button wire:click="delete({{ $cat->id }})" wire:confirm="Are you sure?" class="inline-flex items-center justify-center rounded-full bg-red-600 px-4 py-1.5 text-xs font-semibold text-white hover:bg-red-700 transition-colors shadow-sm">
                                                        <i class="fas fa-trash-alt mr-1.5"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-6 py-12 text-center text-sm text-slate-500">
                                                No categories found. Create your first category!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        @if($categories->hasPages())
                            <div class="p-4 border-t border-slate-100 flex items-center justify-between">
                                <div class="text-sm text-slate-500">
                                    Showing {{ $categories->firstItem() }}-{{ $categories->lastItem() }} of {{ $categories->total() }} items
                                </div>
                                <div>
                                    {{ $categories->links('pagination::tailwind') }}
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </section>
    </main>
</div>
