<div class="admin-shell min-h-screen bg-slate-100 lg:flex">
    @include('livewire.admin.partials.sidebar')

    <main class="flex-1 p-4 lg:p-8">
        <div class="space-y-5">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <h1 class="text-4xl font-semibold text-slate-900">Categories</h1>
                    <p class="text-sm text-slate-500">Manage your blog categories</p>
                    <p class="mt-1 text-sm text-slate-600">Total: {{ $totalCategories }}</p>
                </div>

                <button type="button" wire:click="openCreateModal"
                    class="inline-flex items-center gap-2 rounded-2xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">
                    <span class="text-lg leading-none">+</span>
                    <span>Create Category</span>
                </button>
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

            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div class="relative w-full md:max-w-sm">
                    <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">⌕</span>
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search categories"
                        class="w-full rounded-2xl border border-slate-200 bg-white py-2.5 pl-11 pr-4 text-sm text-slate-700 outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100" />
                </div>

                <label class="flex items-center gap-3 text-sm text-slate-700">
                    <span>Per page:</span>
                    <select wire:model.live="perPage"
                        class="rounded-2xl border border-slate-200 bg-white px-4 py-2 text-sm outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                </label>
            </div>

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-5 py-4 text-left text-sm font-semibold uppercase tracking-wide text-slate-700">#</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold uppercase tracking-wide text-slate-700">Name</th>
                            <th class="px-5 py-4 text-right text-sm font-semibold uppercase tracking-wide text-slate-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse($categories as $index => $category)
                            <tr>
                                <td class="px-5 py-4 text-slate-700">{{ ($categories->firstItem() ?? 0) + $index }}</td>
                                <td class="px-5 py-4 font-medium text-slate-900">{{ $category->name }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex justify-end gap-2">
                                        <button type="button" wire:click="openEditModal({{ $category->id }})"
                                            class="rounded-full bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">
                                            Edit
                                        </button>
                                        <button type="button" wire:click="deleteCategory({{ $category->id }})"
                                            wire:confirm="Are you sure you want to delete this category?"
                                            class="rounded-full bg-rose-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-rose-700">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-5 py-10 text-center text-slate-500">No categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="flex flex-col gap-3 border-t border-slate-200 px-5 py-4 text-sm text-slate-600 md:flex-row md:items-center md:justify-between">
                    <p>
                        Showing {{ $categories->firstItem() ?? 0 }}-{{ $categories->lastItem() ?? 0 }} of {{ $categories->total() }} items
                    </p>

                    @if ($categories->hasPages())
                        <div class="flex items-center gap-2">
                            <button type="button" wire:click="previousPage"
                                @disabled(! $categories->onFirstPage())
                                class="rounded-xl border border-slate-200 px-3 py-2 transition enabled:hover:bg-slate-50 disabled:cursor-not-allowed disabled:opacity-50">
                                Previous
                            </button>

                            <span class="rounded-xl bg-blue-600 px-3 py-2 font-semibold text-white">{{ $categories->currentPage() }}</span>

                            <button type="button" wire:click="nextPage"
                                @disabled(! $categories->hasMorePages())
                                class="rounded-xl border border-slate-200 px-3 py-2 transition enabled:hover:bg-slate-50 disabled:cursor-not-allowed disabled:opacity-50">
                                Next
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    @if ($showFormModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/40 p-4">
            <div class="w-full max-w-xl overflow-hidden rounded-3xl bg-white shadow-2xl">
                <div class="flex items-center justify-between bg-gradient-to-r from-blue-700 to-blue-500 px-7 py-6">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-800/40 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h2 class="text-[38px] font-semibold leading-none text-white">{{ $editingId ? 'Edit Category' : 'Create Category' }}</h2>
                    </div>
                    <button type="button" wire:click="closeModal" class="text-3xl leading-none text-white/80 transition hover:text-white">×</button>
                </div>

                <div class="space-y-6 p-7">
                    <div>
                        <label class="mb-2 block text-xl font-semibold text-slate-700">Category Name</label>
                        <input type="text" wire:model.defer="name" placeholder="e.g., Technology"
                            class="w-full rounded-2xl border border-slate-300 px-5 py-3 text-[34px] leading-tight text-slate-700 outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100" />
                        @error('name')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-xl font-semibold text-slate-700">Slug</label>
                        <input type="text" wire:model.defer="slug" placeholder="e.g., technology"
                            class="w-full rounded-2xl border border-slate-300 px-5 py-3 text-[34px] leading-tight text-slate-700 outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100" />
                        @error('slug')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-2 grid grid-cols-2 gap-4">
                        <button type="button" wire:click="closeModal"
                            class="inline-flex items-center justify-center gap-2 rounded-2xl bg-red-600 px-4 py-3 text-[34px] font-semibold leading-none text-white transition hover:bg-red-700">
                            <span>×</span>
                            <span class="text-[32px]">Cancel</span>
                        </button>
                        <button type="button" wire:click="saveCategory"
                            class="inline-flex items-center justify-center gap-2 rounded-2xl bg-blue-600 px-4 py-3 text-[34px] font-semibold leading-none text-white transition hover:bg-blue-700">
                            <span>✓</span>
                            <span class="text-[32px]">Save Category</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
