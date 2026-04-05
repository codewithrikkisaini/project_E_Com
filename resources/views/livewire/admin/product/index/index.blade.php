<div class="min-h-screen bg-slate-100 p-4 lg:p-8">
    <div class="mx-auto max-w-7xl space-y-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 lg:text-3xl">Products</h1>
                <p class="text-sm text-slate-500">Manage your inventory products from one place.</p>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Dashboard
                </a>
                <a href="{{ route('admin.product.create') }}"
                    class="rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                    Create Product
                </a>
            </div>
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

        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm lg:p-6">
            <div class="mb-4 max-w-md">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search by name or slug..."
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold text-slate-600">Name</th>
                            <th class="px-4 py-3 text-left font-semibold text-slate-600">Slug</th>
                            <th class="px-4 py-3 text-left font-semibold text-slate-600">Price</th>
                            <th class="px-4 py-3 text-left font-semibold text-slate-600">Stock</th>
                            <th class="px-4 py-3 text-left font-semibold text-slate-600">Created</th>
                            <th class="px-4 py-3 text-right font-semibold text-slate-600">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($products as $product)
                            <tr>
                                <td class="px-4 py-3 font-medium text-slate-800">{{ $product->name }}</td>
                                <td class="px-4 py-3 text-slate-600">{{ $product->slug }}</td>
                                <td class="px-4 py-3 text-slate-600">{{ number_format((float) $product->price, 2) }}</td>
                                <td class="px-4 py-3 text-slate-600">{{ $product->stock }}</td>
                                <td class="px-4 py-3 text-slate-600">{{ $product->created_at?->format('d M Y') }}</td>
                                <td class="px-4 py-3 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.product.edit', $product) }}"
                                            class="rounded-lg border border-blue-200 px-3 py-1.5 text-xs font-semibold text-blue-700 hover:bg-blue-50">
                                            Edit
                                        </a>
                                        <button type="button" wire:click="delete({{ $product->id }})"
                                            wire:confirm="Are you sure you want to delete this product?"
                                            class="rounded-lg border border-rose-200 px-3 py-1.5 text-xs font-semibold text-rose-700 hover:bg-rose-50">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-slate-500">No products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
