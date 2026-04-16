<div class="admin-shell min-h-screen bg-slate-100 lg:flex">
    @include('livewire.admin.partials.sidebar')

    <main class="flex-1">
        <header class="border-b border-slate-200 bg-white px-4 py-3 lg:px-8">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <h1 class="text-3xl font-semibold text-slate-900 lg:text-[42px] lg:leading-none">QR Payment Settings</h1>
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
                <div>
                    <h2 class="text-2xl font-bold text-slate-900">QR Payment Settings</h2>
                    <p class="text-sm text-slate-500">Upload QR and write payment instructions shown on checkout page.</p>
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

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm lg:p-8">
                    <form wire:submit="save" class="space-y-6">
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-slate-700">QR Image</label>
                            <input type="file" wire:model="qrImage" accept="image/png,image/jpeg,image/webp"
                                class="block w-full rounded-xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3 text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-blue-600 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-white" />
                            @error('qrImage')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror

                            @if ($qrImage)
                                <img src="{{ $qrImage->temporaryUrl() }}" alt="QR Preview"
                                    class="mt-3 h-36 w-36 rounded-xl border border-slate-200 object-cover" />
                            @elseif($existingQrImage)
                                <img src="{{ asset('storage/' . $existingQrImage) }}" alt="Current QR"
                                    class="mt-3 h-36 w-36 rounded-xl border border-slate-200 object-cover" />
                            @endif
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-slate-700">Instructions</label>
                            <textarea wire:model.live="instructions" rows="6"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white"></textarea>
                            @error('instructions')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="rounded-xl bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-blue-700">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</div>
