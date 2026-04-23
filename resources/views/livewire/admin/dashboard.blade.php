<div class="admin-shell min-h-screen bg-slate-100 lg:flex">
    @include('livewire.admin.partials.sidebar')

    <main class="flex-1">
        <header class="border-b border-slate-200 bg-white px-4 py-4 lg:px-8">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <h1 class="text-4xl font-bold text-slate-900">{{ $pageTitle }}</h1>
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-slate-400">⌕</span>
                        <input type="text" placeholder="Search..." class="w-72 rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-10 pr-4 text-sm text-slate-700 outline-none focus:border-sky-400 focus:bg-white">
                    </div>
                    <button type="button" class="rounded-full p-2 text-slate-500 transition hover:bg-slate-100">🔔</button>
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-sky-600 text-xs font-semibold text-white">AU</div>
                </div>
            </div>
        </header>

        <section class="space-y-6 p-4 lg:p-8">
            @if ($isAboutPage)
                <div class="mx-auto max-w-6xl rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900">About Page Content</h2>
                        <p class="mt-1 text-sm text-slate-500">Website ke About section ka content yahan se update karein.</p>
                    </div>

                    @if ($statusMessage || session('status'))
                        <div class="mt-4 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm text-emerald-700">
                            {{ $statusMessage ?? session('status') }}
                        </div>
                    @endif

                    <div class="mt-5 space-y-3">
                        <label class="text-sm font-semibold text-slate-700">About Content</label>

                        <div class="rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
                            <div class="mb-3 flex flex-wrap items-center gap-2 border-b border-slate-100 pb-3">
                                <button type="button" class="about-tool rounded-md border border-slate-200 px-3 py-1 text-sm font-bold hover:bg-slate-100" data-command="bold">B</button>
                                <button type="button" class="about-tool rounded-md border border-slate-200 px-3 py-1 text-sm italic hover:bg-slate-100" data-command="italic">I</button>
                                <button type="button" class="about-tool rounded-md border border-slate-200 px-3 py-1 text-sm underline hover:bg-slate-100" data-command="underline">U</button>
                                <button type="button" class="about-tool rounded-md border border-slate-200 px-3 py-1 text-sm hover:bg-slate-100" data-command="insertUnorderedList">• List</button>
                                <button type="button" class="about-tool rounded-md border border-slate-200 px-3 py-1 text-sm hover:bg-slate-100" data-command="insertOrderedList">1. List</button>
                                <button type="button" class="about-tool rounded-md border border-slate-200 px-3 py-1 text-sm hover:bg-slate-100" data-block="h2">H2</button>
                                <button type="button" class="about-tool rounded-md border border-slate-200 px-3 py-1 text-sm hover:bg-slate-100" data-block="h3">H3</button>
                                <button type="button" class="about-tool rounded-md border border-slate-200 px-3 py-1 text-sm hover:bg-slate-100" data-link="1">Link</button>
                                <button type="button" class="about-clear rounded-md border border-rose-200 px-3 py-1 text-sm text-rose-700 hover:bg-rose-50">Clear</button>
                            </div>

                            <div id="aboutEditor" contenteditable="true" class="min-h-[420px] w-full rounded-lg border border-slate-200 bg-white p-4 text-slate-900 outline-none focus:border-sky-300 focus:ring-2 focus:ring-sky-100"></div>
                            <textarea id="aboutContentInput" wire:model.defer="aboutContent" class="hidden"></textarea>
                        </div>
                    </div>

                    <button type="button" wire:click="saveAboutContent" class="mt-5 rounded-xl bg-sky-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-sky-700">
                        Save About Content
                    </button>
                </div>
            @elseif (request()->is('admin/dashboard'))
                <div class="rounded-3xl bg-gradient-to-r from-[#0e2257] to-[#3b3fa6] p-6 text-white shadow-lg lg:p-8">
                    <div class="grid gap-5 lg:grid-cols-[1.7fr_1fr]">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-blue-100">Admin Command Center</p>
                            <h2 class="mt-2 text-5xl font-bold leading-tight">Dynamic business overview for your store</h2>
                            <p class="mt-4 max-w-2xl text-sm text-blue-100">Track live orders, payment verification, enquiry mix, top-selling products, and low-stock risk from one screen.</p>
                            <div class="mt-6 flex flex-wrap gap-2 text-xs">
                                <span class="rounded-full bg-white/15 px-3 py-1.5">Published blogs: 0</span>
                                <span class="rounded-full bg-white/15 px-3 py-1.5">Products: 0</span>
                                <span class="rounded-full bg-white/15 px-3 py-1.5">Average order value: ₹0.00</span>
                                <span class="rounded-full bg-white/15 px-3 py-1.5">Last refresh: 01 Apr 2026, 07:11 AM</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div class="rounded-2xl bg-white/10 p-4">
                                <p class="text-xs uppercase tracking-wide text-blue-100">Revenue</p>
                                <p class="mt-2 text-4xl font-bold">₹0.00</p>
                                <p class="mt-1 text-xs text-blue-100">Verified collections</p>
                            </div>
                            <div class="rounded-2xl bg-white/10 p-4">
                                <p class="text-xs uppercase tracking-wide text-blue-100">This Month</p>
                                <p class="mt-2 text-4xl font-bold">₹0.00</p>
                                <p class="mt-1 text-xs text-blue-100">Current month revenue</p>
                            </div>
                            <div class="rounded-2xl bg-white/10 p-4">
                                <p class="text-xs uppercase tracking-wide text-blue-100">Orders Today</p>
                                <p class="mt-2 text-4xl font-bold">0</p>
                                <p class="mt-1 text-xs text-blue-100">Placed today</p>
                            </div>
                            <div class="rounded-2xl bg-white/10 p-4">
                                <p class="text-xs uppercase tracking-wide text-blue-100">Approval Rate</p>
                                <p class="mt-2 text-4xl font-bold">0.0%</p>
                                <p class="mt-1 text-xs text-blue-100">Verified vs total orders</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-sm text-slate-500">Total Orders</p>
                        <p class="mt-2 text-5xl font-bold text-slate-900">0</p>
                        <p class="mt-2 text-sm text-slate-500">Across all customer checkouts and payment states.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-sm text-slate-500">Pending Payments</p>
                        <p class="mt-2 text-5xl font-bold text-slate-900">0</p>
                        <p class="mt-2 text-sm text-slate-500">Need admin review before order confirmation.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-sm text-slate-500">Total Enquiries</p>
                        <p class="mt-2 text-5xl font-bold text-slate-900">0</p>
                        <p class="mt-2 text-sm text-slate-500">Includes general, support, and franchise interest.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-sm text-slate-500">Low Stock Alerts</p>
                        <p class="mt-2 text-5xl font-bold text-slate-900">0</p>
                        <p class="mt-2 text-sm text-slate-500">Products with stock at or below 5 units.</p>
                    </div>
                </div>

                <div class="grid gap-4 xl:grid-cols-[1.7fr_1fr]">
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <h3 class="text-3xl font-semibold text-slate-900">7-day order trend</h3>
                        <p class="mt-1 text-sm text-slate-500">Live order volume across the last seven days.</p>
                        <div class="mt-5 grid h-64 grid-cols-7 items-end gap-4">
                            @foreach (['Thu', 'Fri', 'Sat', 'Sun', 'Mon', 'Tue', 'Wed'] as $day)
                                <div class="space-y-2 text-center">
                                    <div class="mx-auto h-44 w-full rounded-2xl bg-slate-100"></div>
                                    <p class="text-xs font-semibold text-slate-700">{{ $day }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="space-y-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <h3 class="text-3xl font-semibold text-slate-900">Payment status mix</h3>
                        <p class="text-sm text-slate-500">Distribution of verification statuses.</p>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between text-sm"><span>Verified</span><span>0 (0%)</span></div>
                            <div class="h-2 rounded-full bg-slate-100"></div>
                            <div class="flex items-center justify-between text-sm"><span>Rejected</span><span>0 (0%)</span></div>
                            <div class="h-2 rounded-full bg-slate-100"></div>
                        </div>
                        <div class="rounded-xl bg-slate-50 p-4">
                            <p class="text-sm font-semibold text-slate-800">Verified orders</p>
                            <p class="mt-2 text-5xl font-bold text-slate-900">0</p>
                            <p class="mt-2 text-sm text-slate-500">Approved payments ready for fulfillment and delivery updates.</p>
                        </div>
                    </div>
                </div>

                <div class="grid gap-4 xl:grid-cols-[1fr_1.4fr]">
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <h3 class="text-3xl font-semibold text-slate-900">Enquiry channel mix</h3>
                        <p class="mt-1 text-sm text-slate-500">Which enquiry types are driving inbound interest.</p>
                        <div class="mt-5 space-y-4 text-sm">
                            <div class="space-y-2">
                                <div class="flex justify-between"><span>General</span><span>0 (0%)</span></div>
                                <div class="h-2 rounded-full bg-slate-100"></div>
                            </div>
                            <div class="space-y-2">
                                <div class="flex justify-between"><span>Support</span><span>0 (0%)</span></div>
                                <div class="h-2 rounded-full bg-slate-100"></div>
                            </div>
                            <div class="space-y-2">
                                <div class="flex justify-between"><span>Franchise</span><span>0 (0%)</span></div>
                                <div class="h-2 rounded-full bg-slate-100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <h3 class="text-3xl font-semibold text-slate-900">Top selling products</h3>
                        <p class="mt-1 text-sm text-slate-500">Best performers by total quantity sold.</p>
                        <div class="mt-6 rounded-xl border border-dashed border-slate-200 p-8 text-center text-sm text-slate-500">No product performance data yet.</div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <h3 class="text-3xl font-semibold text-slate-900">Recent orders</h3>
                        <p class="mt-1 text-sm text-slate-500">Latest customer checkout activity.</p>
                        <div class="mt-5 overflow-hidden rounded-xl border border-slate-100">
                            <table class="min-w-full divide-y divide-slate-100 text-left text-sm">
                                <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                                    <tr>
                                        <th class="px-4 py-3">Customer</th>
                                        <th class="px-4 py-3">Product</th>
                                        <th class="px-4 py-3">Amount</th>
                                        <th class="px-4 py-3">Payment</th>
                                        <th class="px-4 py-3">Status</th>
                                        <th class="px-4 py-3">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="6" class="px-4 py-5 text-center text-slate-500">No orders found.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <h3 class="text-3xl font-semibold text-slate-900">Recent enquiries</h3>
                        <p class="mt-1 text-sm text-slate-500">Newest leads and support requests.</p>
                        <div class="mt-5 rounded-xl border border-dashed border-slate-200 p-8 text-center text-sm text-slate-500">No enquiries yet.</div>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <h3 class="text-3xl font-semibold text-slate-900">Low stock watchlist</h3>
                        <p class="mt-1 text-sm text-slate-500">Fast moving items that may need restocking.</p>
                        <div class="mt-5 rounded-xl border border-dashed border-slate-200 p-8 text-center text-sm text-slate-500">No low-stock products right now.</div>
                    </div>
                </div>
            @else
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-3xl font-semibold text-slate-900">{{ $pageTitle }}</h2>
                    <p class="mt-2 text-sm text-slate-600">Is section ka detailed content aap yahan se manage kar sakte hain.</p>
                </div>
            @endif
        </section>
    </main>
</div>

@if ($isAboutPage)
    <script>
        document.addEventListener('livewire:init', () => {
            const editor = document.getElementById('aboutEditor');
            const hiddenInput = document.getElementById('aboutContentInput');

            if (!editor || !hiddenInput) {
                return;
            }

            const syncValue = () => {
                hiddenInput.value = editor.innerHTML;
                hiddenInput.dispatchEvent(new Event('input', {
                    bubbles: true
                }));
            };

            editor.innerHTML = hiddenInput.value || '';
            editor.addEventListener('input', syncValue);

            document.querySelectorAll('.about-tool').forEach((button) => {
                button.addEventListener('click', () => {
                    const command = button.dataset.command;
                    const block = button.dataset.block;
                    const addLink = button.dataset.link;

                    editor.focus();

                    if (command) {
                        document.execCommand(command, false, null);
                    } else if (block) {
                        document.execCommand('formatBlock', false, block);
                    } else if (addLink) {
                        const url = window.prompt('Enter URL');
                        if (url) {
                            document.execCommand('createLink', false, url);
                        }
                    }

                    syncValue();
                });
            });

            const clearButton = document.querySelector('.about-clear');
            clearButton?.addEventListener('click', () => {
                editor.innerHTML = '';
                syncValue();
            });

            Livewire.hook('morph.updated', () => {
                if (editor.innerHTML !== (hiddenInput.value || '')) {
                    editor.innerHTML = hiddenInput.value || '';
                }
            });
        });
    </script>
@endif
