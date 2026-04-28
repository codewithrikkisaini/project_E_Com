<div class="admin-shell min-h-screen bg-slate-50 lg:flex">
    <x-admin.sidebar />

    <main class="flex-1">
        <!-- Premium Header -->
        <header class="sticky top-0 z-40 border-b border-slate-200/60 bg-white/80 backdrop-blur-md px-4 py-4 lg:px-10 shrink-0">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight lg:text-3xl">Operations <span class="text-indigo-600">Pro</span></h1>
                    <div class="flex items-center gap-2 mt-1 text-xs font-bold text-slate-500 uppercase tracking-widest">
                        <span>Admin</span>
                        <i class="fas fa-chevron-right text-[8px]"></i>
                        <span class="text-indigo-500">Order Management</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-indigo-50 border border-indigo-100">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"></span>
                        <span class="text-[10px] font-black text-indigo-600 uppercase tracking-widest">Live Updates</span>
                    </div>
                    <div class="flex items-center gap-2 border-l border-slate-200 pl-4">
                        <button type="button" class="relative rounded-xl p-2.5 text-slate-500 transition hover:bg-slate-100 hover:text-indigo-600">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="absolute top-2 right-2 w-2 h-2 bg-rose-500 rounded-full border-2 border-white"></span>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-10">
            <div class="mx-auto max-w-7xl space-y-10">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight">Purchase <span class="text-indigo-600">History</span></h2>
                        <p class="mt-2 text-slate-500 font-medium">Monitor fulfillment cycles, payments, and customer interactions.</p>
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

                <!-- Filters Area -->
                <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/40">
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-5">
                        <div class="lg:col-span-2">
                            <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Identify Order</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <i class="fas fa-search"></i>
                                </span>
                                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Order ID, Name, Mobile..."
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50 pl-11 pr-4 py-3.5 text-sm font-bold text-slate-700 focus:bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition" />
                            </div>
                        </div>

                        <div>
                            <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Payment Status</label>
                            <select wire:model.live="paymentStatus"
                                class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3.5 text-sm font-bold text-slate-700 focus:bg-white outline-none transition appearance-none cursor-pointer">
                                <option value="">All Statuses</option>
                                <option value="pending">⏳ Pending</option>
                                <option value="verified">✅ Verified</option>
                                <option value="rejected">❌ Rejected</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-[10px] font-black uppercase tracking-widest text-slate-400">Order Stage</label>
                            <select wire:model.live="orderStatus"
                                class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3.5 text-sm font-bold text-slate-700 focus:bg-white outline-none transition appearance-none cursor-pointer">
                                <option value="">Everything</option>
                                <option value="new">🆕 New</option>
                                <option value="processing">⚙️ Processing</option>
                                <option value="shipped">🚚 Shipped</option>
                                <option value="delivered">🏁 Delivered</option>
                                <option value="cancelled">🚫 Cancelled</option>
                            </select>
                        </div>

                        <div class="flex items-end">
                            <button type="button" wire:click="$refresh" class="w-full rounded-2xl bg-slate-100 py-3.5 text-xs font-black uppercase tracking-widest text-slate-600 hover:bg-slate-200 transition">
                                <i class="fas fa-sync-alt mr-2"></i> Sync
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Orders Table -->
                <div class="rounded-[2.5rem] border border-slate-200 bg-white p-6 lg:p-10 shadow-2xl shadow-slate-200/50">
                    <div class="overflow-hidden rounded-3xl border border-slate-100 shadow-sm">
                        <table class="min-w-full divide-y divide-slate-100 text-sm">
                            <thead class="bg-slate-50/80 backdrop-blur-sm">
                                <tr>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Order Identity</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Consumer</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Financials</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Tracking</th>
                                    <th class="px-6 py-5 text-right text-[11px] font-black uppercase tracking-widest text-slate-500">Management</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($orders as $order)
                                    <tr class="group hover:bg-slate-50/50 transition-all">
                                        <td class="px-6 py-6">
                                            <div class="flex flex-col">
                                                <span class="font-black text-slate-900 tracking-tight text-base group-hover:text-indigo-600 transition-colors">#{{ $order->order_number }}</span>
                                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Ordered {{ $order->ordered_at?->format('d M, h:i A') ?? '-' }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6">
                                            <div class="flex items-center gap-3">
                                                <div class="h-10 w-10 rounded-xl bg-slate-100 flex items-center justify-center text-slate-400 text-xs font-black">
                                                    {{ substr($order->customer_name, 0, 2) }}
                                                </div>
                                                <div class="flex flex-col">
                                                    <span class="font-bold text-slate-800">{{ $order->customer_name }}</span>
                                                    <span class="text-[10px] font-bold text-slate-400">{{ $order->customer_mobile ?: 'No Mobile' }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6">
                                            <div class="flex flex-col">
                                                <span class="text-base font-black text-indigo-600">Rs {{ number_format((float) $order->total_amount, 2) }}</span>
                                                <span class="inline-flex mt-1 items-center px-2 py-0.5 rounded-md text-[9px] font-black uppercase tracking-tighter {{ $order->payment_status === 'verified' ? 'bg-emerald-50 text-emerald-600' : ($order->payment_status === 'rejected' ? 'bg-rose-50 text-rose-600' : 'bg-amber-50 text-amber-600') }}">
                                                    {{ $order->payment_status }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6">
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest {{ $order->order_status === 'delivered' ? 'bg-emerald-50 text-emerald-600' : ($order->order_status === 'cancelled' ? 'bg-rose-50 text-rose-600' : 'bg-indigo-50 text-indigo-600') }}">
                                                <span class="w-1.5 h-1.5 rounded-full {{ $order->order_status === 'delivered' ? 'bg-emerald-500' : ($order->order_status === 'cancelled' ? 'bg-rose-500' : 'bg-indigo-500 animate-pulse') }}"></span>
                                                {{ $order->order_status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-6 text-right">
                                            <div class="flex flex-col items-end gap-2">
                                                <div class="relative group/select">
                                                    <select wire:change="changePaymentStatus({{ $order->id }}, $event.target.value)"
                                                        class="w-40 rounded-xl border-slate-200 bg-white px-3 py-2 text-[10px] font-black uppercase tracking-widest text-slate-600 shadow-sm focus:border-indigo-400 focus:ring-4 focus:ring-indigo-50 transition cursor-pointer outline-none appearance-none">
                                                        <option value="pending" @selected($order->payment_status === 'pending')>Pay: Pending</option>
                                                        <option value="verified" @selected($order->payment_status === 'verified')>Pay: Verified</option>
                                                        <option value="rejected" @selected($order->payment_status === 'rejected')>Pay: Rejected</option>
                                                    </select>
                                                </div>

                                                <div class="relative group/select">
                                                    <select wire:change="changeOrderStatus({{ $order->id }}, $event.target.value)"
                                                        class="w-40 rounded-xl border-slate-200 bg-white px-3 py-2 text-[10px] font-black uppercase tracking-widest text-slate-600 shadow-sm focus:border-emerald-400 focus:ring-4 focus:ring-emerald-50 transition cursor-pointer outline-none appearance-none">
                                                        <option value="new" @selected($order->order_status === 'new')>Status: New</option>
                                                        <option value="processing" @selected($order->order_status === 'processing')>Status: Processing</option>
                                                        <option value="shipped" @selected($order->order_status === 'shipped')>Status: Shipped</option>
                                                        <option value="delivered" @selected($order->order_status === 'delivered')>Status: Delivered</option>
                                                        <option value="cancelled" @selected($order->order_status === 'cancelled')>Status: Cancelled</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-24 text-center">
                                            <div class="flex flex-col items-center gap-4">
                                                <i class="fas fa-file-invoice text-5xl text-slate-100"></i>
                                                <p class="text-slate-400 font-black uppercase tracking-[0.3em] text-xs">No transaction history found</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-10">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-10 text-center">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.4em]">Operations Intelligence • Nexus Core</p>
        </footer>
    </main>
</div>
