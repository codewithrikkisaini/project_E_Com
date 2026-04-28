<div class="bg-[#fdfcfc] min-h-screen relative overflow-hidden">
    <!-- Subtle Background Shapes -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-20 left-40 w-12 h-6 bg-slate-200/50 rounded-full blur-sm"></div>
        <div class="absolute top-40 right-1/4 w-4 h-4 bg-green-200/50 rounded-full blur-[2px]"></div>
        <div class="absolute top-10 right-20 text-slate-200 opacity-50"><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 4L4 20h16L12 4z"></path></svg></div>
        <div class="absolute top-32 right-10 w-64 h-64 bg-slate-100/50 rounded-full blur-xl"></div>
    </div>

    <!-- Header Section -->
    <div class="relative z-10 pt-32 pb-12 max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#111827] mb-4">Pharma Insights & Updates</h1>
        <p class="text-slate-500 text-sm md:text-base max-w-2xl mx-auto leading-relaxed">
            Latest articles, research, and wellness updates from {{ $site_settings['settings_website_name'] ?? 'Admin' }}. Discover expert-backed guidance across pharma, health, and lifestyle.
        </p>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 max-w-6xl mx-auto px-4 pb-24">
        
        <!-- Search and Filters -->
        <div class="mb-12 max-w-3xl mx-auto">
            <!-- Search Bar -->
            <div class="relative mb-6">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search articles by title or content..." 
                       class="w-full rounded-xl border border-slate-200 bg-white py-3.5 pl-4 pr-10 text-sm text-slate-700 placeholder-slate-400 focus:border-green-500 focus:ring-1 focus:ring-green-500 shadow-sm transition">
                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">
                    <i class="fas fa-search"></i>
                </span>
            </div>

            <!-- Categories -->
            <div class="flex flex-wrap items-center gap-2 mb-6">
                <button wire:click="setCategory('')" class="px-5 py-1.5 rounded-full text-xs font-bold transition-all {{ $categoryId === '' ? 'bg-[#406857] text-white shadow-sm' : 'bg-white border border-slate-200 text-slate-600 hover:border-slate-300' }}">
                    All Categories
                </button>
                @foreach($categories as $cat)
                    <button wire:click="setCategory('{{ $cat->id }}')" class="px-5 py-1.5 rounded-full text-xs font-bold transition-all {{ $categoryId == $cat->id ? 'bg-[#406857] text-white shadow-sm' : 'bg-white border border-slate-200 text-slate-600 hover:border-slate-300' }}">
                        {{ $cat->name }} ({{ $cat->blogs_count }})
                    </button>
                @endforeach
            </div>

            <!-- Tags -->
            @if($allTags->count() > 0)
                <div>
                    <h4 class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-3">Filter by tags</h4>
                    <div class="flex flex-wrap gap-2">
                        <button wire:click="setTag('')" class="px-4 py-1.5 rounded-full text-[11px] font-bold transition-all {{ $tag === '' ? 'bg-[#111827] text-white' : 'bg-white border border-slate-200 text-slate-500 hover:bg-slate-50' }}">
                            #All
                        </button>
                        @foreach($allTags as $t)
                            <button wire:click="setTag('{{ $t }}')" class="px-4 py-1.5 rounded-full text-[11px] font-bold transition-all {{ $tag === $t ? 'bg-[#111827] text-white' : 'bg-white border border-slate-200 text-slate-500 hover:bg-slate-50' }}">
                                #{{ $t }}
                            </button>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <!-- Blog Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($blogs as $blog)
                <article class="bg-white rounded-[1.25rem] shadow-sm border border-slate-100 overflow-hidden flex flex-col hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                    
                    <div class="relative h-56 bg-slate-100 overflow-hidden">
                        @if($blog->image)
                            <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-300">
                                <i class="fas fa-image text-4xl"></i>
                            </div>
                        @endif
                        
                        @if($blog->category)
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-slate-800 text-[10px] font-extrabold uppercase tracking-widest rounded-full shadow-sm">
                                    {{ $blog->category->name }}
                                </span>
                            </div>
                        @endif
                    </div>

                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex items-center gap-2 text-[11px] font-medium text-slate-400 mb-3">
                            <span>{{ $blog->created_at->format('M d, Y') }}</span>
                            <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                            <span>Admin</span>
                        </div>

                        <h2 class="text-lg font-bold text-slate-800 mb-2 leading-tight group-hover:text-green-700 transition-colors">
                            <a href="#">{{ $blog->title }}</a>
                        </h2>
                        
                        <p class="text-slate-500 text-sm leading-relaxed line-clamp-3 mb-4 flex-1">
                            {{ Str::limit(strip_tags($blog->content), 120) }}
                        </p>

                        @if(!empty($blog->tags))
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach(explode(',', $blog->tags) as $t)
                                    <span class="text-[10px] font-bold text-slate-400">#{{ trim($t) }}</span>
                                @endforeach
                            </div>
                        @endif

                        <div class="flex items-center justify-between pt-4 border-t border-slate-100 mt-auto">
                            <a href="#" class="text-xs font-bold text-slate-800 hover:text-green-700 transition flex items-center gap-1 group-hover:gap-2">
                                Read more <i class="fas fa-chevron-right text-[10px]"></i>
                            </a>
                            <span class="text-[10px] text-slate-400 uppercase tracking-wider font-semibold">Published</span>
                        </div>
                    </div>

                </article>
            @empty
                <div class="col-span-full text-center py-20 bg-white rounded-2xl shadow-sm border border-slate-100">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-slate-50 mb-4 text-slate-300 text-3xl">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">No articles found</h3>
                    <p class="text-slate-500 text-sm">Try adjusting your search or filter criteria.</p>
                </div>
            @endforelse
        </div>

        @if($blogs->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $blogs->links('pagination::tailwind') }}
            </div>
        @endif

    </div>
</div>
