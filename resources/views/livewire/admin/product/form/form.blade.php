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
            <a href="{{ url('/admin/blogs') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/blogs*') }}"><span>📝</span><span>Blogs</span></a>
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
                <h1 class="text-3xl font-semibold text-slate-900 lg:text-[42px] lg:leading-none">Products</h1>
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

        <section class="space-y-6 p-4 lg:p-8">
            <div class="mx-auto max-w-5xl space-y-6">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 lg:text-3xl">
                            {{ $product ? 'Edit Product' : 'Create Product' }}
                        </h2>
                        <p class="text-sm text-slate-500">Add product details, image, and SEO information.</p>
                    </div>

                    @if ($product)
                        <button type="button" wire:click="createNew"
                            class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
                            New Product
                        </button>
                    @endif
                </div>

                @if (session('success'))
                    <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="rounded-xl border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-700">
                        {{ session('error') }}
                    </div>
                @endif

                <form wire:submit="save" class="space-y-6">
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm lg:p-7">
                        <h2 class="text-lg font-semibold text-slate-800">Product Details</h2>
                        <p class="mt-1 text-xs text-slate-500">Fill the basic information for your product.</p>

                        <div class="mt-5 grid gap-5 lg:grid-cols-2">
                            <div class="lg:col-span-2">
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Product Name *</label>
                                <input type="text" wire:model.live="name" placeholder="Premium Laptop Stand"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                                @error('name')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="lg:col-span-2">
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">URL Slug *</label>
                                <input type="text" wire:model.live="slug"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                                @error('slug')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Stock *</label>
                                <input type="number" min="0" wire:model.live="stock"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                                @error('stock')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Price *</label>
                                <input type="number" step="0.01" min="0" wire:model.live="price"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                                @error('price')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="lg:col-span-2">
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Description</label>
                                <textarea wire:model.live="description" rows="4" placeholder="Enter a detailed description of your product..."
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white"></textarea>
                                @error('description')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="lg:col-span-2">
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Product Content</label>
                                <textarea wire:model.live="content" rows="6"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white"></textarea>
                                @error('content')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm lg:p-7">
                        <h2 class="text-lg font-semibold text-slate-800">Product Image & SEO</h2>
                        <p class="mt-1 text-xs text-slate-500">Upload product image and optimize for search engines.</p>

                        <div class="mt-5 space-y-5">
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Product Image</label>
                                <input type="file" wire:model="image" accept="image/png,image/jpeg,image/webp"
                                    class="block w-full rounded-xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3 text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-blue-600 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-white" />
                                <p class="mt-1 text-xs text-slate-500">Supports: PNG, JPG, WEBP (Max 4MB)</p>
                                @error('image')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror

                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" alt="Preview"
                                        class="mt-3 h-24 w-24 rounded-xl border border-slate-200 object-cover" />
                                @elseif($existingImage)
                                    <img src="{{ asset('storage/' . $existingImage) }}" alt="Current image"
                                        class="mt-3 h-24 w-24 rounded-xl border border-slate-200 object-cover" />
                                @endif
                            </div>

                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Meta Title</label>
                                <input type="text" wire:model.live="meta_title" placeholder="SEO-friendly title"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                                @error('meta_title')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Meta Description</label>
                                <textarea wire:model.live="meta_description" rows="3" placeholder="Description for search results"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white"></textarea>
                                @error('meta_description')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Meta Keywords</label>
                                <input type="text" wire:model.live="meta_keywords" placeholder="keyword1, keyword2"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                                @error('meta_keywords')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('admin.products') }}"
                            class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50">
                            Cancel
                        </a>
                        <button type="submit"
                            class="rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700">
                            {{ $product ? 'Update Product' : 'Create Product' }}
                        </button>
                    </div>
                </form>

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm lg:p-7">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-800">Products Index</h2>
                            <p class="text-xs text-slate-500">Form ke sath yahi par products list bhi hai.</p>
                        </div>
                        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search by name or slug..."
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white sm:w-80" />
                    </div>

                    <div class="mt-5 overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200 text-sm">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Name</th>
                                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Slug</th>
                                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Price</th>
                                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Stock</th>
                                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Created</th>
                                    <th class="px-4 py-3 text-right font-semibold text-slate-600">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($products as $item)
                                    <tr>
                                        <td class="px-4 py-3 font-medium text-slate-800">{{ $item->name }}</td>
                                        <td class="px-4 py-3 text-slate-600">{{ $item->slug }}</td>
                                        <td class="px-4 py-3 text-slate-600">{{ number_format((float) $item->price, 2) }}</td>
                                        <td class="px-4 py-3 text-slate-600">{{ $item->stock }}</td>
                                        <td class="px-4 py-3 text-slate-600">{{ $item->created_at?->format('d M Y') }}</td>
                                        <td class="px-4 py-3 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <button type="button" wire:click="edit({{ $item->id }})"
                                                    class="rounded-lg border border-blue-200 px-3 py-1.5 text-xs font-semibold text-blue-700 hover:bg-blue-50">
                                                    Edit
                                                </button>
                                                <button type="button" wire:click="delete({{ $item->id }})"
                                                    wire:confirm="Are you sure you want to delete this product?"
                                                    class="rounded-lg border border-rose-200 px-3 py-1.5 text-xs font-semibold text-rose-700 hover:bg-rose-50">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-8 text-center text-slate-500">No products found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
