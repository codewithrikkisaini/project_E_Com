<div class="admin-shell min-h-screen bg-slate-50 lg:flex">
    <x-admin.sidebar />

    <main class="flex-1">
        <!-- Premium Header -->
        <header class="sticky top-0 z-40 border-b border-slate-200/60 bg-white/80 backdrop-blur-md px-4 py-4 lg:px-10 shrink-0">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight lg:text-3xl">Community <span class="text-indigo-600">Hub</span></h1>
                    <div class="flex items-center gap-2 mt-1 text-xs font-bold text-slate-500 uppercase tracking-widest">
                        <span>Admin</span>
                        <i class="fas fa-chevron-right text-[8px]"></i>
                        <span class="text-indigo-500">Customer Base</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-100 border border-slate-200">
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Total: {{ $totalUsers }} Members</span>
                    </div>
                    <div class="flex items-center gap-2 border-l border-slate-200 pl-4">
                        <button type="button" class="relative rounded-xl p-2.5 text-slate-500 transition hover:bg-slate-100 hover:text-indigo-600">
                            <i class="fas fa-user-plus text-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-10">
            <div class="mx-auto max-w-7xl space-y-10">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight">Active <span class="text-indigo-600">Customers</span></h2>
                        <p class="mt-2 text-slate-500 font-medium">Manage your growing community and monitor user acquisition.</p>
                    </div>
                </div>

                @if (session('success'))
                    <div class="rounded-2xl border border-emerald-100 bg-emerald-50/50 p-4 flex items-center gap-3 text-sm font-bold text-emerald-700">
                        <div class="h-8 w-8 rounded-lg bg-emerald-500 flex items-center justify-center text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Search Area -->
                <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/40">
                    <div class="relative">
                        <span class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-search text-lg"></i>
                        </span>
                        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Locate user by name, email address, or mobile number..."
                            class="w-full rounded-[1.5rem] border-none bg-slate-50 pl-14 pr-6 py-5 text-base font-bold text-slate-700 focus:bg-white focus:ring-4 focus:ring-indigo-100 outline-none transition shadow-inner" />
                    </div>
                </div>

                <!-- Users Table -->
                <div class="rounded-[2.5rem] border border-slate-200 bg-white p-6 lg:p-10 shadow-2xl shadow-slate-200/50">
                    <div class="overflow-hidden rounded-3xl border border-slate-100 shadow-sm">
                        <table class="min-w-full divide-y divide-slate-100 text-sm">
                            <thead class="bg-slate-50/80 backdrop-blur-sm">
                                <tr>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Rank</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Member Profile</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Engagement</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Membership</th>
                                    <th class="px-6 py-5 text-right text-[11px] font-black uppercase tracking-widest text-slate-500">Control</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($users as $index => $user)
                                    <tr class="group hover:bg-slate-50/50 transition-all">
                                        <td class="px-6 py-6">
                                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-[10px] font-black text-slate-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                                                {{ ($users->firstItem() ?? 0) + $index }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-6">
                                            <div class="flex items-center gap-4">
                                                <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center text-slate-400 text-sm font-black group-hover:from-indigo-500 group-hover:to-violet-600 group-hover:text-white transition-all duration-500 shadow-sm">
                                                    {{ substr($user->name, 0, 1) }}
                                                </div>
                                                <div class="flex flex-col">
                                                    <span class="font-black text-slate-900 tracking-tight text-base">{{ $user->name }}</span>
                                                    <span class="text-[10px] font-bold text-slate-400 mt-0.5 tracking-tight">{{ $user->email }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6">
                                            <div class="flex flex-col">
                                                <div class="flex items-center gap-2">
                                                    <span class="text-sm font-black text-slate-800">{{ $user->orders_count }}</span>
                                                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Invoices</span>
                                                </div>
                                                <div class="mt-1.5 h-1 w-24 rounded-full bg-slate-100 overflow-hidden">
                                                    <div class="h-full bg-indigo-500" style="width: {{ min($user->orders_count * 10, 100) }}%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6">
                                            <div class="flex flex-col">
                                                <span class="text-xs font-bold text-slate-500">{{ $user->created_at?->format('d M, Y') }}</span>
                                                <span class="text-[9px] font-black text-emerald-500 uppercase tracking-tighter mt-1 italic">Verified Account</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6 text-right">
                                            <button type="button" wire:click="deleteUser({{ $user->id }})"
                                                wire:confirm="Relinquish this member from the database?"
                                                class="h-10 w-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-400 hover:text-rose-600 hover:border-rose-200 hover:rotate-12 transition-all shadow-sm">
                                                <i class="fas fa-user-minus text-xs"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-24 text-center">
                                            <div class="flex flex-col items-center gap-4">
                                                <div class="h-20 w-20 rounded-[2.5rem] bg-slate-50 flex items-center justify-center text-slate-100 text-5xl">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                                <p class="text-slate-300 font-black uppercase tracking-[0.4em] text-[10px]">Zero Members Found</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-10">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-10 text-center">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.5em]">Nick's & Morris Social Core • Active Registry</p>
        </footer>
    </main>
</div>
