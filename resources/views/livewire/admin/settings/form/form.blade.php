<div class="admin-shell min-h-screen bg-slate-50 lg:flex">
    <x-admin.sidebar />

    <main class="flex-1">
        <!-- Premium Header -->
        <header class="sticky top-0 z-40 border-b border-slate-200/60 bg-white/80 backdrop-blur-md px-4 py-4 lg:px-10 shrink-0">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight lg:text-3xl">System <span class="text-indigo-600">Architect</span></h1>
                    <div class="flex items-center gap-2 mt-1 text-xs font-bold text-slate-500 uppercase tracking-widest">
                        <span>Admin</span>
                        <i class="fas fa-chevron-right text-[8px]"></i>
                        <span class="text-indigo-500">Global Configuration</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-100 border border-slate-200">
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest italic">Core Engine v2.0</span>
                    </div>
                    <div class="flex items-center gap-2 border-l border-slate-200 pl-4">
                        <button type="button" class="relative rounded-xl p-2.5 text-slate-500 transition hover:bg-slate-100 hover:text-indigo-600">
                            <i class="fas fa-cog text-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-10">
            <div class="mx-auto max-w-5xl space-y-10">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight">Platform <span class="text-indigo-600">Identity</span></h2>
                        <p class="mt-2 text-slate-500 font-medium">Control brand assets, contact channels, and system integrations.</p>
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

                <div class="rounded-[2.5rem] border border-slate-200 bg-white p-8 lg:p-12 shadow-2xl shadow-slate-200/50">
                    <form wire:submit="save" class="space-y-12">
                        <!-- Section: Brand & Media -->
                        <div class="space-y-8">
                            <div class="flex items-center gap-3">
                                <div class="h-1 w-12 bg-indigo-600 rounded-full"></div>
                                <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400">Brand Identity</h3>
                            </div>
                            
                            <div class="grid gap-8 lg:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Trading Name</label>
                                    <input type="text" wire:model.live="website_name" 
                                        class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100" />
                                </div>
                                <div>
                                    <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Certification Reference</label>
                                    <input type="text" wire:model.live="iso_certification" 
                                        class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100" />
                                </div>
                                
                                <div class="rounded-3xl border border-dashed border-slate-200 bg-slate-50/50 p-6 flex flex-col items-center text-center">
                                    <label class="mb-4 block text-[10px] font-black uppercase tracking-widest text-slate-400">Light Signature Logo</label>
                                    <div class="relative group cursor-pointer">
                                        <div class="h-24 w-24 rounded-2xl bg-white shadow-md border border-slate-100 flex items-center justify-center overflow-hidden transition-transform group-hover:scale-105">
                                            @if ($light_logo)
                                                <img src="{{ $light_logo->temporaryUrl() }}" class="object-contain p-2" />
                                            @elseif($existingLightLogo)
                                                <img src="{{ asset('storage/' . $existingLightLogo) }}" class="object-contain p-2" />
                                            @else
                                                <i class="fas fa-image text-slate-200 text-3xl"></i>
                                            @endif
                                        </div>
                                        <input type="file" wire:model="light_logo" class="absolute inset-0 opacity-0 cursor-pointer" />
                                    </div>
                                    <p class="mt-4 text-[10px] font-bold text-slate-400">Click to upload (White background)</p>
                                </div>

                                <div class="rounded-3xl border border-dashed border-slate-200 bg-slate-900 p-6 flex flex-col items-center text-center">
                                    <label class="mb-4 block text-[10px] font-black uppercase tracking-widest text-slate-400 text-slate-500">Dark Signature Logo</label>
                                    <div class="relative group cursor-pointer">
                                        <div class="h-24 w-24 rounded-2xl bg-slate-800 shadow-xl border border-slate-700 flex items-center justify-center overflow-hidden transition-transform group-hover:scale-105">
                                            @if ($dark_logo)
                                                <img src="{{ $dark_logo->temporaryUrl() }}" class="object-contain p-2" />
                                            @elseif($existingDarkLogo)
                                                <img src="{{ asset('storage/' . $existingDarkLogo) }}" class="object-contain p-2" />
                                            @else
                                                <i class="fas fa-image text-slate-700 text-3xl"></i>
                                            @endif
                                        </div>
                                        <input type="file" wire:model="dark_logo" class="absolute inset-0 opacity-0 cursor-pointer" />
                                    </div>
                                    <p class="mt-4 text-[10px] font-bold text-slate-500">Click to upload (Dark background)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Section: Communication -->
                        <div class="space-y-8">
                            <div class="flex items-center gap-3">
                                <div class="h-1 w-12 bg-emerald-600 rounded-full"></div>
                                <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400">Contact Channels</h3>
                            </div>
                            
                            <div class="grid gap-8 lg:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Enterprise Email(s)</label>
                                    <textarea wire:model.live="email" rows="2" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100"></textarea>
                                </div>
                                <div>
                                    <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Support Hotline(s)</label>
                                    <textarea wire:model.live="mobiles" rows="2" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100"></textarea>
                                </div>
                                <div>
                                    <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">WhatsApp Integration</label>
                                    <input type="text" wire:model.live="whatsapp" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100" />
                                </div>
                                <div>
                                    <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Maps Coordinate Embed</label>
                                    <input type="text" wire:model.live="google_map_embed" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100" />
                                </div>
                            </div>
                        </div>

                        <!-- Section: Aesthetics -->
                        <div class="space-y-8 rounded-[2rem] bg-slate-900 p-10 text-white relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-600/10 rounded-full blur-3xl -mr-20 -mt-20"></div>
                            
                            <div class="relative z-10">
                                <div class="flex items-center gap-3 mb-8">
                                    <div class="h-1 w-12 bg-indigo-400 rounded-full"></div>
                                    <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400">Platform Aesthetics</h3>
                                </div>

                                <div class="grid gap-10 lg:grid-cols-2">
                                    <div>
                                        <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-500">Global Header/Footer Hue</label>
                                        <p class="text-[10px] text-slate-500 mb-6 font-medium uppercase tracking-tighter">Affects primary navigation and footer background globally.</p>
                                        
                                        <div class="flex items-center gap-6">
                                            <input type="color" wire:model.live="header_footer_color" class="h-16 w-16 cursor-pointer rounded-2xl border-2 border-slate-700 bg-transparent p-1 transition hover:border-indigo-400" />
                                            <div class="flex-1">
                                                <input type="text" wire:model.live="header_footer_color" class="w-full rounded-xl border-slate-700 bg-slate-800 px-4 py-3 text-sm font-black text-indigo-400 outline-none ring-1 ring-slate-700 focus:ring-indigo-500" />
                                                <button type="button" wire:click="restoreDefaultColor" class="mt-3 text-[10px] font-black uppercase tracking-widest text-slate-500 hover:text-white transition">Restore Default</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-col justify-end">
                                        <div class="overflow-hidden rounded-2xl border border-slate-800 bg-slate-950 p-6 flex items-center justify-center relative group">
                                            <div class="absolute inset-x-0 top-0 h-4 transition-all duration-500" style="background-color: {{ $header_footer_color }}"></div>
                                            <div class="text-center">
                                                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-600">Interface Preview</span>
                                                <p class="text-xs font-bold text-slate-400 mt-2">Active Signature: <span class="text-indigo-400">{{ $header_footer_color }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section: Legal & Scripts -->
                        <div class="space-y-8 pt-4">
                            <div class="flex items-center gap-3">
                                <div class="h-1 w-12 bg-violet-600 rounded-full"></div>
                                <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400">Content & Integration</h3>
                            </div>
                            
                            <div class="grid gap-8 lg:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Company Narrative</label>
                                    <textarea wire:model.live="company_profile" rows="3" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100"></textarea>
                                </div>
                                <div>
                                    <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Live Communication Script</label>
                                    <textarea wire:model.live="live_chat_widget" rows="3" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100"></textarea>
                                </div>
                                <div class="lg:col-span-2">
                                    <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Physical HQ Address</label>
                                    <textarea wire:model.live="address" rows="3" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-700 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="pt-10">
                            <button type="submit" class="w-full rounded-[2rem] bg-indigo-600 py-6 text-sm font-black uppercase tracking-[0.3em] text-white shadow-2xl shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 transition-all duration-300">
                                Deploy Configuration
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <footer class="py-10 text-center">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.6em]">System Architecture • Built for Excellence</p>
        </footer>
    </main>
</div>
