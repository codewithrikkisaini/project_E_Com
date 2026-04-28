<div class="admin-shell min-h-screen bg-slate-100 lg:flex">
    {{-- Sidebar --}}
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

            {{-- Dashboard --}}
            <a href="{{ url('/admin/dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/dashboard*') }}">
                <span>🏠</span>
                <span class="font-semibold">Dashboard</span>
            </a>

            {{-- Products --}}
            <a href="{{ url('/admin/products') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/products*') }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5v4M15 5v4" />
                </svg>
                <span>Products</span>
            </a>

            {{-- Banner --}}
            <a href="{{ url('/admin/banner') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/banner*') }}">
                <span>🖼</span>
                <span>Banner</span>
            </a>


            {{-- About --}}
            <a href="{{ url('/admin/about') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/about*') }}">
                <span>ℹ</span>
                <span>About</span>
            </a>

            {{-- Testimonials --}}
            <a href="{{ url('/admin/testimonials') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/testimonials*') }}">
                <span>💬</span>
                <span>Testimonials</span>
            </a>

            {{-- Orders --}}
            <a href="{{ url('/admin/orders') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/orders*') }}">
                <span>📑</span>
                <span>Orders</span>
            </a>

            {{-- Users --}}
            <a href="{{ url('/admin/users') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/users*') }}">
                <span>👤</span>
                <span>Users</span>
            </a>

            {{-- QR Payment --}}
            <a href="{{ url('/admin/payment-settings') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/payment-settings*') }}">
                <span>💳</span>
                <span>QR Payment</span>
            </a>

            {{-- Settings --}}
            <a href="{{ url('/admin/settings') }}"
                class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/settings*') }}">
                <span>⚙</span>
                <span>Settings</span>
            </a>

            {{-- BLOG DROPDOWN --}}
            <div x-data="{ open: {{ request()->is('admin/blog*') ? 'true' : 'false' }} }">

                <button @click="open = !open"
                    class="flex items-center justify-between w-full px-4 py-3 transition text-gray-700 hover:bg-gray-100">

                    <div class="flex items-center gap-3">
                        <span>📝</span>
                        <span>Blog</span>
                    </div>

                    <span :class="open && 'rotate-180'">⌄</span>
                </button>

                <div x-show="open" class="pl-8 mt-2 space-y-2">

                    <a href="{{ url('/admin/blog-categories') }}"
                        class="block rounded-lg px-4 py-2 text-sm {{ $active('admin/blog-categories*') }}">
                        Categories
                    </a>

                    <a href="{{ url('/admin/blogs') }}"
                        class="block rounded-lg px-4 py-2 text-sm {{ $active('admin/blogs*') }}">
                        Blogs
                    </a>

                </div>
            </div>

            {{-- ENQUIRIES --}}
            <div class="pt-4 border-t">
                <p class="px-4 text-sm font-semibold text-indigo-600">Enquiries</p>
            </div>

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

            {{-- LOGOUT --}}
            <div class="pt-4 border-t">
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:text-red-600 hover:bg-red-50 transition">
                    <span>🚪</span>
                    <span>Logout</span>
                </a>
            </div>

        </nav>
    </aside>

    <main class="flex-1">
        <header class="border-b border-slate-200 bg-white px-4 py-3 lg:px-8">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <h1 class="text-3xl font-semibold text-slate-900 lg:text-[42px] lg:leading-none">{{ $pageTitle }}</h1>

                <div class="flex items-center gap-3">
                    <a href="{{ url('/') }}" target="_blank"
                        class="rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200 transition">
                        🌍 View Frontend
                    </a>
                    <div class="relative hidden sm:block">
                        <span
                            class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-xl text-slate-400">⌕</span>
                        <input type="text" placeholder="Search..."
                            class="w-72 rounded-2xl border border-slate-200 bg-slate-100 py-2.5 pl-11 pr-4 text-sm text-slate-700 outline-none transition focus:border-cyan-400 focus:bg-white focus:ring-2 focus:ring-cyan-100" />
                    </div>
                    <button type="button"
                        class="rounded-full p-2 text-slate-500 transition hover:bg-slate-100 hover:text-slate-700">🔔</button>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-sky-600 text-sm font-semibold text-white">
                        AU</div>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-8">
            @if ($isAboutPage)
                <div class="admin-card space-y-5 p-6">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900">About Page</h2>
                        <p class="mt-1 text-sm text-slate-600">Manage the About page content shown on the website.</p>
                    </div>

                    @if ($statusMessage || session('status'))
                        <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm text-emerald-700">
                            {{ $statusMessage ?? session('status') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                        <div class="space-y-4">
                            <h4 class="text-xs font-black uppercase tracking-widest text-slate-400">Statistic 1</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Value</label>
                                    <input type="text" wire:model="aboutStat1Value" class="w-full rounded-xl border-slate-200 bg-slate-50 py-2.5 px-4 text-sm focus:ring-green-500 focus:border-green-500 transition">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Label</label>
                                    <input type="text" wire:model="aboutStat1Label" class="w-full rounded-xl border-slate-200 bg-slate-50 py-2.5 px-4 text-sm focus:ring-green-500 focus:border-green-500 transition">
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <h4 class="text-xs font-black uppercase tracking-widest text-slate-400">Statistic 2</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Value</label>
                                    <input type="text" wire:model="aboutStat2Value" class="w-full rounded-xl border-slate-200 bg-slate-50 py-2.5 px-4 text-sm focus:ring-green-500 focus:border-green-500 transition">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Label</label>
                                    <input type="text" wire:model="aboutStat2Label" class="w-full rounded-xl border-slate-200 bg-slate-50 py-2.5 px-4 text-sm focus:ring-green-500 focus:border-green-500 transition">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label class="text-sm font-extrabold uppercase tracking-widest text-slate-500">Edit About Page Content</label>

                        <!-- Quill Editor Container -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden" wire:ignore>
                            <div id="quill-toolbar" class="border-b border-slate-100 bg-slate-50/50 p-2">
                                <span class="ql-formats">
                                    <select class="ql-header">
                                        <option value="1">Heading 1</option>
                                        <option value="2">Heading 2</option>
                                        <option value="3">Heading 3</option>
                                        <option selected>Normal</option>
                                    </select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                    <button class="ql-strike"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered"></button>
                                    <button class="ql-list" value="bullet"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-link"></button>
                                    <button class="ql-image"></button>
                                    <button class="ql-clean"></button>
                                </span>
                            </div>
                            <div id="about-quill-editor" class="min-h-[400px] text-slate-800 text-lg p-6">
                            </div>
                        </div>

                        <input type="hidden" id="aboutContentInput" wire:model="aboutContent">
                    </div>

                    <div class="pt-4">
                        <button type="button" wire:click="saveAboutContent"
                            class="inline-flex items-center gap-2 rounded-xl bg-[#1e4620] px-6 py-3 text-sm font-black uppercase tracking-widest text-white transition hover:bg-green-900 shadow-lg shadow-green-900/20">
                            <i class="fas fa-save"></i> Save About Page Content
                        </button>
                    </div>
                </div>

                <!-- Quill CSS -->
                <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
                <!-- Quill JS -->
                <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

                <script>
                    document.addEventListener('livewire:init', () => {
                        const quill = new Quill('#about-quill-editor', {
                            modules: {
                                toolbar: '#quill-toolbar'
                            },
                            theme: 'snow',
                            placeholder: 'Write your story here...'
                        });

                        // Set initial content
                        quill.root.innerHTML = @js($aboutContent);

                        // Sync content to Livewire
                        quill.on('text-change', function() {
                            let content = quill.root.innerHTML;
                            if (content === '<p><br></p>') content = '';
                            @this.set('aboutContent', content);
                        });
                    });
                </script>
                </div>
            @elseif($pageTitle === 'Dashboard')
                @php $stats = $this->getStats(); @endphp
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Total Products</p>
                            <h3 class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['products'] ?? 0 }}</h3>
                        </div>
                        <div class="h-12 w-12 rounded-full bg-blue-50 flex items-center justify-center text-2xl">📦</div>
                    </div>
                    <div
                        class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Total Orders</p>
                            <h3 class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['orders'] ?? 0 }}</h3>
                        </div>
                        <div class="h-12 w-12 rounded-full bg-emerald-50 flex items-center justify-center text-2xl">📑</div>
                    </div>
                    <div
                        class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Customers</p>
                            <h3 class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['users'] ?? 0 }}</h3>
                        </div>
                        <div class="h-12 w-12 rounded-full bg-purple-50 flex items-center justify-center text-2xl">👤</div>
                    </div>
                </div>
            @else
                <div class="admin-card p-6 text-slate-600">
                    Section <span class="font-semibold text-slate-900">{{ $pageTitle }}</span> ke liye content yahan
                    add kar sakte hain.
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
            if (clearButton) {
                clearButton.addEventListener('click', () => {
                    editor.innerHTML = '';
                    syncValue();
                });
            }

            Livewire.hook('morph.updated', () => {
                if (editor.innerHTML !== (hiddenInput.value || '')) {
                    editor.innerHTML = hiddenInput.value || '';
                }
            });
        });
    </script>
@endif