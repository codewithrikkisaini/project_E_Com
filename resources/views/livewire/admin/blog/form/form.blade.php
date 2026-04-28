<div class="admin-shell min-h-screen bg-[#F8FAFC] lg:flex">
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
            <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/dashboard*') }}"><span>🏠</span><span class="font-semibold">Dashboard</span></a>
            <a href="{{ url('/admin/products') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/products*') }}"><span>📦</span><span>Products</span></a>
            <a href="{{ url('/admin/banner') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/banner*') }}"><span>🖼</span><span>Banner</span></a>
            <a href="{{ url('/admin/services') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/services*') }}"><span>🧰</span><span>Services</span></a>
            <a href="{{ url('/admin/about') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/about*') }}"><span>ℹ</span><span>About</span></a>
            <a href="{{ url('/admin/testimonials') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/testimonials*') }}"><span>💬</span><span>Testimonials</span></a>
            <a href="{{ url('/admin/orders') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/orders*') }}"><span>📑</span><span>Orders</span></a>
            <a href="{{ url('/admin/users') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/users*') }}"><span>👤</span><span>Users</span></a>
            <a href="{{ url('/admin/payment-settings') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/payment-settings*') }}"><span>💳</span><span>QR Payment</span></a>
            <a href="{{ url('/admin/settings') }}" class="flex items-center gap-3 px-4 py-3 transition {{ $active('admin/settings*') }}"><span>⚙</span><span>Settings</span></a>
            
            <div x-data="{ open: {{ request()->is('admin/blog*') ? 'true' : 'false' }} }">
                <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3 transition {{ request()->is('admin/blog*') ? 'bg-blue-600 text-white rounded-lg' : 'text-gray-700 hover:bg-gray-100' }}">
                    <div class="flex items-center gap-3"><span>📝</span><span>Blog</span></div>
                    <span :class="open && 'rotate-180'">⌄</span>
                </button>
                <div x-show="open" class="pl-8 mt-2 space-y-2">
                    <a href="{{ url('/admin/blog-categories') }}" class="block rounded-lg px-4 py-2 text-sm {{ $active('admin/blog-categories*') }}">Categories</a>
                    <a href="{{ url('/admin/blogs') }}" class="block rounded-lg px-4 py-2 text-sm {{ $active('admin/blogs*') }}">Blogs</a>
                </div>
            </div>

            <a href="{{ url('/admin/enquiries?type=general') }}" class="flex items-center gap-3 px-4 py-3 transition {{ request()->fullUrlIs('*type=general*') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100' }}"><span>📩</span><span>General Enquiry</span></a>
            <a href="{{ url('/admin/enquiries?type=product') }}" class="flex items-center gap-3 px-4 py-3 transition {{ request()->fullUrlIs('*type=product*') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100' }}"><span>📦</span><span>Product Enquiry</span></a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 transition hover:bg-red-50 hover:text-red-600"><span>🚪</span><span>Logout</span></a>
        </nav>
    </aside>

    <main class="flex-1 flex flex-col min-h-screen">
        @if($blogFormOpen)
            <form wire:submit="save" class="flex-1 flex flex-col relative pb-24">
                
                <!-- Sticky Header -->
                <div class="sticky top-0 z-40 bg-white border-b border-slate-200 shadow-sm px-6 py-4 flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <button type="button" wire:click="closeForm" class="text-slate-400 hover:text-slate-600 transition">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <div>
                            <h1 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                                ✨ {{ $blog ? 'Edit Blog Post' : 'Create New Blog Post' }}
                            </h1>
                            <p class="text-xs text-slate-500">Fill in the details below to publish your blog.</p>
                        </div>
                    </div>
                    
                    <!-- Stepper -->
                    <div class="hidden lg:flex items-center gap-4 text-xs font-semibold text-slate-500">
                        <div class="flex items-center gap-2 text-blue-600"><span class="w-5 h-5 rounded-full bg-blue-600 text-white flex items-center justify-center text-[10px]">1</span> Basic Info</div>
                        <i class="fas fa-chevron-right text-slate-300 text-[10px]"></i>
                        <div class="flex items-center gap-2"><span class="w-5 h-5 rounded-full bg-blue-600 text-white flex items-center justify-center text-[10px]">2</span> Content</div>
                        <i class="fas fa-chevron-right text-slate-300 text-[10px]"></i>
                        <div class="flex items-center gap-2"><span class="w-5 h-5 rounded-full bg-blue-600 text-white flex items-center justify-center text-[10px]">3</span> Media & SEO</div>
                    </div>

                    <div class="flex items-center gap-3">
                        <button type="button" wire:click="closeForm" class="px-5 py-2 rounded-full bg-red-600 hover:bg-red-700 text-white text-sm font-semibold transition flex items-center gap-2">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                        <button type="submit" class="px-5 py-2 rounded-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold transition flex items-center gap-2">
                            <i class="fas fa-paper-plane"></i> Publish Post
                        </button>
                    </div>
                </div>

                <!-- Form Content Area -->
                <div class="flex-1 p-6 lg:p-8 max-w-4xl mx-auto w-full space-y-6">
                    
                    <!-- 1. Basic Information -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 lg:p-8">
                        <div class="flex items-start gap-4 mb-8">
                            <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold shrink-0">1</div>
                            <div>
                                <h3 class="text-lg font-bold text-slate-800">Basic Information</h3>
                                <p class="text-xs text-slate-500">Enter the title and category for your blog post</p>
                            </div>
                        </div>

                        <div class="space-y-6 pl-12">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">📝 Post Title <span class="text-red-500">*</span></label>
                                <input type="text" wire:model="title" wire:keyup="generateSlug" placeholder="e.g., 'How to Build Amazing Web Apps' - Start typing your catchy title here..." class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-4 text-slate-700 placeholder:text-slate-400">
                                @error('title') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">📁 Category <span class="text-red-500">*</span></label>
                                    <select wire:model="blog_category_id" class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3">
                                        <option value="">-- Select Category --</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('blog_category_id') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">🔗 URL Slug <span class="text-slate-400 font-normal">(auto-generated)</span></label>
                                    <input type="text" wire:model="slug" class="w-full rounded-lg border-slate-300 bg-slate-50 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 text-slate-500">
                                    @error('slug') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">🏷️ Tags <span class="text-slate-400 font-normal">(optional)</span></label>
                                    <input type="text" wire:model="tags" placeholder="Laravel, PHP, Tutorial" class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3">
                                    <p class="text-[10px] text-slate-400 mt-1">Separate tags with commas</p>
                                    @error('tags') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="bg-[#ECFDF5] border border-[#A7F3D0] rounded-xl p-4 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-emerald-900">Publish Immediately</p>
                                        <p class="text-xs text-emerald-600">Make this post visible to public right away</p>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" wire:model="is_published" class="sr-only peer">
                                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Write Your Content -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 lg:p-8">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-8 h-8 rounded-full bg-purple-500 text-white flex items-center justify-center font-bold shrink-0">2</div>
                            <div>
                                <h3 class="text-lg font-bold text-slate-800">Write Your Content</h3>
                                <p class="text-xs text-slate-500">Compose with powerful formatting tools</p>
                            </div>
                        </div>

                        <div class="pl-12">
                            <label class="block text-xs font-bold text-slate-700 mb-2">📝 Blog Content <span class="text-red-500">*</span></label>
                            
                            <div class="border border-slate-300 rounded-lg overflow-hidden">
                                <!-- Mock Toolbar -->
                                <div class="bg-slate-50 border-b border-slate-200 px-3 py-2 flex flex-wrap gap-2 items-center">
                                    <button type="button" class="px-2 py-1 bg-white border border-slate-200 rounded text-xs hover:bg-slate-100 font-bold">B</button>
                                    <button type="button" class="px-2 py-1 bg-white border border-slate-200 rounded text-xs hover:bg-slate-100 italic">I</button>
                                    <button type="button" class="px-2 py-1 bg-white border border-slate-200 rounded text-xs hover:bg-slate-100 underline">U</button>
                                    <div class="w-px h-4 bg-slate-300 mx-1"></div>
                                    <button type="button" class="px-2 py-1 bg-white border border-slate-200 rounded text-xs hover:bg-slate-100 flex items-center gap-1"><i class="fas fa-list-ul"></i> List</button>
                                    <button type="button" class="px-2 py-1 bg-white border border-slate-200 rounded text-xs hover:bg-slate-100 flex items-center gap-1"><i class="fas fa-list-ol"></i> 1. List</button>
                                    <div class="w-px h-4 bg-slate-300 mx-1"></div>
                                    <button type="button" class="px-2 py-1 bg-white border border-slate-200 rounded text-xs hover:bg-slate-100 font-bold">H2</button>
                                    <button type="button" class="px-2 py-1 bg-white border border-slate-200 rounded text-xs hover:bg-slate-100 font-bold">H3</button>
                                    <button type="button" class="px-2 py-1 bg-white border border-slate-200 rounded text-xs hover:bg-slate-100"><i class="fas fa-link"></i> Link</button>
                                    <button type="button" class="px-2 py-1 bg-white border border-slate-200 rounded text-xs hover:bg-slate-100 ml-auto">Clear</button>
                                </div>
                                <textarea wire:model="content" rows="12" class="w-full border-0 focus:ring-0 sm:text-sm p-4 resize-y" placeholder="Write your amazing content here..."></textarea>
                            </div>
                            @error('content') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- 3. Featured Image & SEO -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 lg:p-8">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-8 h-8 rounded-full bg-orange-500 text-white flex items-center justify-center font-bold shrink-0">3</div>
                            <div>
                                <h3 class="text-lg font-bold text-slate-800">Featured Image & SEO</h3>
                                <p class="text-xs text-slate-500">Add a cover image and optimize for search engines</p>
                            </div>
                        </div>

                        <div class="space-y-8 pl-12">
                            <!-- Image Upload -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-2">📸 Featured Image <span class="text-slate-400 font-normal">(recommended 1200x630px)</span></label>
                                
                                <div class="border-2 border-dashed border-slate-300 rounded-xl p-8 text-center hover:bg-slate-50 transition relative">
                                    <input type="file" wire:model="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                    
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" class="mx-auto h-32 object-contain mb-4 rounded">
                                        <p class="text-sm font-semibold text-slate-700">Image selected: {{ $image->getClientOriginalName() }}</p>
                                        <p class="text-xs text-blue-600 mt-1">Click or drag to change</p>
                                    @elseif ($existingImage)
                                        <img src="{{ Storage::url($existingImage) }}" class="mx-auto h-32 object-contain mb-4 rounded">
                                        <p class="text-sm font-semibold text-slate-700">Current Featured Image</p>
                                        <p class="text-xs text-blue-600 mt-1">Click or drag to replace</p>
                                    @else
                                        <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center mx-auto mb-3 text-xl">
                                            <i class="fas fa-folder-open"></i>
                                        </div>
                                        <p class="text-sm font-bold text-slate-800 mb-1">📸 Upload Featured Image</p>
                                        <p class="text-xs text-slate-500">Drag & drop your image here, or <span class="text-blue-600 underline">click to browse</span></p>
                                        <p class="text-[10px] text-slate-400 mt-1">Supports: PNG, JPG, WEBP (Max 4MB)</p>
                                    @endif
                                </div>
                                @error('image') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- SEO Form -->
                            <div class="pt-6 border-t border-slate-100">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-sm font-bold text-slate-800 flex items-center gap-2"><i class="fas fa-search text-emerald-500"></i> SEO Optimization</h4>
                                    <span class="text-[10px] text-slate-400 font-medium">(Optional but recommended)</span>
                                </div>

                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Meta Title</label>
                                        <input type="text" wire:model="meta_title" placeholder="SEO-friendly title (50-60 characters recommended)" class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3">
                                        <p class="text-[10px] text-slate-400 mt-1">This appears in Google search results.</p>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Meta Description</label>
                                        <textarea wire:model="meta_description" rows="3" placeholder="Compelling description that appears in search results (150-160 characters)" class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3"></textarea>
                                        <p class="text-[10px] text-slate-400 mt-1">Keep it under 160 characters for best results.</p>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Meta Keywords</label>
                                        <input type="text" wire:model="meta_keywords" placeholder="keyword1, keyword2, keyword3" class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3">
                                        <p class="text-[10px] text-slate-400 mt-1">Separate with commas (e.g., Laravel, PHP, Tutorial)</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Sticky Bottom Bar -->
                <div class="fixed bottom-0 left-0 lg:left-72 right-0 bg-[#0F172A] border-t border-slate-800 p-4 flex items-center justify-between z-40 shadow-[0_-10px_20px_-10px_rgba(0,0,0,0.3)]">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-lg bg-slate-800 flex items-center justify-center text-white text-lg">
                            <i class="fas fa-save"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Ready to Publish?</h4>
                            <p class="text-xs text-slate-400">Your post will be saved securely</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <button type="button" wire:click="closeForm" class="px-6 py-2.5 rounded-lg border border-slate-600 hover:bg-slate-800 text-white text-sm font-semibold transition">
                            Cancel
                        </button>
                        <button type="submit" class="px-6 py-2.5 rounded-lg bg-[#22C55E] hover:bg-[#16a34a] text-white text-sm font-bold transition flex items-center gap-2">
                            <i class="fas fa-check"></i> Publish Post
                        </button>
                    </div>
                </div>

            </form>
        @else
            <!-- List View Wrapper (Unchanged) -->
            <div class="flex flex-col min-h-screen">
                <header class="border-b border-slate-200 bg-white px-4 py-3 lg:px-8">
                    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                        <h1 class="text-3xl font-semibold text-slate-900 lg:text-[42px] lg:leading-none">Dashboard</h1>
                        <div class="flex items-center gap-3">
                            <a href="{{ url('/') }}" target="_blank" class="rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200 transition">🌍 View Frontend</a>
                            <div class="relative">
                                <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-xl text-slate-400">⌕</span>
                                <input type="text" placeholder="Search..." class="w-72 rounded-2xl border border-slate-200 bg-slate-100 py-2.5 pl-11 pr-4 text-sm text-slate-700 outline-none transition focus:border-cyan-400 focus:bg-white focus:ring-2 focus:ring-cyan-100" />
                            </div>
                            <button type="button" class="rounded-full p-2 text-slate-500 transition hover:bg-slate-100 hover:text-slate-700">🔔</button>
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-sky-600 text-sm font-semibold text-white">AU</div>
                        </div>
                    </div>
                </header>

                <section class="p-4 lg:p-8 flex-1">
                    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <h1 class="text-2xl font-bold text-slate-800">Blog Posts</h1>
                            <p class="text-sm text-slate-500">Manage and organize your blog content</p>
                        </div>
                        <button wire:click="openCreateForm" class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700 shadow-sm">
                            <i class="fas fa-plus mr-2"></i> Create Blog Post
                        </button>
                    </div>

                    @if (session()->has('success'))
                        <div class="mb-4 rounded-lg bg-emerald-50 p-4 border border-emerald-200">
                            <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                        <div class="p-4 border-b border-slate-100 flex flex-wrap items-center gap-4">
                            <div class="relative flex-1 min-w-[200px]">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400"><i class="fas fa-search"></i></span>
                                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search posts..." class="block w-full rounded-lg border-slate-200 pl-10 focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2">
                            </div>
                            <select wire:model.live="categoryId" class="rounded-lg border-slate-200 text-sm focus:border-blue-500 py-2 min-w-[150px]">
                                <option value="">All Categories</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            <select wire:model.live="status" class="rounded-lg border-slate-200 text-sm focus:border-blue-500 py-2 min-w-[150px]">
                                <option value="">All Status</option>
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                            </select>
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-slate-500">Per page:</span>
                                <select class="rounded-lg border-slate-200 text-sm focus:border-blue-500 py-2">
                                    <option>10</option><option>25</option><option>50</option>
                                </select>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-100">
                                <thead class="bg-slate-50/50">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider w-16">#</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Title</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider">Category</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100">
                                    @forelse ($blogs as $index => $item)
                                        <tr class="hover:bg-slate-50/50 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 font-medium">{{ $blogs->firstItem() + $index }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center gap-3">
                                                    @if($item->image)
                                                        <img src="{{ Storage::url($item->image) }}" class="h-10 w-10 rounded object-cover border border-slate-200">
                                                    @else
                                                        <div class="h-10 w-10 rounded bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-400">
                                                            <i class="fas fa-image"></i>
                                                        </div>
                                                    @endif
                                                    <span class="text-sm font-medium text-slate-700">{{ $item->title }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                @if($item->category)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700">{{ $item->category->name }}</span>
                                                @else
                                                    <span class="text-xs text-slate-400">-</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                @if($item->is_published)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700"><i class="fas fa-check-circle mr-1 text-emerald-500"></i> Published</span>
                                                @else
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600"><i class="fas fa-clock mr-1"></i> Draft</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">{{ $item->created_at->format('M d, Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex justify-end gap-2">
                                                    <button class="inline-flex items-center justify-center rounded-full bg-indigo-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-indigo-700 shadow-sm"><i class="fas fa-eye mr-1.5"></i> View</button>
                                                    <button wire:click="edit({{ $item->id }})" class="inline-flex items-center justify-center rounded-full bg-blue-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-blue-700 shadow-sm"><i class="fas fa-edit mr-1.5"></i> Edit</button>
                                                    <button wire:click="delete({{ $item->id }})" wire:confirm="Are you sure?" class="inline-flex items-center justify-center rounded-full bg-red-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-700 shadow-sm"><i class="fas fa-trash-alt mr-1.5"></i> Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="6" class="px-6 py-12 text-center text-sm text-slate-500">No blog posts found. Create your first post!</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if($blogs->hasPages())
                            <div class="p-4 border-t border-slate-100 flex justify-between items-center text-sm text-slate-500">
                                <div>Showing {{ $blogs->firstItem() }}-{{ $blogs->lastItem() }} of {{ $blogs->total() }} items</div>
                                <div>{{ $blogs->links('pagination::tailwind') }}</div>
                            </div>
                        @endif
                    </div>
                </section>
            </div>
        @endif
    </main>
</div>
