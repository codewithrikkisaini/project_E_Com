@component('layouts.app')
    <!-- Page Header -->
    <div class="pt-32 pb-16 relative overflow-hidden" style="background-color: {{ $site_settings['settings_header_footer_color'] ?? '#1e4620' }}">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="absolute top-0 left-0 w-1/3 h-full bg-white/10 rounded-r-full transform -translate-x-1/2 blur-2xl"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl lg:text-6xl font-serif font-black text-white mb-6">Our Journal</h1>
            <p class="text-white/80 max-w-2xl mx-auto text-lg">Stay updated with the latest news, tips, and insights on natural living and wellness.</p>
        </div>
    </div>

    <!-- Content -->
    <div class="py-20 bg-[#F9F9F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($blogs->isEmpty())
                <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-slate-100">
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-slate-50 mb-6 text-slate-300 text-4xl">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-800 mb-2">Coming Soon</h2>
                    <p class="text-slate-500">We are working on exciting content for you. Stay tuned!</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($blogs as $blog)
                        <article class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col group">
                            
                            <div class="relative h-60 overflow-hidden bg-slate-100">
                                @if($blog->image)
                                    <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-300">
                                        <i class="fas fa-image text-5xl"></i>
                                    </div>
                                @endif
                                
                                @if($blog->category)
                                    <div class="absolute top-4 left-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-white text-green-700 shadow-sm">
                                            {{ $blog->category->name }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <div class="p-6 flex-1 flex flex-col">
                                <div class="flex items-center gap-4 text-xs font-medium text-slate-500 mb-4">
                                    <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt"></i> {{ $blog->created_at->format('M d, Y') }}</span>
                                    <span class="flex items-center gap-1.5"><i class="far fa-user"></i> Admin</span>
                                </div>

                                <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-green-700 transition-colors line-clamp-2">
                                    <a href="#">{{ $blog->title }}</a>
                                </h3>
                                
                                <p class="text-slate-600 text-sm line-clamp-3 mb-6 flex-1">
                                    {{ Str::limit(strip_tags($blog->content), 120) }}
                                </p>

                                <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                                    <a href="#" class="text-sm font-bold text-green-700 hover:text-green-800 flex items-center gap-2 group-hover:gap-3 transition-all">
                                        Read Article <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if($blogs->hasPages())
                    <div class="mt-16 flex justify-center">
                        {{ $blogs->links('pagination::tailwind') }}
                    </div>
                @endif
            @endif

        </div>
    </div>
@endcomponent
