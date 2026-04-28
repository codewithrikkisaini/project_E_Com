<div class="admin-shell min-h-screen bg-slate-50 lg:flex">
    <x-admin.sidebar />

    <main class="flex-1">
        <!-- Premium Header -->
        <header class="sticky top-0 z-40 border-b border-slate-200/60 bg-white/80 backdrop-blur-md px-4 py-4 lg:px-10">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight lg:text-3xl">Inventory <span class="text-indigo-600">Pro</span></h1>
                    <div class="flex items-center gap-2 mt-1 text-xs font-bold text-slate-500 uppercase tracking-widest">
                        <span>Admin</span>
                        <i class="fas fa-chevron-right text-[8px]"></i>
                        <span class="text-indigo-500">Products</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="relative hidden xl:block">
                        <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" placeholder="Quick search..."
                            class="w-80 rounded-2xl border-none bg-slate-100 py-3 pl-11 pr-4 text-sm text-slate-700 outline-none ring-1 ring-slate-200 transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                    </div>
                    
                    <div class="flex items-center gap-2 border-l border-slate-200 pl-4">
                        <button type="button" class="relative rounded-xl p-2.5 text-slate-500 transition hover:bg-slate-100 hover:text-indigo-600">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="absolute top-2 right-2 w-2 h-2 bg-rose-500 rounded-full border-2 border-white"></span>
                        </button>
                        <div class="flex items-center gap-3 ml-2">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-600 to-violet-600 text-sm font-black text-white shadow-lg shadow-indigo-200">
                                AU
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-10">
            <div class="mx-auto max-w-6xl">
                <!-- Page Title Area -->
                <div class="mb-10 flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight">
                            {{ $product ? 'Edit' : 'Create' }} <span class="text-indigo-600">Product</span>
                        </h2>
                        <p class="mt-2 text-slate-500 font-medium">Manage your inventory items with advanced details and SEO.</p>
                    </div>

                    @if ($product)
                        <button type="button" wire:click="createNew"
                            class="group flex items-center gap-2 rounded-2xl bg-white border border-slate-200 px-6 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50 hover:border-indigo-300 transition-all shadow-sm">
                            <i class="fas fa-plus text-indigo-500 group-hover:rotate-90 transition-transform"></i>
                            New Product
                        </button>
                    @endif
                </div>

                @if (session('success'))
                    <div class="mb-8 rounded-2xl border border-emerald-100 bg-emerald-50/50 p-4 flex items-center gap-3 text-sm font-bold text-emerald-700 animate-in fade-in slide-in-from-top-4">
                        <div class="h-8 w-8 rounded-lg bg-emerald-500 flex items-center justify-center text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit="save" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column: Details -->
                    <div class="lg:col-span-2 space-y-8">
                        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/40">
                            <div class="flex items-center gap-3 mb-8">
                                <div class="h-10 w-10 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-600">
                                    <i class="fas fa-tag"></i>
                                </div>
                                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Essential Info</h2>
                            </div>

                            <div class="space-y-6">
                                <div>
                                    <label class="mb-2 block text-xs font-black uppercase tracking-widest text-slate-500">Product Name</label>
                                    <input type="text" wire:model.live="name" placeholder="e.g. Premium Wireless Headphones"
                                        class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none ring-offset-2 transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                                    @error('name') <p class="mt-2 text-xs font-bold text-rose-500">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label class="mb-2 block text-xs font-black uppercase tracking-widest text-slate-500">Slug Identifier</label>
                                    <div class="relative">
                                        <span class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 font-medium">/product/</span>
                                        <input type="text" wire:model.live="slug"
                                            class="w-full rounded-2xl border-slate-200 bg-slate-50 pl-[4.5rem] pr-5 py-4 text-sm font-bold text-indigo-600 outline-none ring-offset-2 transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                                    </div>
                                    @error('slug') <p class="mt-2 text-xs font-bold text-rose-500">{{ $message }}</p> @enderror
                                </div>

                                <div class="grid gap-6 md:grid-cols-2">
                                    <div>
                                        <label class="mb-2 block text-xs font-black uppercase tracking-widest text-slate-500">Price ($)</label>
                                        <input type="number" step="0.01" min="0" wire:model.live="price"
                                            class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                                        @error('price') <p class="mt-2 text-xs font-bold text-rose-500">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-xs font-black uppercase tracking-widest text-slate-500">Initial Stock</label>
                                        <input type="number" min="0" wire:model.live="stock"
                                            class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                                        @error('stock') <p class="mt-2 text-xs font-bold text-rose-500">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                <div>
                                    <label class="mb-2 block text-xs font-black uppercase tracking-widest text-slate-500">Short Description</label>
                                    <textarea wire:model.live="description" rows="3" placeholder="Briefly describe the product..."
                                        class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-medium text-slate-700 outline-none transition focus:bg-white focus:ring-2 focus:ring-indigo-500"></textarea>
                                    @error('description') <p class="mt-2 text-xs font-bold text-rose-500">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/40">
                            <div class="flex items-center gap-3 mb-8">
                                <div class="h-10 w-10 rounded-xl bg-violet-50 flex items-center justify-center text-violet-600">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Full Content</h2>
                            </div>
                            <textarea wire:model.live="content" rows="10" placeholder="Describe your product in detail..."
                                class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-medium text-slate-700 outline-none transition focus:bg-white focus:ring-2 focus:ring-indigo-500"></textarea>
                            @error('content') <p class="mt-2 text-xs font-bold text-rose-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Right Column: Media & SEO -->
                    <div class="space-y-8">
                        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/40">
                            <div class="flex items-center gap-3 mb-8">
                                <div class="h-10 w-10 rounded-xl bg-rose-50 flex items-center justify-center text-rose-600">
                                    <i class="fas fa-image"></i>
                                </div>
                                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Media</h2>
                            </div>

                            <div class="space-y-6">
                                <div class="relative group">
                                    <div class="aspect-square w-full rounded-3xl border-2 border-dashed border-slate-200 bg-slate-50 flex flex-col items-center justify-center transition-all group-hover:border-indigo-400 group-hover:bg-indigo-50/30">
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" class="h-full w-full object-cover rounded-[1.4rem]">
                                        @elseif($existingImage)
                                            <img src="{{ asset('storage/' . $existingImage) }}" class="h-full w-full object-cover rounded-[1.4rem]">
                                        @else
                                            <i class="fas fa-cloud-upload-alt text-4xl text-slate-300 group-hover:text-indigo-400 transition-colors mb-3"></i>
                                            <span class="text-xs font-black text-slate-400 uppercase tracking-widest group-hover:text-indigo-500">Drop Image Here</span>
                                        @endif
                                        <input type="file" wire:model="image" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*">
                                    </div>
                                    @error('image') <p class="mt-2 text-xs font-bold text-rose-500">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/40">
                            <div class="flex items-center gap-3 mb-8">
                                <div class="h-10 w-10 rounded-xl bg-cyan-50 flex items-center justify-center text-cyan-600">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">SEO Config</h2>
                            </div>

                            <div class="space-y-6">
                                <div>
                                    <label class="mb-2 block text-xs font-black uppercase tracking-widest text-slate-500">Meta Title</label>
                                    <input type="text" wire:model.live="meta_title"
                                        class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                                </div>
                                <div>
                                    <label class="mb-2 block text-xs font-black uppercase tracking-widest text-slate-500">Meta Keywords</label>
                                    <input type="text" wire:model.live="meta_keywords" placeholder="laptop, stands, premium..."
                                        class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                                </div>
                                <div>
                                    <label class="mb-2 block text-xs font-black uppercase tracking-widest text-slate-500">Meta Description</label>
                                    <textarea wire:model.live="meta_description" rows="3"
                                        class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-medium text-slate-700 outline-none transition focus:bg-white focus:ring-2 focus:ring-indigo-500"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="sticky bottom-10 flex gap-4">
                            <button type="submit"
                                class="flex-1 rounded-[1.5rem] bg-indigo-600 px-8 py-5 text-sm font-black uppercase tracking-[0.2em] text-white shadow-2xl shadow-indigo-200 transition-all hover:bg-indigo-700 hover:-translate-y-1 active:translate-y-0">
                                {{ $product ? 'Update' : 'Publish' }}
                            </button>
                            <a href="{{ route('admin.products') }}"
                                class="rounded-[1.5rem] bg-slate-200 px-8 py-5 text-sm font-black uppercase tracking-[0.2em] text-slate-600 hover:bg-slate-300 transition-all">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                </form>

                <!-- Products Table -->
                <div class="mt-20 rounded-[2.5rem] border border-slate-200 bg-white p-8 shadow-2xl shadow-slate-200/50">
                    <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between mb-10">
                        <div>
                            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Active <span class="text-indigo-600">Inventory</span></h2>
                            <p class="text-sm font-medium text-slate-500 mt-1">Manage and edit your published products instantly.</p>
                        </div>
                        <div class="relative">
                            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search inventory..."
                                class="w-full sm:w-96 rounded-[1.5rem] border-slate-200 bg-slate-50 pl-12 pr-6 py-3.5 text-sm font-bold outline-none ring-offset-2 transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-3xl border border-slate-100 shadow-sm">
                        <table class="min-w-full divide-y divide-slate-100 text-sm">
                            <thead class="bg-slate-50/80 backdrop-blur-sm">
                                <tr>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Identity</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Specs</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Stock</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Created</th>
                                    <th class="px-6 py-5 text-right text-[11px] font-black uppercase tracking-widest text-slate-500">Management</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($products as $item)
                                    <tr class="group hover:bg-slate-50/50 transition-all">
                                        <td class="px-6 py-5">
                                            <div class="flex items-center gap-4">
                                                @if($item->image)
                                                    <img src="{{ Storage::url($item->image) }}" class="h-14 w-14 rounded-2xl object-cover shadow-lg border border-white group-hover:scale-110 transition-transform">
                                                @else
                                                    <div class="h-14 w-14 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-400 text-xl">
                                                        <i class="fas fa-box"></i>
                                                    </div>
                                                @endif
                                                <div class="flex flex-col">
                                                    <span class="font-black text-slate-900 tracking-tight">{{ $item->name }}</span>
                                                    <span class="text-xs font-bold text-indigo-500 tracking-wide">{{ $item->slug }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5">
                                            <div class="flex flex-col">
                                                <span class="text-[15px] font-black text-emerald-600">${{ number_format((float) $item->price, 2) }}</span>
                                                <span class="text-[10px] font-bold text-slate-400 uppercase italic">Unit Price</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-black {{ $item->stock > 10 ? 'bg-emerald-50 text-emerald-600' : 'bg-rose-50 text-rose-600 animate-pulse' }}">
                                                {{ $item->stock }} IN STOCK
                                            </span>
                                        </td>
                                        <td class="px-6 py-5 text-slate-500 font-bold text-xs uppercase">{{ $item->created_at?->format('d M Y') }}</td>
                                        <td class="px-6 py-5">
                                            <div class="flex items-center justify-end gap-2">
                                                <a href="{{ route('product.detail', $item->slug) }}" target="_blank"
                                                    class="h-10 w-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-500 hover:text-indigo-600 hover:border-indigo-200 transition-all">
                                                    <i class="fas fa-external-link-alt text-xs"></i>
                                                </a>
                                                <button type="button" wire:click="edit({{ $item->id }})"
                                                    class="h-10 w-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-500 hover:text-emerald-600 hover:border-emerald-200 transition-all">
                                                    <i class="fas fa-edit text-xs"></i>
                                                </button>
                                                <button type="button" wire:click="delete({{ $item->id }})"
                                                    wire:confirm="Permanent deletion of this product?"
                                                    class="h-10 w-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-500 hover:text-rose-600 hover:border-rose-200 transition-all">
                                                    <i class="fas fa-trash text-xs"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-20 text-center">
                                            <div class="flex flex-col items-center gap-4">
                                                <i class="fas fa-inbox text-5xl text-slate-100"></i>
                                                <p class="text-slate-400 font-bold uppercase tracking-widest text-xs">No active inventory found</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
