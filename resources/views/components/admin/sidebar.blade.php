@php
    $isActive = fn($path) => request()->is($path);
    
    $linkClass = fn($path) => $isActive($path) 
        ? 'bg-gradient-to-r from-indigo-600/20 to-transparent text-indigo-400 border-l-4 border-indigo-500 shadow-[inset_1px_0_0_0_rgba(99,102,241,0.1)]' 
        : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-100';

    $iconClass = fn($path) => $isActive($path) 
        ? 'text-indigo-400' 
        : 'text-slate-500 group-hover:text-slate-300';
@endphp

<aside class="w-full bg-[#020617] lg:sticky lg:top-0 lg:h-screen lg:w-72 flex flex-col border-r border-slate-800/60 z-50 overflow-hidden">
    <!-- Background Decoration -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none opacity-20">
        <div class="absolute -top-24 -left-24 w-64 h-64 bg-indigo-600 rounded-full blur-[100px]"></div>
        <div class="absolute top-1/2 -right-32 w-64 h-64 bg-blue-600 rounded-full blur-[120px]"></div>
    </div>

    <!-- Brand / Logo -->
    <div class="relative px-8 py-10 flex items-center gap-4">
        <div class="relative group">
            <div class="absolute -inset-1 bg-gradient-to-r from-indigo-600 to-cyan-500 rounded-xl blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
            <div class="relative w-12 h-12 bg-slate-900 rounded-xl flex items-center justify-center text-white border border-slate-700/50 shadow-2xl">
                <i class="fas fa-bolt text-xl text-indigo-500"></i>
            </div>
        </div>
        <div>
            <h2 class="text-2xl font-black text-white tracking-tighter uppercase italic">
                NM<span class="text-indigo-500">PRO</span>
            </h2>
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Admin Nexus</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="relative flex-1 overflow-y-auto px-4 py-4 space-y-8 scrollbar-thin scrollbar-thumb-slate-800 scrollbar-track-transparent">
        
        <!-- Section: Core -->
        <div>
            <p class="px-4 text-[11px] font-black text-slate-600 uppercase tracking-[0.3em] mb-4 flex items-center gap-2">
                <span class="w-1 h-1 bg-indigo-500 rounded-full"></span>
                Core Management
            </p>
            <div class="space-y-1">
                <a href="{{ url('/admin/dashboard') }}" class="group flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-300 {{ $linkClass('admin/dashboard*') }}">
                    <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-900/50 border border-slate-800/50 group-hover:border-indigo-500/30 transition-colors">
                        <i class="fas fa-home w-5 text-center text-sm {{ $iconClass('admin/dashboard*') }}"></i>
                    </div>
                    <span class="font-bold text-[13px] tracking-wide">Dashboard</span>
                </a>
                
                <a href="{{ url('/admin/products') }}" class="group flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-300 {{ $linkClass('admin/products*') }}">
                    <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-900/50 border border-slate-800/50 group-hover:border-indigo-500/30 transition-colors">
                        <i class="fas fa-box w-5 text-center text-sm {{ $iconClass('admin/products*') }}"></i>
                    </div>
                    <span class="font-bold text-[13px] tracking-wide">Products</span>
                </a>

                <a href="{{ url('/admin/orders') }}" class="group flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-300 {{ $linkClass('admin/orders*') }}">
                    <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-900/50 border border-slate-800/50 group-hover:border-indigo-500/30 transition-colors">
                        <i class="fas fa-shopping-cart w-5 text-center text-sm {{ $iconClass('admin/orders*') }}"></i>
                    </div>
                    <span class="font-bold text-[13px] tracking-wide">Orders</span>
                    @php $orderCount = 5; @endphp {{-- Example Badge --}}
                    <span class="ml-auto px-2 py-0.5 bg-indigo-500/10 text-indigo-500 text-[10px] font-black rounded-full border border-indigo-500/20">{{ $orderCount }}</span>
                </a>
            </div>
        </div>

        <!-- Section: Content -->
        <div>
            <p class="px-4 text-[11px] font-black text-slate-600 uppercase tracking-[0.3em] mb-4 flex items-center gap-2">
                <span class="w-1 h-1 bg-violet-500 rounded-full"></span>
                Site Content
            </p>
            <div class="space-y-1">
                <a href="{{ url('/admin/banner') }}" class="group flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-300 {{ $linkClass('admin/banner*') }}">
                    <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-900/50 border border-slate-800/50 group-hover:border-indigo-500/30 transition-colors">
                        <i class="fas fa-image w-5 text-center text-sm {{ $iconClass('admin/banner*') }}"></i>
                    </div>
                    <span class="font-bold text-[13px] tracking-wide">Banners</span>
                </a>

                <a href="{{ url('/admin/about') }}" class="group flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-300 {{ $linkClass('admin/about*') }}">
                    <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-900/50 border border-slate-800/50 group-hover:border-indigo-500/30 transition-colors">
                        <i class="fas fa-info-circle w-5 text-center text-sm {{ $iconClass('admin/about*') }}"></i>
                    </div>
                    <span class="font-bold text-[13px] tracking-wide">About Us</span>
                </a>

                <div x-data="{ open: {{ request()->is('admin/blog*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="w-full group flex items-center justify-between px-4 py-3.5 rounded-xl transition-all text-slate-400 hover:bg-slate-800/50 hover:text-slate-100 {{ request()->is('admin/blog*') ? 'bg-indigo-600/10 text-indigo-400' : '' }}">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-900/50 border border-slate-800/50 group-hover:border-indigo-500/30 transition-colors">
                                <i class="fas fa-newspaper w-5 text-center text-sm {{ request()->is('admin/blog*') ? 'text-indigo-400' : 'text-slate-500 group-hover:text-slate-300' }}"></i>
                            </div>
                            <span class="font-bold text-[13px] tracking-wide">Blog</span>
                        </div>
                        <i class="fas fa-chevron-down text-[10px] transition-transform duration-300" :class="open && 'rotate-180'"></i>
                    </button>
                    <div x-show="open" x-collapse class="mt-2 ml-10 border-l border-slate-800/60 pl-4 space-y-2">
                        <a href="{{ url('/admin/blog-categories') }}" class="block text-[12px] font-bold transition-colors {{ request()->is('admin/blog-categories*') ? 'text-indigo-400' : 'text-slate-500 hover:text-slate-200' }}">Categories</a>
                        <a href="{{ url('/admin/blogs') }}" class="block text-[12px] font-bold transition-colors {{ request()->is('admin/blogs*') ? 'text-indigo-400' : 'text-slate-500 hover:text-slate-200' }}">All Posts</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Interactions -->
        <div>
            <p class="px-4 text-[11px] font-black text-slate-600 uppercase tracking-[0.3em] mb-4 flex items-center gap-2">
                <span class="w-1 h-1 bg-cyan-500 rounded-full"></span>
                Interactions
            </p>
            <div class="space-y-1">
                <a href="{{ url('/admin/enquiries?type=general') }}" class="group flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-300 {{ request()->fullUrlIs('*type=general*') ? $linkClass('admin/enquiries*') : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-100' }}">
                    <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-900/50 border border-slate-800/50 group-hover:border-indigo-500/30 transition-colors">
                        <i class="fas fa-envelope w-5 text-center text-sm {{ request()->fullUrlIs('*type=general*') ? 'text-indigo-400' : 'text-slate-500 group-hover:text-slate-300' }}"></i>
                    </div>
                    <span class="font-bold text-[13px] tracking-wide">General Enquiries</span>
                </a>
                <a href="{{ url('/admin/enquiries?type=product') }}" class="group flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-300 {{ request()->fullUrlIs('*type=product*') ? $linkClass('admin/enquiries*') : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-100' }}">
                    <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-900/50 border border-slate-800/50 group-hover:border-indigo-500/30 transition-colors">
                        <i class="fas fa-comment-dots w-5 text-center text-sm {{ request()->fullUrlIs('*type=product*') ? 'text-indigo-400' : 'text-slate-500 group-hover:text-slate-300' }}"></i>
                    </div>
                    <span class="font-bold text-[13px] tracking-wide">Product Enquiries</span>
                </a>
                <a href="{{ url('/admin/testimonials') }}" class="group flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-300 {{ $linkClass('admin/testimonials*') }}">
                    <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-900/50 border border-slate-800/50 group-hover:border-indigo-500/30 transition-colors">
                        <i class="fas fa-quote-right w-5 text-center text-sm {{ $iconClass('admin/testimonials*') }}"></i>
                    </div>
                    <span class="font-bold text-[13px] tracking-wide">Testimonials</span>
                </a>
            </div>
        </div>

        <!-- Section: Config -->
        <div class="pt-6 border-t border-slate-800/60">
            <div class="space-y-1">
                <a href="{{ url('/admin/settings') }}" class="group flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-300 {{ $linkClass('admin/settings*') }}">
                    <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-900/50 border border-slate-800/50 group-hover:border-indigo-500/30 transition-colors">
                        <i class="fas fa-cog w-5 text-center text-sm {{ $iconClass('admin/settings*') }}"></i>
                    </div>
                    <span class="font-bold text-[13px] tracking-wide">Global Settings</span>
                </a>
                <a href="{{ url('/admin/payment-settings') }}" class="group flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-300 {{ $linkClass('admin/payment-settings*') }}">
                    <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-900/50 border border-slate-800/50 group-hover:border-indigo-500/30 transition-colors">
                        <i class="fas fa-qrcode w-5 text-center text-sm {{ $iconClass('admin/payment-settings*') }}"></i>
                    </div>
                    <span class="font-bold text-[13px] tracking-wide">Payment QR</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Bottom Profile Area -->
    <div class="relative p-6 mt-auto">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 to-transparent opacity-80"></div>
        <div class="relative group bg-slate-900/80 border border-slate-800/50 rounded-2xl p-4 backdrop-blur-md hover:border-indigo-500/40 transition-all duration-500">
            <div class="flex items-center gap-3 mb-4">
                <div class="relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-violet-500 rounded-full blur opacity-20 group-hover:opacity-40 transition"></div>
                    <div class="relative w-11 h-11 rounded-full bg-indigo-600 flex items-center justify-center text-white font-black text-sm border-2 border-slate-900 shadow-xl">
                        AU
                    </div>
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 border-2 border-slate-900 rounded-full"></div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-[13px] font-black text-white truncate tracking-tight">Admin User</p>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Super Admin</p>
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-2">
                <a href="#" class="flex items-center justify-center gap-2 py-2 rounded-lg bg-slate-800/50 text-slate-400 hover:text-white hover:bg-slate-700/50 transition-all text-[11px] font-bold">
                    <i class="fas fa-user-cog"></i> Profile
                </a>
                <a href="#" class="flex items-center justify-center gap-2 py-2 rounded-lg bg-rose-500/5 text-rose-500 hover:bg-rose-500 hover:text-white transition-all text-[11px] font-bold border border-rose-500/10">
                    <i class="fas fa-power-off"></i> Exit
                </a>
            </div>
        </div>
    </div>
</aside>
