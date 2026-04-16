<div class="admin-shell min-h-screen bg-slate-100 lg:flex">
    @include('livewire.admin.partials.sidebar')

    <main class="flex-1">
        <header class="border-b border-slate-200 bg-white px-4 py-3 lg:px-8">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <h1 class="text-3xl font-semibold text-slate-900 lg:text-[42px] lg:leading-none">Users</h1>
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
            <div class="mx-auto max-w-7xl space-y-6">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900">Users</h2>
                        <p class="text-sm text-slate-500">Only customer users are listed here.</p>
                    </div>
                    <p class="text-sm text-slate-600">Total Users: {{ $totalUsers }}</p>
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

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search by name/email/phone"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                </div>

                <div class="overflow-x-auto rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <table class="min-w-full divide-y divide-slate-200 text-sm">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-5 py-4 text-left font-semibold text-slate-700">S.No.</th>
                                <th class="px-5 py-4 text-left font-semibold text-slate-700">User</th>
                                <th class="px-5 py-4 text-left font-semibold text-slate-700">Contact</th>
                                <th class="px-5 py-4 text-left font-semibold text-slate-700">Orders</th>
                                <th class="px-5 py-4 text-left font-semibold text-slate-700">Joined</th>
                                <th class="px-5 py-4 text-left font-semibold text-slate-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($users as $index => $user)
                                <tr>
                                    <td class="px-5 py-4 text-slate-700">{{ ($users->firstItem() ?? 0) + $index }}</td>
                                    <td class="px-5 py-4">
                                        <p class="font-medium text-slate-900">{{ $user->name }}</p>
                                    </td>
                                    <td class="px-5 py-4">
                                        <p class="text-slate-700">{{ $user->email }}</p>
                                        <p class="text-xs text-slate-500">{{ $user->phone ?: '-' }}</p>
                                    </td>
                                    <td class="px-5 py-4 text-slate-700">{{ $user->orders_count }}</td>
                                    <td class="px-5 py-4 text-slate-700">{{ $user->created_at?->format('d M Y') }}</td>
                                    <td class="px-5 py-4">
                                        <button type="button" wire:click="deleteUser({{ $user->id }})"
                                            wire:confirm="Are you sure you want to delete this user?"
                                            class="rounded-lg border border-rose-200 px-3 py-1.5 text-xs font-semibold text-rose-700 hover:bg-rose-50">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-5 py-10 text-center text-slate-500">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="border-t border-slate-200 px-5 py-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
