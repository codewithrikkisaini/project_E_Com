<div class="admin-shell min-h-screen bg-slate-50 lg:flex">
    <x-admin.sidebar />

    <main class="flex-1">
        @if($blogFormOpen)
            <form wire:submit="save" class="flex flex-col min-h-screen">
                <!-- Premium Header -->
                <header class="sticky top-0 z-50 border-b border-slate-200/60 bg-white/80 backdrop-blur-md px-4 py-4 lg:px-10 shrink-0">
                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                        <div class="flex items-center gap-4">
                            <button type="button" wire:click="closeForm" class="h-10 w-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:text-indigo-600 transition-colors">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <div>
                                <h1 class="text-2xl font-black text-slate-900 tracking-tight lg:text-3xl">Editorial <span class="text-indigo-600">Composer</span></h1>
                                <div class="flex items-center gap-2 mt-1 text-xs font-bold text-slate-500 uppercase tracking-widest">
                                    <span>{{ $blog ? 'Refining Post' : 'Drafting New' }}</span>
                                    <i class="fas fa-circle text-[4px] opacity-30"></i>
                                    <span class="text-indigo-500">Publication Pipeline</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <button type="button" wire:click="closeForm" class="hidden sm:flex px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest text-slate-500 hover:bg-slate-100 transition-all">
                                Discard
                            </button>
                            <button type="submit" class="flex items-center gap-2 px-8 py-3 rounded-xl bg-indigo-600 text-[10px] font-black uppercase tracking-widest text-white shadow-xl shadow-indigo-100 hover:bg-indigo-700 transition-all">
                                <i class="fas fa-paper-plane"></i> Commit & Publish
                            </button>
                        </div>
                    </div>
                </header>

                <div class="flex-1 p-4 lg:p-10 pb-32">
                    <div class="mx-auto max-w-5xl space-y-10">
                        <!-- Primary Content Grid -->
                        <div class="grid gap-10 lg:grid-cols-12">
                            <!-- Left Column: Writing -->
                            <div class="lg:col-span-8 space-y-10">
                                <div class="rounded-[2.5rem] border border-slate-200 bg-white p-8 lg:p-12 shadow-2xl shadow-slate-200/50">
                                    <div class="space-y-8">
                                        <div class="space-y-4">
                                            <label class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400">Article Headline</label>
                                            <input type="text" wire:model="title" wire:keyup="generateSlug" placeholder="The art of minimalistic engineering..."
                                                class="w-full border-none p-0 text-3xl lg:text-4xl font-black text-slate-900 placeholder:text-slate-200 focus:ring-0 outline-none" />
                                            @error('title') <p class="text-[10px] font-bold text-rose-500">{{ $message }}</p> @enderror
                                        </div>

                                        <div class="h-px bg-slate-100"></div>

                                        <div class="space-y-4">
                                            <label class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400">The Narrative</label>
                                            <div class="relative">
                                                <div class="sticky top-28 z-10 flex items-center gap-1 p-1 bg-slate-900 rounded-xl mb-4 shadow-xl">
                                                    <button type="button" class="h-8 w-8 rounded-lg text-white hover:bg-slate-800 transition-colors"><i class="fas fa-bold"></i></button>
                                                    <button type="button" class="h-8 w-8 rounded-lg text-white hover:bg-slate-800 transition-colors"><i class="fas fa-italic"></i></button>
                                                    <button type="button" class="h-8 w-8 rounded-lg text-white hover:bg-slate-800 transition-colors"><i class="fas fa-link"></i></button>
                                                    <div class="w-px h-4 bg-slate-800 mx-1"></div>
                                                    <button type="button" class="h-8 w-8 rounded-lg text-white hover:bg-slate-800 transition-colors"><i class="fas fa-heading"></i></button>
                                                    <button type="button" class="h-8 w-8 rounded-lg text-white hover:bg-slate-800 transition-colors"><i class="fas fa-quote-right"></i></button>
                                                </div>
                                                <textarea wire:model="content" rows="20" placeholder="Begin your story here..."
                                                    class="w-full border-none p-0 text-base font-medium text-slate-600 leading-relaxed placeholder:text-slate-200 focus:ring-0 outline-none resize-none"></textarea>
                                            </div>
                                            @error('content') <p class="text-[10px] font-bold text-rose-500">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- SEO & Meta -->
                                <div class="rounded-[2.5rem] border border-slate-200 bg-white p-8 lg:p-12 shadow-2xl shadow-slate-200/50 space-y-8">
                                    <div class="flex items-center gap-3">
                                        <div class="h-1 w-12 bg-indigo-600 rounded-full"></div>
                                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400">Search Intelligence</h3>
                                    </div>
                                    
                                    <div class="grid gap-6">
                                        <div class="space-y-2">
                                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Meta Title Signature</label>
                                            <input type="text" wire:model="meta_title" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100" />
                                        </div>
                                        <div class="space-y-2">
                                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Meta Narrative</label>
                                            <textarea wire:model="meta_description" rows="3" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-medium text-slate-600 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column: Metadata & Assets -->
                            <div class="lg:col-span-4 space-y-10">
                                <!-- Featured Media -->
                                <div class="rounded-[2.5rem] border border-slate-200 bg-white p-8 shadow-2xl shadow-slate-200/50 space-y-6">
                                    <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400">Hero Asset</h3>
                                    <div class="relative group aspect-[4/3] rounded-3xl bg-slate-50 border-2 border-dashed border-slate-200 flex flex-col items-center justify-center overflow-hidden transition-all hover:border-indigo-400">
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" class="h-full w-full object-cover" />
                                        @elseif ($existingImage)
                                            <img src="{{ Storage::url($existingImage) }}" class="h-full w-full object-cover" />
                                        @else
                                            <i class="fas fa-image text-slate-200 text-4xl mb-2"></i>
                                            <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Select Visual</span>
                                        @endif
                                        <input type="file" wire:model="image" class="absolute inset-0 opacity-0 cursor-pointer" />
                                    </div>
                                    @error('image') <p class="text-[10px] font-bold text-rose-500">{{ $message }}</p> @enderror
                                </div>

                                <!-- Configuration -->
                                <div class="rounded-[2.5rem] border border-slate-200 bg-white p-8 shadow-2xl shadow-slate-200/50 space-y-8">
                                    <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400">Structural Metadata</h3>
                                    
                                    <div class="space-y-6">
                                        <div class="space-y-2">
                                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Taxonomy Node</label>
                                            <select wire:model="blog_category_id" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none focus:ring-4 focus:ring-indigo-100 appearance-none">
                                                <option value="">-- Uncategorized --</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="space-y-2">
                                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">URL Signature</label>
                                            <input type="text" wire:model="slug" readonly class="w-full rounded-2xl border-slate-200 bg-slate-100 px-5 py-4 text-xs font-bold text-slate-400 outline-none cursor-not-allowed" />
                                        </div>

                                        <div class="flex items-center justify-between p-4 rounded-2xl bg-slate-50">
                                            <div class="flex flex-col">
                                                <span class="text-[10px] font-black uppercase tracking-widest text-slate-900">Visibility Status</span>
                                                <span class="text-[9px] font-bold text-slate-400">{{ $is_published ? 'Live on Network' : 'Private Draft' }}</span>
                                            </div>
                                            <button type="button" wire:click="$toggle('is_published')" class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none {{ $is_published ? 'bg-indigo-600' : 'bg-slate-200' }}">
                                                <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out {{ $is_published ? 'translate-x-5' : 'translate-x-0' }}"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @else
            <!-- Premium Header -->
            <header class="sticky top-0 z-40 border-b border-slate-200/60 bg-white/80 backdrop-blur-md px-4 py-4 lg:px-10 shrink-0">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-2xl font-black text-slate-900 tracking-tight lg:text-3xl">Editorial <span class="text-indigo-600">Archives</span></h1>
                        <div class="flex items-center gap-2 mt-1 text-xs font-bold text-slate-500 uppercase tracking-widest">
                            <span>Admin</span>
                            <i class="fas fa-chevron-right text-[8px]"></i>
                            <span class="text-indigo-500">Content Stream</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <button wire:click="openCreateForm" class="flex items-center gap-2 rounded-xl bg-indigo-600 px-8 py-3 text-[10px] font-black uppercase tracking-widest text-white shadow-xl shadow-indigo-100 hover:bg-indigo-700 transition-all">
                            <i class="fas fa-plus"></i> Draft New Story
                        </button>
                    </div>
                </div>
            </header>

            <section class="p-4 lg:p-10">
                <div class="mx-auto max-w-7xl space-y-10">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                        <div class="relative w-full sm:w-96">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                <i class="fas fa-search text-xs"></i>
                            </span>
                            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Filter articles by title or keywords..."
                                class="w-full rounded-2xl border-none bg-white pl-12 pr-4 py-4 text-[10px] font-black uppercase tracking-widest text-slate-500 outline-none focus:ring-4 focus:ring-indigo-100 transition shadow-sm" />
                        </div>

                        <div class="flex items-center gap-3">
                            <select wire:model.live="categoryId" class="rounded-xl border-none bg-white px-6 py-4 text-[10px] font-black uppercase tracking-widest text-slate-500 outline-none focus:ring-4 focus:ring-indigo-100 shadow-sm">
                                <option value="">Global Library</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                        @forelse ($blogs as $item)
                            <div class="group relative rounded-[2.5rem] border border-slate-200 bg-white overflow-hidden shadow-2xl shadow-slate-200/50 transition-all hover:-translate-y-2 hover:shadow-indigo-100/50">
                                <!-- Post Preview Media -->
                                <div class="aspect-[16/10] bg-slate-100 relative overflow-hidden">
                                    @if($item->image)
                                        <img src="{{ Storage::url($item->image) }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                    @else
                                        <div class="h-full w-full flex items-center justify-center text-slate-200">
                                            <i class="fas fa-image text-5xl"></i>
                                        </div>
                                    @endif
                                    
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                                        <div class="flex gap-2">
                                            <button wire:click="edit({{ $item->id }})" class="h-10 w-10 flex items-center justify-center rounded-xl bg-white/20 backdrop-blur-md text-white hover:bg-indigo-600 transition-all">
                                                <i class="fas fa-edit text-xs"></i>
                                            </button>
                                            <button wire:click="delete({{ $item->id }})" wire:confirm="Relinquish this story?" class="h-10 w-10 flex items-center justify-center rounded-xl bg-white/20 backdrop-blur-md text-white hover:bg-rose-600 transition-all">
                                                <i class="fas fa-trash-alt text-xs"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="absolute top-4 left-4">
                                        @if($item->is_published)
                                            <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest bg-emerald-500 text-white shadow-lg">Live</span>
                                        @else
                                            <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest bg-slate-900 text-white shadow-lg">Draft</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Post Content -->
                                <div class="p-8">
                                    <div class="flex items-center gap-2 mb-4">
                                        @if($item->category)
                                            <span class="text-[10px] font-black uppercase tracking-widest text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg">{{ $item->category->name }}</span>
                                        @endif
                                        <span class="text-[9px] font-bold text-slate-400 uppercase tracking-tighter">{{ $item->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <h3 class="text-xl font-black text-slate-900 tracking-tight leading-snug line-clamp-2 group-hover:text-indigo-600 transition-colors">{{ $item->title }}</h3>
                                    
                                    <div class="mt-8 pt-6 border-t border-slate-50 flex items-center justify-between">
                                        <div class="flex -space-x-2">
                                            <div class="h-8 w-8 rounded-full bg-slate-100 border-2 border-white flex items-center justify-center text-[10px] font-black text-slate-400">AU</div>
                                        </div>
                                        <button wire:click="edit({{ $item->id }})" class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-indigo-600 transition-colors">Refine Post <i class="fas fa-arrow-right ml-1"></i></button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full py-32 text-center">
                                <div class="h-24 w-24 rounded-[2.5rem] bg-slate-50 flex items-center justify-center text-slate-200 text-4xl mx-auto mb-6">
                                    <i class="fas fa-pen-nib"></i>
                                </div>
                                <h3 class="text-xl font-black text-slate-900 tracking-tight">The Library is Empty</h3>
                                <p class="text-slate-500 mt-2">Begin your publishing journey by drafting a new story.</p>
                            </div>
                        @endforelse
                    </div>

                    @if($blogs->hasPages())
                        <div class="mt-12 flex justify-center">
                            {{ $blogs->links() }}
                        </div>
                    @endif
                </div>
            </section>
        @endif

        <footer class="py-10 text-center">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.9em]">Media Engineering • Narrative Core</p>
        </footer>
    </main>
</div>
