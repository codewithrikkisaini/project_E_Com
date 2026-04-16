<div class="admin-shell min-h-screen bg-slate-100 lg:flex">
    @include('livewire.admin.partials.sidebar')

    <main class="flex-1">
        <header class="border-b border-slate-200 bg-white px-4 py-3 lg:px-8">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <h1 class="text-3xl font-semibold text-slate-900 lg:text-[42px] lg:leading-none">Settings</h1>
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
                    <h2 class="text-2xl font-bold text-slate-900">Settings</h2>
                    <p class="text-sm text-slate-500">Manage website brand, media, contact and social configuration.</p>
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
                    <form wire:submit="save" class="space-y-5">
                        <div class="grid gap-5 lg:grid-cols-2">
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Website Name</label>
                                <input type="text" wire:model.live="website_name" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">ISO Certification</label>
                                <input type="text" wire:model.live="iso_certification" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Light Logo</label>
                                <input type="file" wire:model="light_logo" accept="image/png,image/jpeg,image/webp" class="block w-full rounded-xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3 text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-blue-600 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-white" />
                                @if ($light_logo)
                                    <img src="{{ $light_logo->temporaryUrl() }}" alt="Light logo preview" class="mt-3 h-16 w-16 rounded-lg border border-slate-200 object-cover" />
                                @elseif($existingLightLogo)
                                    <img src="{{ asset('storage/' . $existingLightLogo) }}" alt="Light logo" class="mt-3 h-16 w-16 rounded-lg border border-slate-200 object-cover" />
                                @endif
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Dark Logo</label>
                                <input type="file" wire:model="dark_logo" accept="image/png,image/jpeg,image/webp" class="block w-full rounded-xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3 text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-blue-600 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-white" />
                                @if ($dark_logo)
                                    <img src="{{ $dark_logo->temporaryUrl() }}" alt="Dark logo preview" class="mt-3 h-16 w-16 rounded-lg border border-slate-200 object-cover" />
                                @elseif($existingDarkLogo)
                                    <img src="{{ asset('storage/' . $existingDarkLogo) }}" alt="Dark logo" class="mt-3 h-16 w-16 rounded-lg border border-slate-200 object-cover" />
                                @endif
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Email(s)</label>
                                <textarea wire:model.live="email" rows="2" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white"></textarea>
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Mobile(s)</label>
                                <textarea wire:model.live="mobiles" rows="2" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white"></textarea>
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">WhatsApp</label>
                                <input type="text" wire:model.live="whatsapp" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Google Map URL / Embed</label>
                                <input type="text" wire:model.live="google_map_embed" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Facebook</label>
                                <input type="text" wire:model.live="facebook" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Instagram</label>
                                <input type="text" wire:model.live="instagram" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">LinkedIn</label>
                                <input type="text" wire:model.live="linkedin" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">YouTube</label>
                                <input type="text" wire:model.live="youtube" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                            </div>
                            <div class="lg:col-span-2">
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Twitter / X</label>
                                <input type="text" wire:model.live="twitter_x" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                            </div>
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-slate-700">Footer Text</label>
                            <textarea wire:model.live="footer_text" rows="2" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white"></textarea>
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-slate-700">Company Profile</label>
                            <textarea wire:model.live="company_profile" rows="3" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white"></textarea>
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-slate-700">Live Chat Widget</label>
                            <textarea wire:model.live="live_chat_widget" rows="3" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white"></textarea>
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-slate-700">Address</label>
                            <textarea wire:model.live="address" rows="3" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white"></textarea>
                        </div>

                        <div>
                            <button type="submit" class="rounded-xl bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-blue-700">
                                Save Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</div>
