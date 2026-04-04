<div class="min-h-screen bg-slate-100 p-4 lg:p-8">
    <div class="mx-auto max-w-5xl space-y-6">
        <div class="flex items-center justify-between gap-3">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 lg:text-3xl">
                    {{ $product ? 'Edit Product' : 'Create Product' }}
                </h1>
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
                        <textarea wire:model.live="description" rows="4"
                            placeholder="Enter a detailed description of your product..."
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
                        <textarea wire:model.live="meta_description" rows="3"
                            placeholder="Description for search results"
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
</div>
