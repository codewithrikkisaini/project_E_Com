<div class="admin-shell min-h-screen bg-slate-50 lg:flex">
    <x-admin.sidebar />

    <main class="flex-1">
        <!-- Premium Header -->
        <header class="sticky top-0 z-40 border-b border-slate-200/60 bg-white/80 backdrop-blur-md px-4 py-4 lg:px-10 shrink-0">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight lg:text-3xl">Fintech <span class="text-indigo-600">Gateway</span></h1>
                    <div class="flex items-center gap-2 mt-1 text-xs font-bold text-slate-500 uppercase tracking-widest">
                        <span>Admin</span>
                        <i class="fas fa-chevron-right text-[8px]"></i>
                        <span class="text-indigo-500">Transaction Protocol</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-100 border border-slate-200">
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest italic">Secure Node</span>
                    </div>
                    <div class="flex items-center gap-2 border-l border-slate-200 pl-4">
                        <button type="button" class="relative rounded-xl p-2.5 text-slate-500 transition hover:bg-slate-100 hover:text-indigo-600">
                            <i class="fas fa-shield-alt text-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-10">
            <div class="mx-auto max-w-4xl space-y-10">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight">QR <span class="text-indigo-600">Settlement</span></h2>
                        <p class="mt-2 text-slate-500 font-medium">Configure digital collection assets and customer remittance instructions.</p>
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
                        <!-- QR Asset Section -->
                        <div class="space-y-8">
                            <div class="flex items-center gap-3">
                                <div class="h-1 w-12 bg-indigo-600 rounded-full"></div>
                                <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400">Payment Asset</h3>
                            </div>
                            
                            <div class="flex flex-col lg:flex-row items-center gap-10">
                                <div class="relative group cursor-pointer w-full lg:w-auto">
                                    <div class="h-56 w-56 rounded-[2.5rem] bg-slate-50 border-2 border-dashed border-slate-200 flex flex-col items-center justify-center overflow-hidden transition-all group-hover:border-indigo-400 group-hover:bg-indigo-50/30">
                                        @if ($qrImage)
                                            <img src="{{ $qrImage->temporaryUrl() }}" class="h-full w-full object-contain p-4" />
                                        @elseif($existingQrImage)
                                            <img src="{{ asset('storage/' . $existingQrImage) }}" class="h-full w-full object-contain p-4" />
                                        @else
                                            <i class="fas fa-qrcode text-slate-200 text-5xl mb-3"></i>
                                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Awaiting File</span>
                                        @endif
                                        <input type="file" wire:model="qrImage" class="absolute inset-0 opacity-0 cursor-pointer" />
                                    </div>
                                    @error('qrImage') <p class="mt-3 text-center text-xs font-bold text-rose-500">{{ $message }}</p> @enderror
                                </div>

                                <div class="flex-1 space-y-4 text-center lg:text-left">
                                    <h4 class="text-xl font-black text-slate-900 tracking-tight">QR Signature Code</h4>
                                    <p class="text-sm font-medium text-slate-500 leading-relaxed">Upload your official UPI or banking QR code. This will be presented to users during the checkout phase to facilitate instant transfers.</p>
                                    <div class="pt-4 flex flex-wrap justify-center lg:justify-start gap-3">
                                        <span class="px-4 py-2 rounded-xl bg-slate-100 text-[10px] font-black text-slate-500 uppercase tracking-widest">JPG</span>
                                        <span class="px-4 py-2 rounded-xl bg-slate-100 text-[10px] font-black text-slate-500 uppercase tracking-widest">PNG</span>
                                        <span class="px-4 py-2 rounded-xl bg-slate-100 text-[10px] font-black text-slate-500 uppercase tracking-widest">WEBP</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Instructions Section -->
                        <div class="space-y-8">
                            <div class="flex items-center gap-3">
                                <div class="h-1 w-12 bg-indigo-600 rounded-full"></div>
                                <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400">Payment Directives</h3>
                            </div>
                            
                            <div>
                                <label class="mb-4 block text-[10px] font-black uppercase tracking-widest text-slate-400">Remittance Guidelines</label>
                                <textarea wire:model.live="instructions" rows="8" placeholder="Specify step-by-step payment verification steps..."
                                    class="w-full rounded-3xl border-slate-200 bg-slate-50 px-6 py-6 text-base font-medium text-slate-600 outline-none transition focus:bg-white focus:ring-4 focus:ring-indigo-100 shadow-inner"></textarea>
                                @error('instructions') <p class="mt-3 text-xs font-bold text-rose-500">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="pt-10">
                            <button type="submit" class="w-full rounded-[2rem] bg-indigo-600 py-6 text-sm font-black uppercase tracking-[0.3em] text-white shadow-2xl shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 transition-all duration-300">
                                Commit Security Policy
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <footer class="py-10 text-center">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.7em]">Financial Engineering • Nexus Payment Core</p>
        </footer>
    </main>
</div>
