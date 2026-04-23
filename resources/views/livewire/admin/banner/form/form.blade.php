<div class="admin-shell min-h-screen bg-slate-100 lg:flex">
    @include('livewire.admin.partials.sidebar')

    <main class="flex-1">
        <header class="border-b border-slate-200 bg-white px-4 py-3 lg:px-8">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <h1 class="text-3xl font-semibold text-slate-900 lg:text-[42px] lg:leading-none">Banner</h1>
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
            <div class="mx-auto max-w-6xl space-y-6">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 lg:text-3xl">Banner</h2>
                    <p class="text-sm text-slate-500">Manage home hero banner content and CTA buttons.</p>
                </div>

                @if (session('success'))
                    <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit="save" class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm lg:p-8">
                    <div class="grid gap-6">
                        <div>
                            <label class="mb-2 block text-base font-medium text-slate-700">Title</label>
                            <input type="text" wire:model.live="banner_title"
                                class="w-full rounded-full border border-slate-300 bg-white px-5 py-3 text-base outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100" />
                            @error('banner_title')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-base font-medium text-slate-700">Description</label>
                            <textarea wire:model.live="banner_description" rows="6"
                                class="w-full rounded-3xl border border-slate-300 bg-white px-5 py-4 text-base outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100"></textarea>
                            @error('banner_description')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-base font-medium text-slate-700">Banner Image</label>
                            <input type="file" wire:model="banner_image" accept="image/png,image/jpeg,image/webp"
                                class="block w-full rounded-2xl border border-dashed border-slate-300 bg-white px-4 py-3 text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-blue-600 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white" />
                            @error('banner_image')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror

                            <div class="mt-4">
                                @if ($banner_image)
                                    <img src="{{ $banner_image->temporaryUrl() }}" alt="Banner preview"
                                        class="h-28 w-28 rounded-lg border border-slate-200 object-cover" />
                                @elseif($existingBannerImage)
                                    <img src="{{ asset('storage/' . $existingBannerImage) }}" alt="Current banner"
                                        class="h-28 w-28 rounded-lg border border-slate-200 object-cover" />
                                @endif
                            </div>
                        </div>

                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-base font-medium text-slate-700">Button 1 Text</label>
                                <input type="text" wire:model.live="banner_button_1_text"
                                    class="w-full rounded-full border border-slate-300 bg-white px-5 py-3 text-base outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100" />
                                @error('banner_button_1_text')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-2 block text-base font-medium text-slate-700">Button 1 URL</label>
                                <input type="text" wire:model.live="banner_button_1_url"
                                    class="w-full rounded-full border border-slate-300 bg-white px-5 py-3 text-base outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100" />
                                @error('banner_button_1_url')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-2">
                            <a href="{{ route('admin.dashboard') }}"
                                class="rounded-full border border-slate-300 bg-white px-6 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">
                                Cancel
                            </a>
                            <button type="submit"
                                class="rounded-full bg-blue-600 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">
                                Save Banner
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</div>
