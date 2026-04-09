<div class="admin-shell min-h-screen bg-slate-100 lg:flex">
    <aside class="w-full border-r border-slate-200 bg-white lg:sticky lg:top-0 lg:h-screen lg:w-72">
        <div class="border-b border-slate-100 px-6 py-5">
            <h2 class="text-xl font-bold text-slate-800">NM</h2>
            <h1 class="text-sm font-medium text-slate-600">Dashboard</h1>
            <p class="text-xs text-gray-400">Nick's & Morris</p>
        </div>

        @php
            $active = fn($path) => request()->is($path)
                ? 'bg-gray-100 text-gray-900'
                : 'text-gray-700 hover:bg-gray-100';
        @endphp

        <nav class="flex-1 space-y-2 overflow-y-auto px-4 py-6">
            <a href="{{ url('/admin/dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/dashboard*') }}">
                <span>🏠</span>
                <span class="font-semibold">Dashboard</span>
            </a>

            <a href="{{ url('/admin/products') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/products*') }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5v4M15 5v4" />
                </svg>
                <span>Products</span>
            </a>

            <a href="{{ url('/admin/banner') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/banner*') }}">
                <span>🖼</span>
                <span>Banner</span>
            </a>

            <a href="{{ url('/admin/about') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/about*') }}">
                <span>ℹ</span>
                <span>About</span>
            </a>

            <a href="{{ url('/admin/testimonials') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/testimonials*') }}">
                <span>💬</span>
                <span>Testimonials</span>
            </a>

            <a href="{{ url('/admin/orders') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/orders*') }}">
                <span>📑</span>
                <span>Orders</span>
            </a>

            <a href="{{ url('/admin/users') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/users*') }}">
                <span>👤</span>
                <span>Users</span>
            </a>

            <a href="{{ url('/admin/payment-settings') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/payment-settings*') }}">
                <span>💳</span>
                <span>QR Payment</span>
            </a>

            <a href="{{ url('/admin/settings') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/settings*') }}">
                <span>⚙</span>
                <span>Settings</span>
            </a>

            <div x-data="{ open: true }">
                <button @click="open = !open"
                    class="flex w-full items-center justify-between px-4 py-3 text-gray-700 transition hover:bg-gray-100">
                    <div class="flex items-center gap-3">
                        <span>📝</span>
                        <span>Blogs</span>
                    </div>

                    <span :class="open && 'rotate-180'">⌄</span>
                </button>

                <div x-show="open" class="mt-2 space-y-2 pl-8">
                    <a href="{{ url('/admin/blog-categories') }}"
                        class="block rounded-lg px-4 py-2 text-sm {{ $active('admin/blog-categories*') }}">
                        Categories
                    </a>

                    <a href="{{ url('/admin/blogs') }}" class="block rounded-lg px-4 py-2 text-sm {{ $active('admin/blogs*') }}">
                        Blogs
                    </a>
                </div>
            </div>
        </nav>
    </aside>

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
            <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-xl">
                <div class="mb-4 flex items-start justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-slate-900">{{ $editingId ? 'Edit Category' : 'Create Category' }}</h2>
                        <p class="text-sm text-slate-500">Blog category details</p>
                    </div>
                    <button type="button" wire:click="closeModal" class="text-slate-400 transition hover:text-slate-700">✕</button>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Name</label>
                        <input type="text" wire:model.defer="name" placeholder="Enter category name"
                            class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100" />
                        @error('name')
                            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-2">
                    <button type="button" wire:click="closeModal"
                        class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                        Cancel
                    </button>
                    <button type="button" wire:click="saveCategory"
                        class="rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">
                        {{ $editingId ? 'Update' : 'Create' }}
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
