<div class="admin-shell min-h-screen bg-slate-50 lg:flex">
    <x-admin.sidebar />

    <main class="flex-1">
        <!-- Premium Header -->
        <header class="sticky top-0 z-40 border-b border-slate-200/60 bg-white/80 backdrop-blur-md px-4 py-4 lg:px-10">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight lg:text-3xl">Inventory <span class="text-indigo-600">Vault</span></h1>
                    <div class="flex items-center gap-2 mt-1 text-xs font-bold text-slate-500 uppercase tracking-widest">
                        <span>Admin</span>
                        <i class="fas fa-chevron-right text-[8px]"></i>
                        <span class="text-indigo-500">Inventory Index</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="relative hidden xl:block">
                        <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" placeholder="Filter inventory..."
                            class="w-80 rounded-2xl border-none bg-slate-100 py-3 pl-11 pr-4 text-sm text-slate-700 outline-none ring-1 ring-slate-200 transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                    </div>
                    
                    <div class="flex items-center gap-2 border-l border-slate-200 pl-4">
                        <a href="{{ route('admin.product.create') }}" class="group flex items-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-xs font-black text-white shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition uppercase tracking-widest">
                            <i class="fas fa-plus group-hover:rotate-90 transition-transform"></i> Add Item
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-10">
            <div class="mx-auto max-w-7xl">
                <!-- Status Area -->
                @if (session('success'))
                    <div class="mb-8 rounded-2xl border border-emerald-100 bg-emerald-50/50 p-4 flex items-center gap-3 text-sm font-bold text-emerald-700">
                        <div class="h-8 w-8 rounded-lg bg-emerald-500 flex items-center justify-center text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="rounded-[2.5rem] border border-slate-200 bg-white p-8 lg:p-10 shadow-2xl shadow-slate-200/50">
                    <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between mb-10">
                        <div>
                            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Product <span class="text-indigo-600">Archive</span></h2>
                            <p class="text-sm font-medium text-slate-500 mt-1">Detailed overview of all active and inactive products.</p>
                        </div>
                        <div class="flex items-center gap-4">
                             <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-50 border border-slate-100">
                                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                                <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">System Live</span>
                             </div>
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-3xl border border-slate-100">
                        <table class="min-w-full divide-y divide-slate-100 text-sm">
                            <thead class="bg-slate-50/80">
                                <tr>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-400">Product Identity</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-400">Pricing</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-400">Availability</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-400">Published</th>
                                    <th class="px-6 py-5 text-right text-[11px] font-black uppercase tracking-widest text-slate-400">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($products as $product)
                                    <tr class="group hover:bg-slate-50/50 transition-all">
                                        <td class="px-6 py-6">
                                            <div class="flex items-center gap-4">
                                                <div class="h-12 w-12 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-400 border border-indigo-100/50 group-hover:scale-110 transition-transform">
                                                    <i class="fas fa-box-open text-lg"></i>
                                                </div>
                                                <div class="flex flex-col">
                                                    <span class="font-black text-slate-900 tracking-tight text-base group-hover:text-indigo-600 transition-colors">{{ $product->name }}</span>
                                                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">{{ $product->slug }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6">
                                            <div class="flex flex-col">
                                                <span class="text-base font-black text-slate-800">${{ number_format((float) $product->price, 2) }}</span>
                                                <span class="text-[9px] font-black text-emerald-500 uppercase tracking-tighter mt-0.5">Premium Tier</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6">
                                            <div class="flex flex-col gap-1">
                                                <span class="text-sm font-black text-slate-700">{{ $product->stock }} Units</span>
                                                <div class="w-20 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                                    <div class="h-full bg-indigo-500 rounded-full" style="width: {{ min($product->stock, 100) }}%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6 text-slate-500 font-bold text-xs">{{ $product->created_at?->format('d M, Y') }}</td>
                                        <td class="px-6 py-6 text-right">
                                            <div class="flex items-center justify-end gap-3">
                                                <a href="{{ route('admin.product.edit', $product) }}"
                                                    class="h-10 w-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-500 hover:text-indigo-600 hover:border-indigo-200 transition-all shadow-sm">
                                                    <i class="fas fa-edit text-xs"></i>
                                                </a>
                                                <button type="button" wire:click="delete({{ $product->id }})"
                                                    wire:confirm="Relinquish this item from inventory?"
                                                    class="h-10 w-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-500 hover:text-rose-600 hover:border-rose-200 transition-all shadow-sm">
                                                    <i class="fas fa-trash text-xs"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-24 text-center">
                                            <div class="flex flex-col items-center gap-4">
                                                <div class="h-20 w-20 rounded-[2rem] bg-slate-50 flex items-center justify-center text-slate-200 text-4xl">
                                                    <i class="fas fa-folder-open"></i>
                                                </div>
                                                <p class="text-slate-400 font-black uppercase tracking-[0.3em] text-xs">Inventory is Empty</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-10">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-10 text-center">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.4em]">Nick's & Morris Control • Version 2.0.4</p>
        </footer>
    </main>
</div>
