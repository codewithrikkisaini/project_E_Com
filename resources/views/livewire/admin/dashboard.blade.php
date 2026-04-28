<div class="admin-shell min-h-screen bg-slate-50 lg:flex">
    <x-admin.sidebar />

    <main class="flex-1">
        <!-- Premium Header -->
        <header class="sticky top-0 z-40 border-b border-slate-200/60 bg-white/80 backdrop-blur-md px-4 py-4 lg:px-10">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight lg:text-3xl">Command <span class="text-indigo-600">Center</span></h1>
                    <div class="flex items-center gap-2 mt-1 text-xs font-bold text-slate-500 uppercase tracking-widest">
                        <span>Admin</span>
                        <i class="fas fa-chevron-right text-[8px]"></i>
                        <span class="text-indigo-500">Dashboard</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="relative hidden xl:block">
                        <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" placeholder="Global search..."
                            class="w-80 rounded-2xl border-none bg-slate-100 py-3 pl-11 pr-4 text-sm text-slate-700 outline-none ring-1 ring-slate-200 transition focus:bg-white focus:ring-2 focus:ring-indigo-500" />
                    </div>
                    
                    <div class="flex items-center gap-2 border-l border-slate-200 pl-4">
                        <a href="{{ url('/') }}" target="_blank" class="rounded-xl bg-indigo-50 px-4 py-2 text-xs font-black text-indigo-600 hover:bg-indigo-100 transition uppercase tracking-widest">
                            Storefront
                        </a>
                        <button type="button" class="relative rounded-xl p-2.5 text-slate-500 transition hover:bg-slate-100 hover:text-indigo-600">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="absolute top-2 right-2 w-2 h-2 bg-rose-500 rounded-full border-2 border-white"></span>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-10">
            @if ($isAboutPage)
                <!-- About Page Redesign -->
                <div class="mx-auto max-w-5xl space-y-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-3xl font-black text-slate-900 tracking-tight">About <span class="text-indigo-600">Narrative</span></h2>
                            <p class="mt-2 text-slate-500 font-medium">Craft the story of Nick's & Morris for your visitors.</p>
                        </div>
                    </div>

                    @if ($statusMessage || session('status'))
                        <div class="rounded-2xl border border-emerald-100 bg-emerald-50/50 p-4 flex items-center gap-3 text-sm font-bold text-emerald-700">
                            <i class="fas fa-check-circle text-emerald-500 text-lg"></i>
                            {{ $statusMessage ?? session('status') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/40">
                            <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-6 flex items-center gap-2">
                                <span class="w-2 h-2 bg-indigo-500 rounded-full"></span> Highlight One
                            </h4>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Metric Value</label>
                                    <input type="text" wire:model="aboutStat1Value" class="w-full rounded-2xl border-slate-200 bg-slate-50 py-4 px-5 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white transition">
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Display Label</label>
                                    <input type="text" wire:model="aboutStat1Label" class="w-full rounded-2xl border-slate-200 bg-slate-50 py-4 px-5 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white transition">
                                </div>
                            </div>
                        </div>
                        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/40">
                            <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-6 flex items-center gap-2">
                                <span class="w-2 h-2 bg-emerald-500 rounded-full"></span> Highlight Two
                            </h4>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Metric Value</label>
                                    <input type="text" wire:model="aboutStat2Value" class="w-full rounded-2xl border-slate-200 bg-slate-50 py-4 px-5 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white transition">
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Display Label</label>
                                    <input type="text" wire:model="aboutStat2Label" class="w-full rounded-2xl border-slate-200 bg-slate-50 py-4 px-5 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white transition">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[2.5rem] border border-slate-200 bg-white p-8 shadow-2xl shadow-slate-200/50">
                        <label class="block text-xs font-black uppercase tracking-[0.3em] text-slate-400 mb-6">Main Content Editor</label>

                        <div class="bg-slate-50 rounded-3xl border border-slate-200 overflow-hidden ring-offset-4 focus-within:ring-2 focus-within:ring-indigo-500 transition-all" wire:ignore>
                            <div id="quill-toolbar" class="border-b border-slate-200 bg-white p-3">
                                <span class="ql-formats">
                                    <select class="ql-header"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered"></button>
                                    <button class="ql-list" value="bullet"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-link"></button>
                                    <button class="ql-image"></button>
                                </span>
                            </div>
                            <div id="about-quill-editor" class="min-h-[500px] text-slate-700 text-lg p-8 leading-relaxed">
                            </div>
                        </div>
                        <input type="hidden" id="aboutContentInput" wire:model="aboutContent">

                        <div class="mt-8">
                            <button type="button" wire:click="saveAboutContent"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-3 rounded-2xl bg-indigo-600 px-10 py-5 text-sm font-black uppercase tracking-[0.2em] text-white transition hover:bg-indigo-700 shadow-xl shadow-indigo-200 active:scale-95">
                                <i class="fas fa-save"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </div>

                <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
                <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                <script>
                    document.addEventListener('livewire:init', () => {
                        const quill = new Quill('#about-quill-editor', {
                            modules: { toolbar: '#quill-toolbar' },
                            theme: 'snow',
                            placeholder: 'Begin your story here...'
                        });
                        quill.root.innerHTML = @js($aboutContent);
                        quill.on('text-change', function() {
                            let content = quill.root.innerHTML;
                            if (content === '<p><br></p>') content = '';
                            @this.set('aboutContent', content);
                        });
                    });
                </script>
            @elseif($pageTitle === 'Dashboard')
                @php $stats = $this->getStats(); @endphp
                <div class="mx-auto max-w-7xl space-y-10">
                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="group relative rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/40 hover:border-indigo-400 transition-all duration-300">
                            <div class="flex items-center justify-between mb-6">
                                <div class="h-14 w-14 rounded-2xl bg-indigo-50 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">📦</div>
                                <span class="text-xs font-black text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg">+12%</span>
                            </div>
                            <p class="text-xs font-black uppercase tracking-widest text-slate-400">Total Products</p>
                            <h3 class="text-4xl font-black text-slate-900 mt-2 tracking-tighter">{{ $stats['products'] ?? 0 }}</h3>
                            <div class="mt-6 h-1 w-full bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-indigo-500 w-2/3"></div>
                            </div>
                        </div>

                        <div class="group relative rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/40 hover:border-emerald-400 transition-all duration-300">
                            <div class="flex items-center justify-between mb-6">
                                <div class="h-14 w-14 rounded-2xl bg-emerald-50 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">📑</div>
                                <span class="text-xs font-black text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg">LIVE</span>
                            </div>
                            <p class="text-xs font-black uppercase tracking-widest text-slate-400">Active Orders</p>
                            <h3 class="text-4xl font-black text-slate-900 mt-2 tracking-tighter">{{ $stats['orders'] ?? 0 }}</h3>
                            <div class="mt-6 h-1 w-full bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-emerald-500 w-1/2"></div>
                            </div>
                        </div>

                        <div class="group relative rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/40 hover:border-violet-400 transition-all duration-300">
                            <div class="flex items-center justify-between mb-6">
                                <div class="h-14 w-14 rounded-2xl bg-violet-50 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">👤</div>
                                <span class="text-xs font-black text-violet-500 bg-violet-50 px-2 py-1 rounded-lg">+4 New</span>
                            </div>
                            <p class="text-xs font-black uppercase tracking-widest text-slate-400">Total Customers</p>
                            <h3 class="text-4xl font-black text-slate-900 mt-2 tracking-tighter">{{ $stats['users'] ?? 0 }}</h3>
                            <div class="mt-6 h-1 w-full bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-violet-500 w-3/4"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Welcome Area -->
                    <div class="relative rounded-[2.5rem] bg-[#020617] p-10 overflow-hidden shadow-2xl">
                        <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-600/20 rounded-full blur-[100px] -mr-32 -mt-32"></div>
                        <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-10">
                            <div class="max-w-lg text-center lg:text-left">
                                <h2 class="text-4xl font-black text-white tracking-tighter leading-tight">Welcome to the <br><span class="text-indigo-500">Premium Management</span> Suite</h2>
                                <p class="mt-4 text-slate-400 font-medium">You have total control over Nick's & Morris operations. Start by managing your inventory or checking recent orders.</p>
                                <div class="mt-8 flex flex-wrap gap-4 justify-center lg:justify-start">
                                    <a href="{{ url('/admin/products') }}" class="rounded-2xl bg-indigo-600 px-8 py-4 text-sm font-black text-white shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 transition uppercase tracking-widest">Add Product</a>
                                    <a href="{{ url('/admin/orders') }}" class="rounded-2xl bg-slate-800 px-8 py-4 text-sm font-black text-slate-300 border border-slate-700 hover:bg-slate-700 transition uppercase tracking-widest">View Orders</a>
                                </div>
                            </div>
                            <div class="hidden lg:block relative group">
                                <div class="absolute -inset-4 bg-indigo-500/10 rounded-full blur-2xl group-hover:bg-indigo-500/20 transition duration-1000"></div>
                                <div class="relative h-64 w-64 rounded-[3rem] bg-gradient-to-br from-indigo-500 to-violet-600 flex items-center justify-center text-7xl shadow-2xl border border-white/10 group-hover:rotate-6 transition-transform duration-500">
                                    🚀
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="mx-auto max-w-4xl py-20 text-center">
                    <div class="h-24 w-24 rounded-[2rem] bg-indigo-50 text-indigo-600 flex items-center justify-center text-4xl mx-auto mb-6">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h2 class="text-3xl font-black text-slate-900 tracking-tight">{{ $pageTitle }}</h2>
                    <p class="mt-4 text-slate-500 font-medium max-w-md mx-auto">This module is currently active. Use the sidebar to navigate or start adding content to this section.</p>
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