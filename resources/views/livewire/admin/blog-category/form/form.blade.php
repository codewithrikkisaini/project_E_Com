<div class="admin-shell min-h-screen bg-slate-50 lg:flex">
    <x-admin.sidebar />

    <main class="flex-1">
        <!-- Premium Header -->
        <header class="sticky top-0 z-40 border-b border-slate-200/60 bg-white/80 backdrop-blur-md px-4 py-4 lg:px-10 shrink-0">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight lg:text-3xl">Content <span class="text-indigo-600">Taxonomy</span></h1>
                    <div class="flex items-center gap-2 mt-1 text-xs font-bold text-slate-500 uppercase tracking-widest">
                        <span>Admin</span>
                        <i class="fas fa-chevron-right text-[8px]"></i>
                        <span class="text-indigo-500">Category Schema</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-100 border border-slate-200">
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest italic">Library Node</span>
                    </div>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-10">
            <div class="mx-auto max-w-6xl space-y-10">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight">Blog <span class="text-indigo-600">Architecture</span></h2>
                        <p class="mt-2 text-slate-500 font-medium">Define structural nodes for your publication strategy.</p>
                    </div>
                </div>

                @if (session()->has('success'))
                    <div class="rounded-2xl border border-emerald-100 bg-emerald-50/50 p-4 flex items-center gap-3 text-sm font-bold text-emerald-700 shadow-sm">
                        <div class="h-8 w-8 rounded-lg bg-emerald-500 flex items-center justify-center text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid gap-10 lg:grid-cols-12">
                    <!-- Editor Component -->
                    @if($categoryFormOpen)
                        <div class="lg:col-span-5">
                            <div class="rounded-[2.5rem] border border-slate-200 bg-white p-8 shadow-2xl shadow-slate-200/50 relative overflow-hidden">
                                <div class="absolute top-0 right-0 h-24 w-24 bg-indigo-50 rounded-bl-[4rem] -mr-6 -mt-6"></div>
                                
                                <div class="relative z-10">
                                    <div class="mb-8 flex items-center justify-between">
                                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400">Node Editor</h3>
                                        <button type="button" wire:click="closeForm" class="text-slate-400 hover:text-rose-500 transition-colors">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>

                                    <form wire:submit="save" class="space-y-6">
                                        <div>
                                            <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Classification Name</label>
                                            <input type="text" wire:model="name" wire:keyup="generateSlug" placeholder="Technology, Lifestyle..."
                                                class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100" />
                                            @error('name') <p class="mt-2 text-[10px] font-bold text-rose-500">{{ $message }}</p> @enderror
                                        </div>

                                        <div>
                                            <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">URL Signature (Slug)</label>
                                            <input type="text" wire:model="slug" readonly
                                                class="w-full rounded-2xl border-slate-200 bg-slate-100 px-5 py-4 text-sm font-bold text-slate-400 outline-none cursor-not-allowed" />
                                            @error('slug') <p class="mt-2 text-[10px] font-bold text-rose-500">{{ $message }}</p> @enderror
                                        </div>

                                        <div class="pt-6 border-t border-slate-50">
                                            <button type="submit" class="w-full rounded-2xl bg-indigo-600 py-4 text-xs font-black uppercase tracking-[0.2em] text-white shadow-xl shadow-indigo-100 hover:bg-indigo-700 transition-all active:scale-95">
                                                {{ $category ? 'Update Structure' : 'Deploy Category' }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Index Component -->
                    <div class="{{ $categoryFormOpen ? 'lg:col-span-7' : 'lg:col-span-12' }}">
                        <div class="rounded-[2.5rem] border border-slate-200 bg-white p-6 lg:p-10 shadow-2xl shadow-slate-200/50">
                            <div class="mb-10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                                <div class="relative w-full sm:w-80">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                        <i class="fas fa-search text-xs"></i>
                                    </span>
                                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Filter nodes..."
                                        class="w-full rounded-xl border-none bg-slate-50 pl-10 pr-4 py-3 text-[10px] font-black uppercase tracking-widest text-slate-500 outline-none focus:bg-white focus:ring-4 focus:ring-slate-100 transition" />
                                </div>
                                
                                @if(!$categoryFormOpen)
                                    <button wire:click="openCreateForm" class="flex items-center gap-2 rounded-xl bg-indigo-600 px-6 py-3 text-[10px] font-black uppercase tracking-widest text-white hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-100">
                                        <i class="fas fa-plus"></i> New Category
                                    </button>
                                @endif
                            </div>

                            <div class="overflow-hidden rounded-3xl border border-slate-100">
                                <table class="min-w-full divide-y divide-slate-100 text-sm">
                                    <thead class="bg-slate-50/80">
                                        <tr>
                                            <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Index</th>
                                            <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Categorical Entity</th>
                                            <th class="px-6 py-5 text-right text-[11px] font-black uppercase tracking-widest text-slate-500">Command Control</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50">
                                        @forelse ($categories as $index => $cat)
                                            <tr class="group hover:bg-slate-50/30 transition-all">
                                                <td class="px-6 py-6">
                                                    <span class="text-[10px] font-black text-slate-300 group-hover:text-indigo-500 transition-colors">
                                                        {{ str_pad(($categories->firstItem() + $index), 2, '0', STR_PAD_LEFT) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-6">
                                                    <div class="flex flex-col">
                                                        <span class="font-black text-slate-900 tracking-tight text-base group-hover:text-indigo-600 transition-colors">{{ $cat->name }}</span>
                                                        <span class="text-[9px] font-bold text-slate-400 uppercase tracking-tighter mt-1 italic">/{{ $cat->slug }}</span>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-6 text-right">
                                                    <div class="flex items-center justify-end gap-2">
                                                        <button wire:click="edit({{ $cat->id }})" class="h-9 w-9 flex items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all">
                                                            <i class="fas fa-edit text-xs"></i>
                                                        </button>
                                                        <button wire:click="delete({{ $cat->id }})" wire:confirm="Relinquish this node?" class="h-9 w-9 flex items-center justify-center rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition-all">
                                                            <i class="fas fa-trash-alt text-xs"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="px-6 py-20 text-center">
                                                    <div class="flex flex-col items-center gap-3">
                                                        <i class="fas fa-folder-open text-4xl text-slate-100"></i>
                                                        <p class="text-[10px] font-black uppercase tracking-[0.4em] text-slate-300">Architecture Incomplete</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            @if($categories->hasPages())
                                <div class="mt-8 border-t border-slate-50 pt-8">
                                    {{ $categories->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-10 text-center">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.9em]">Linguistic Engineering • Taxon Core</p>
        </footer>
    </main>
</div>
