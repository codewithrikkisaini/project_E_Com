<div class="admin-shell min-h-screen bg-slate-50 lg:flex">
    <x-admin.sidebar />

    <main class="flex-1 flex flex-col h-screen overflow-y-auto">
        <!-- Premium Header -->
        <header class="sticky top-0 z-40 border-b border-slate-200/60 bg-white/80 backdrop-blur-md px-4 py-4 lg:px-10 shrink-0">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight lg:text-3xl">Creative <span class="text-indigo-600">Assets</span></h1>
                    <div class="flex items-center gap-2 mt-1 text-xs font-bold text-slate-500 uppercase tracking-widest">
                        <span>Admin</span>
                        <i class="fas fa-chevron-right text-[8px]"></i>
                        <span class="text-indigo-500">Banner</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <a href="{{ url('/') }}" target="_blank" class="rounded-xl bg-indigo-50 px-4 py-2 text-xs font-black text-indigo-600 hover:bg-indigo-100 transition uppercase tracking-widest">
                        Preview Site
                    </a>
                    <div class="flex items-center gap-2 border-l border-slate-200 pl-4">
                        <button type="button" class="relative rounded-xl p-2.5 text-slate-500 transition hover:bg-slate-100 hover:text-indigo-600">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="absolute top-2 right-2 w-2 h-2 bg-rose-500 rounded-full border-2 border-white"></span>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-10 flex-1">
            <div class="mx-auto max-w-4xl space-y-10">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight">Home <span class="text-indigo-600">Hero Banner</span></h2>
                        <p class="mt-2 text-slate-500 font-medium">Configure your landing page first impression and call-to-actions.</p>
                    </div>
                </div>

                @if (session()->has('success'))
                    <div class="rounded-2xl border border-emerald-100 bg-emerald-50/50 p-4 flex items-center gap-3 text-sm font-bold text-emerald-700">
                        <div class="h-8 w-8 rounded-lg bg-emerald-500 flex items-center justify-center text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="rounded-[2.5rem] border border-slate-200 bg-white p-8 lg:p-12 shadow-2xl shadow-slate-200/50">
                    <form wire:submit="save" class="space-y-10">
                        <!-- Primary Content -->
                        <div class="grid gap-8 lg:grid-cols-2">
                            <div class="lg:col-span-2">
                                <label class="mb-3 block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Headline Title</label>
                                <input type="text" wire:model="title" placeholder="e.g. Experience Luxury Living"
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50 px-6 py-5 text-lg font-black text-slate-800 outline-none ring-offset-2 transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                                @error('title') <p class="mt-2 text-xs font-bold text-rose-500">{{ $message }}</p> @enderror
                            </div>

                            <div class="lg:col-span-2">
                                <label class="mb-3 block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Supporting Narrative</label>
                                <textarea wire:model="description" rows="4" placeholder="Craft a compelling sub-headline..."
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50 px-6 py-5 text-base font-medium text-slate-600 outline-none ring-offset-2 transition focus:bg-white focus:ring-2 focus:ring-indigo-500"></textarea>
                                @error('description') <p class="mt-2 text-xs font-bold text-rose-500">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Media Area -->
                        <div class="rounded-3xl bg-slate-900 p-8 text-white relative overflow-hidden group">
                            <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 to-transparent"></div>
                            <div class="relative z-10 flex flex-col lg:flex-row items-center gap-8">
                                <div class="flex-1 text-center lg:text-left">
                                    <h4 class="text-xl font-black tracking-tight mb-2">Visual Masterpiece</h4>
                                    <p class="text-slate-400 text-sm font-medium mb-6">Upload a high-resolution background (1920x1080 recommended)</p>
                                    <div class="relative inline-block group">
                                        <button type="button" class="px-8 py-4 bg-indigo-600 rounded-2xl font-black uppercase tracking-widest text-xs hover:bg-indigo-700 transition shadow-xl shadow-indigo-600/20">
                                            Choose Master Image
                                        </button>
                                        <input type="file" wire:model="image" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*">
                                    </div>
                                    @error('image') <p class="mt-4 text-xs font-bold text-rose-400">{{ $message }}</p> @enderror
                                </div>
                                <div class="w-full lg:w-64 h-40 rounded-2xl border-2 border-dashed border-slate-700 bg-slate-800/50 flex items-center justify-center overflow-hidden transition-all group-hover:border-indigo-500">
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover">
                                    @elseif ($existingImage)
                                        <img src="{{ Storage::url($existingImage) }}" class="w-full h-full object-cover">
                                    @else
                                        <i class="fas fa-camera text-3xl text-slate-600"></i>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Actions Area -->
                        <div class="grid gap-8 md:grid-cols-2 pt-6 border-t border-slate-100">
                            <div class="space-y-6">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="h-6 w-6 rounded bg-indigo-500 text-white flex items-center justify-center text-[10px]">1</div>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Primary Action</span>
                                </div>
                                <input type="text" wire:model="button1_text" placeholder="Button Text (e.g. Shop Now)"
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                                <input type="text" wire:model="button1_url" placeholder="Redirect URL (e.g. /shop)"
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-medium text-indigo-600 outline-none transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                            </div>

                            <div class="space-y-6">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="h-6 w-6 rounded bg-slate-800 text-white flex items-center justify-center text-[10px]">2</div>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Secondary Action</span>
                                </div>
                                <input type="text" wire:model="button2_text" placeholder="Button Text (e.g. Learn More)"
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                                <input type="text" wire:model="button2_url" placeholder="Redirect URL (e.g. /about)"
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-medium text-indigo-600 outline-none transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                            </div>
                        </div>

                        <div class="pt-10">
                            <button type="submit" 
                                class="w-full rounded-[2rem] bg-indigo-600 py-6 text-sm font-black uppercase tracking-[0.3em] text-white shadow-2xl shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 active:translate-y-0 transition-all duration-300">
                                Commit Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <footer class="py-10 text-center">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-[0.3em]">Nick's & Morris &copy; 2026 • Powered by Nexus</p>
        </footer>
    </main>
</div>
