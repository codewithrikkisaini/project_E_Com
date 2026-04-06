<div class="admin-shell min-h-screen bg-slate-100 lg:flex">
    <aside class="w-full border-r border-slate-200 bg-white lg:sticky lg:top-0 lg:h-screen lg:w-72">
        <div class="border-b border-slate-100 px-6 py-5">
            <h2 class="text-xl font-bold text-slate-800">NM</h2>
            <h1 class="text-sm font-medium text-slate-600">Dashboard</h1>
            <p class="text-xs text-gray-400">Nick's & Morris</p>
        </div>

        @php
            $active = fn($path) => request()->is($path) ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100';
        @endphp

        <nav class="flex-1 space-y-2 overflow-y-auto px-4 py-6">
            <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/dashboard*') }}">
                <span>🏠</span>
                <span class="font-semibold">Dashboard</span>
            </a>
            <a href="{{ url('/admin/products') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/products*') }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5v4M15 5v4" />
                </svg>
                <span>Products</span>
            </a>
            <a href="{{ url('/admin/banner') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/banner*') }}"><span>🖼</span><span>Banner</span></a>
            <a href="{{ url('/admin/services') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/services*') }}"><span>🧰</span><span>Services</span></a>
            <a href="{{ url('/admin/about') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/about*') }}"><span>ℹ</span><span>About</span></a>
            <a href="{{ url('/admin/testimonials') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/testimonials*') }}"><span>💬</span><span>Testimonials</span></a>
            <a href="{{ url('/admin/orders') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/orders*') }}"><span>📑</span><span>Orders</span></a>
            <a href="{{ url('/admin/users') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/users*') }}"><span>👤</span><span>Users</span></a>
            <a href="{{ url('/admin/payment-settings') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/payment-settings*') }}"><span>💳</span><span>QR Payment</span></a>
            <a href="{{ url('/admin/settings') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/settings*') }}"><span>⚙</span><span>Settings</span></a>
            <a href="{{ url('/admin/blogs') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/blogs*') }}"><span>📝</span><span>Blogs</span></a>
            <a href="{{ url('/admin/enquiries?type=general') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ request()->fullUrlIs('*type=general*') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100' }}">
                <span>📩</span>
                <span>General Enquiry</span>
            </a>
            <a href="{{ url('/admin/enquiries?type=product') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ request()->fullUrlIs('*type=product*') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100' }}">
                <span>📦</span>
                <span>Product Enquiry</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 transition hover:bg-red-50 hover:text-red-600">
                <span>🚪</span><span>Logout</span>
            </a>
        </nav>
    </aside>

    <main class="flex-1">
        <header class="border-b border-slate-200 bg-white px-4 py-3 lg:px-8">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <h1 class="text-3xl font-semibold text-slate-900 lg:text-[42px] lg:leading-none">Orders</h1>
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
                <div>
                    <h2 class="text-2xl font-bold text-slate-900">Orders</h2>
                    <p class="text-sm text-slate-500">Manage payment verification, order status, and delivery flow.</p>
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
                    <div class="grid gap-3 lg:grid-cols-5">
                        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search by order/mobile/name"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />

                        <select wire:model.live="paymentStatus"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white">
                            <option value="">All payment status</option>
                            <option value="pending">Pending</option>
                            <option value="verified">Verified</option>
                            <option value="rejected">Rejected</option>
                        </select>

                        <select wire:model.live="orderStatus"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white">
                            <option value="">All order status</option>
                            <option value="new">New</option>
                            <option value="processing">Processing</option>
                            <option value="shipped">Shipped</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>

                        <input type="date" wire:model.live="fromDate"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                        <input type="date" wire:model.live="toDate"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:bg-white" />
                    </div>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <table class="min-w-full divide-y divide-slate-200 text-sm">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-5 py-4 text-left font-semibold text-slate-700">Order</th>
                                <th class="px-5 py-4 text-left font-semibold text-slate-700">Customer</th>
                                <th class="px-5 py-4 text-left font-semibold text-slate-700">Product</th>
                                <th class="px-5 py-4 text-left font-semibold text-slate-700">Payment</th>
                                <th class="px-5 py-4 text-left font-semibold text-slate-700">Status</th>
                                <th class="px-5 py-4 text-left font-semibold text-slate-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($orders as $order)
                                <tr>
                                    <td class="px-5 py-4 align-top">
                                        <p class="font-semibold text-slate-900">{{ $order->order_number }}</p>
                                        <p class="text-xs text-slate-500">{{ $order->ordered_at?->format('d M Y, h:i A') ?? '-' }}</p>
                                    </td>
                                    <td class="px-5 py-4 align-top">
                                        <p class="font-medium text-slate-800">{{ $order->customer_name }}</p>
                                        <p class="text-xs text-slate-500">{{ $order->customer_mobile ?: '-' }}</p>
                                    </td>
                                    <td class="px-5 py-4 align-top">
                                        <p class="font-medium text-slate-800">{{ $order->product_name }}</p>
                                        <p class="text-xs text-slate-500">Rs {{ number_format((float) $order->total_amount, 2) }}</p>
                                    </td>
                                    <td class="px-5 py-4 align-top">
                                        <span class="rounded-full px-2 py-1 text-xs font-semibold {{ $order->payment_status === 'verified' ? 'bg-emerald-100 text-emerald-700' : ($order->payment_status === 'rejected' ? 'bg-rose-100 text-rose-700' : 'bg-amber-100 text-amber-700') }}">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                        @if ($order->payment_verified_at)
                                            <p class="mt-1 text-xs text-slate-500">Verified {{ $order->payment_verified_at->format('d M Y') }}</p>
                                        @endif
                                    </td>
                                    <td class="px-5 py-4 align-top">
                                        <span class="rounded-full px-2 py-1 text-xs font-semibold {{ $order->order_status === 'delivered' ? 'bg-emerald-100 text-emerald-700' : ($order->order_status === 'cancelled' ? 'bg-rose-100 text-rose-700' : 'bg-blue-100 text-blue-700') }}">
                                            {{ ucfirst($order->order_status) }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 align-top">
                                        <div class="space-y-2">
                                            <select wire:change="changePaymentStatus({{ $order->id }}, $event.target.value)"
                                                class="w-44 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs outline-none focus:border-blue-400">
                                                <option value="pending" @selected($order->payment_status === 'pending')>Pending</option>
                                                <option value="verified" @selected($order->payment_status === 'verified')>Verified</option>
                                                <option value="rejected" @selected($order->payment_status === 'rejected')>Rejected</option>
                                            </select>

                                            <select wire:change="changeOrderStatus({{ $order->id }}, $event.target.value)"
                                                class="w-44 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs outline-none focus:border-blue-400">
                                                <option value="new" @selected($order->order_status === 'new')>New</option>
                                                <option value="processing" @selected($order->order_status === 'processing')>Processing</option>
                                                <option value="shipped" @selected($order->order_status === 'shipped')>Shipped</option>
                                                <option value="delivered" @selected($order->order_status === 'delivered')>Delivered</option>
                                                <option value="cancelled" @selected($order->order_status === 'cancelled')>Cancelled</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-5 py-10 text-center text-slate-500">No orders found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="border-t border-slate-200 px-5 py-4">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
