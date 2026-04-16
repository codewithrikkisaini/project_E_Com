<div class="admin-shell min-h-screen bg-slate-100 lg:flex">
    @include('livewire.admin.partials.sidebar')

    <main class="flex-1">
        <header class="border-b border-slate-200 bg-white px-4 py-3 lg:px-8">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <h1 class="text-3xl font-semibold text-slate-900 lg:text-[42px] lg:leading-none">Testimonials</h1>
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
                    <h2 class="text-2xl font-bold text-slate-900">Testimonials</h2>
                    <p class="text-sm text-slate-500">Manage customer testimonials for website sections.</p>
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

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm lg:p-7">
                    <div class="mb-4 flex items-center justify-between gap-3">
                        <h3 class="text-xl font-semibold text-slate-900">{{ $testimonial ? 'Edit Testimonial' : 'Add Testimonial' }}</h3>

                        @if ($testimonial)
                            <button type="button" wire:click="createNew"
                                class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
                                New Testimonial
                            </button>
                        @endif
                    </div>

                    <form wire:submit="save" class="space-y-5">
                        <div class="grid gap-5 lg:grid-cols-2">
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Name</label>
                                <input type="text" wire:model.live="name"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                                @error('name')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Rating</label>
                                <select wire:model.live="rating"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white">
                                    <option value="5">5 Star</option>
                                    <option value="4">4 Star</option>
                                    <option value="3">3 Star</option>
                                    <option value="2">2 Star</option>
                                    <option value="1">1 Star</option>
                                </select>
                                @error('rating')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Sort Order</label>
                                <input type="number" min="0" wire:model.live="sort_order"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                                @error('sort_order')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-end pb-2">
                                <label class="inline-flex items-center gap-2 text-sm font-medium text-slate-700">
                                    <input type="checkbox" wire:model.live="is_active" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500" />
                                    Active
                                </label>
                            </div>

                            <div class="lg:col-span-2">
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Message</label>
                                <textarea wire:model.live="message" rows="4"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white"></textarea>
                                @error('message')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="lg:col-span-2">
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">Photo</label>
                                <input type="file" wire:model="photo" accept="image/png,image/jpeg,image/webp"
                                    class="block w-full rounded-xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3 text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-blue-600 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-white" />
                                @error('photo')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror

                                @if ($photo)
                                    <img src="{{ $photo->temporaryUrl() }}" alt="Preview"
                                        class="mt-3 h-24 w-24 rounded-xl border border-slate-200 object-cover" />
                                @elseif($existingPhoto)
                                    <img src="{{ asset('storage/' . $existingPhoto) }}" alt="Current photo"
                                        class="mt-3 h-24 w-24 rounded-xl border border-slate-200 object-cover" />
                                @endif
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700">
                                {{ $testimonial ? 'Update Testimonial' : 'Save Testimonial' }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm lg:p-7">
                    <div class="flex items-center justify-between gap-3">
                        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search testimonials..."
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white sm:w-80" />
                    </div>

                    <div class="mt-5 overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200 text-sm">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Name</th>
                                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Message</th>
                                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Rating</th>
                                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Status</th>
                                    <th class="px-4 py-3 text-right font-semibold text-slate-600">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($testimonials as $item)
                                    <tr>
                                        <td class="px-4 py-3 font-medium text-slate-800">
                                            <div class="flex items-center gap-3">
                                                @if ($item->photo)
                                                    <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}"
                                                        class="h-10 w-10 rounded-full border border-slate-200 object-cover" />
                                                @endif
                                                <span>{{ $item->name }}</span>
                                            </div>
                                        </td>
                                        <td class="max-w-xl truncate px-4 py-3 text-slate-600">{{ $item->message }}</td>
                                        <td class="px-4 py-3 text-slate-600">{{ $item->rating }} Star</td>
                                        <td class="px-4 py-3">
                                            <span class="rounded-full px-2 py-1 text-xs font-medium {{ $item->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-200 text-slate-700' }}">
                                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <button type="button" wire:click="edit({{ $item->id }})"
                                                    class="rounded-lg border border-blue-200 px-3 py-1.5 text-xs font-semibold text-blue-700 hover:bg-blue-50">
                                                    Edit
                                                </button>
                                                <button type="button" wire:click="delete({{ $item->id }})"
                                                    wire:confirm="Are you sure you want to delete this testimonial?"
                                                    class="rounded-lg border border-rose-200 px-3 py-1.5 text-xs font-semibold text-rose-700 hover:bg-rose-50">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-8 text-center text-slate-500">No testimonials found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $testimonials->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
