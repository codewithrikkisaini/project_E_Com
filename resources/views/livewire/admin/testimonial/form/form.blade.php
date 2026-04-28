<div class="admin-shell min-h-screen bg-slate-50 lg:flex">
    <x-admin.sidebar />

    <main class="flex-1">
        <!-- Premium Header -->
        <header class="sticky top-0 z-40 border-b border-slate-200/60 bg-white/80 backdrop-blur-md px-4 py-4 lg:px-10 shrink-0">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight lg:text-3xl">Social <span class="text-indigo-600">Proof</span></h1>
                    <div class="flex items-center gap-2 mt-1 text-xs font-bold text-slate-500 uppercase tracking-widest">
                        <span>Admin</span>
                        <i class="fas fa-chevron-right text-[8px]"></i>
                        <span class="text-indigo-500">Testimonial Engine</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-indigo-50 border border-indigo-100">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"></span>
                        <span class="text-[10px] font-black text-indigo-600 uppercase tracking-widest">Live Feedback</span>
                    </div>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-10">
            <div class="mx-auto max-w-7xl space-y-10">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight">Voice of <span class="text-indigo-600">Customers</span></h2>
                        <p class="mt-2 text-slate-500 font-medium">Curate and showcase authentic experiences to build market trust.</p>
                    </div>
                </div>

                @if (session('success'))
                    <div class="rounded-2xl border border-emerald-100 bg-emerald-50/50 p-4 flex items-center gap-3 text-sm font-bold text-emerald-700 shadow-sm">
                        <div class="h-8 w-8 rounded-lg bg-emerald-500 flex items-center justify-center text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid gap-10 lg:grid-cols-12">
                    <!-- Editor Sidebar -->
                    <div class="lg:col-span-5">
                        <div class="sticky top-28 rounded-[2.5rem] border border-slate-200 bg-white p-8 shadow-2xl shadow-slate-200/50">
                            <div class="mb-8 flex items-center justify-between">
                                <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400">Feedback Composer</h3>
                                @if ($testimonial)
                                    <button type="button" wire:click="createNew" class="h-10 w-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:text-indigo-600 transition-colors">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                @endif
                            </div>

                            <form wire:submit="save" class="space-y-6">
                                <div>
                                    <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Client Identity</label>
                                    <input type="text" wire:model.live="name" placeholder="Full Name"
                                        class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100" />
                                    @error('name') <p class="mt-2 text-[10px] font-bold text-rose-500">{{ $message }}</p> @enderror
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Satisfaction</label>
                                        <select wire:model.live="rating"
                                            class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100 appearance-none">
                                            <option value="5">⭐⭐⭐⭐⭐ 5 Star</option>
                                            <option value="4">⭐⭐⭐⭐ 4 Star</option>
                                            <option value="3">⭐⭐⭐ 3 Star</option>
                                            <option value="2">⭐⭐ 2 Star</option>
                                            <option value="1">⭐ 1 Star</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Priority</label>
                                        <input type="number" wire:model.live="sort_order"
                                            class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100" />
                                    </div>
                                </div>

                                <div>
                                    <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">The Experience</label>
                                    <textarea wire:model.live="message" rows="4" placeholder="Draft the testimonial text..."
                                        class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-medium text-slate-600 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100"></textarea>
                                    @error('message') <p class="mt-2 text-[10px] font-bold text-rose-500">{{ $message }}</p> @enderror
                                </div>

                                <div class="rounded-[2rem] border-2 border-dashed border-slate-100 p-6 flex flex-col items-center text-center group transition hover:border-indigo-200 relative">
                                    <label class="mb-4 block text-[10px] font-black uppercase tracking-widest text-slate-400">Client Portrait</label>
                                    <div class="h-20 w-20 rounded-2xl bg-slate-50 flex items-center justify-center overflow-hidden border border-slate-100 group-hover:scale-105 transition-transform shadow-sm">
                                        @if ($photo)
                                            <img src="{{ $photo->temporaryUrl() }}" class="h-full w-full object-cover" />
                                        @elseif($existingPhoto)
                                            <img src="{{ asset('storage/' . $existingPhoto) }}" class="h-full w-full object-cover" />
                                        @else
                                            <i class="fas fa-user-circle text-slate-200 text-3xl"></i>
                                        @endif
                                    </div>
                                    <input type="file" wire:model="photo" class="absolute inset-0 opacity-0 cursor-pointer" />
                                    <p class="mt-3 text-[10px] font-bold text-slate-400">Click to upload avatar</p>
                                </div>

                                <div class="flex items-center justify-between p-4 rounded-2xl bg-slate-50">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Visible on frontend</span>
                                    <button type="button" wire:click="$toggle('is_active')" class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none {{ $is_active ? 'bg-indigo-600' : 'bg-slate-200' }}">
                                        <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out {{ $is_active ? 'translate-x-5' : 'translate-x-0' }}"></span>
                                    </button>
                                </div>

                                <button type="submit" class="w-full rounded-2xl bg-indigo-600 py-4 text-xs font-black uppercase tracking-[0.2em] text-white shadow-xl shadow-indigo-100 hover:bg-indigo-700 transition-all active:scale-95">
                                    {{ $testimonial ? 'Update Record' : 'Publish Feedback' }}
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- List Area -->
                    <div class="lg:col-span-7">
                        <div class="rounded-[2.5rem] border border-slate-200 bg-white p-6 lg:p-10 shadow-2xl shadow-slate-200/50">
                            <div class="mb-8 flex items-center justify-between">
                                <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400">Archives</h3>
                                <div class="relative">
                                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search..."
                                        class="rounded-xl border-slate-100 bg-slate-50 px-4 py-2 text-[10px] font-bold uppercase tracking-widest text-slate-500 outline-none focus:ring-2 focus:ring-indigo-100" />
                                </div>
                            </div>

                            <div class="space-y-4">
                                @forelse($testimonials as $item)
                                    <div class="group rounded-3xl border border-slate-100 bg-slate-50/50 p-6 transition-all hover:bg-white hover:shadow-xl hover:shadow-slate-200/40">
                                        <div class="flex items-start gap-4">
                                            <div class="h-14 w-14 rounded-2xl bg-white shadow-sm border border-slate-100 flex items-center justify-center overflow-hidden shrink-0">
                                                @if ($item->photo)
                                                    <img src="{{ asset('storage/' . $item->photo) }}" class="h-full w-full object-cover" />
                                                @else
                                                    <span class="text-lg font-black text-slate-300">{{ substr($item->name, 0, 1) }}</span>
                                                @endif
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center justify-between">
                                                    <h4 class="truncate text-base font-black text-slate-900 tracking-tight">{{ $item->name }}</h4>
                                                    <div class="flex text-amber-400 text-[10px]">
                                                        @for($i=0; $i<$item->rating; $i++) <i class="fas fa-star"></i> @endfor
                                                    </div>
                                                </div>
                                                <p class="mt-2 text-sm font-medium text-slate-500 leading-relaxed italic line-clamp-2">"{{ $item->message }}"</p>
                                                
                                                <div class="mt-4 flex items-center justify-between">
                                                    <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-md text-[9px] font-black uppercase tracking-widest {{ $item->is_active ? 'bg-emerald-50 text-emerald-600' : 'bg-slate-200 text-slate-600' }}">
                                                        {{ $item->is_active ? 'Public' : 'Hidden' }}
                                                    </span>
                                                    <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                        <button wire:click="edit({{ $item->id }})" class="h-8 w-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center text-xs hover:bg-indigo-600 hover:text-white transition-all">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button wire:click="delete({{ $item->id }})" wire:confirm="Wipe this experience?" class="h-8 w-8 rounded-lg bg-rose-50 text-rose-600 flex items-center justify-center text-xs hover:bg-rose-600 hover:text-white transition-all">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="py-20 text-center">
                                        <i class="fas fa-quote-left text-5xl text-slate-100"></i>
                                        <p class="mt-4 text-[10px] font-black uppercase tracking-[0.4em] text-slate-300">No Experiences Logged</p>
                                    </div>
                                @endforelse
                            </div>

                            <div class="mt-8">
                                {{ $testimonials->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-10 text-center">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.8em]">Trust Architecture • Social Validation</p>
        </footer>
    </main>
</div>
