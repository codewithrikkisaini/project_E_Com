<div>
    <!-- Page Header -->
    <div class="pt-32 pb-16 bg-[#fdfcfb] relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-[#f4ebd0] rounded-l-full opacity-30 transform translate-x-1/2"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl lg:text-5xl font-serif font-black text-slate-800 mb-4">Our Products</h1>
            <p class="text-slate-600 max-w-2xl mx-auto">Explore our premium selection of natural and organic products, carefully crafted to enhance your lifestyle.</p>
        </div>
    </div>

    <!-- Products Section -->
    <div class="py-16 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Search & Filter Bar -->
            <div class="mb-12 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="relative w-full md:max-w-md">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search products..." class="w-full pl-11 pr-4 py-3 rounded-2xl border-slate-200 focus:ring-green-500 focus:border-green-500 shadow-sm transition">
                </div>
                
                <div class="flex items-center gap-4 text-sm font-bold text-slate-500">
                    @if($products->count() > 0)
                        <span>Showing {{ $products->count() }} of {{ $products->total() }} Products</span>
                    @endif
                </div>
            </div>

            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($products as $product)
                        <div class="group bg-white rounded-[2rem] border border-slate-100 p-4 hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-500 flex flex-col">
                            <!-- Image Wrapper -->
                            <div class="aspect-square bg-[#F9F9F6] rounded-[1.5rem] overflow-hidden mb-6 relative">
                                @if($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-200">
                                        <i class="fas fa-box text-5xl"></i>
                                    </div>
                                @endif
                                
                                <!-- Price Tag -->
                                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-4 py-2 rounded-2xl text-sm font-black text-slate-900 shadow-sm">
                                    ₹{{ number_format($product->price, 2) }}
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="px-2 flex-1 flex flex-col">
                                <div class="mb-4">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1 block">{{ $product->category->name ?? 'General' }}</span>
                                    <h3 class="text-lg font-black text-slate-900 line-clamp-1 group-hover:text-green-800 transition-colors">{{ $product->name }}</h3>
                                </div>
                                
                                <p class="text-xs text-slate-500 line-clamp-2 mb-6 leading-relaxed flex-1">
                                    {{ $product->description ?? 'No description available for this product.' }}
                                </p>

                                <div class="flex items-center gap-2">
                                    <a href="{{ route('product.detail', $product->slug ?? $product->id) }}" class="flex-1 py-4 bg-[#1e4620] text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-green-900 transition-all text-center shadow-lg shadow-green-900/10">
                                        View Details
                                    </a>
                                    <button class="w-12 h-12 rounded-xl border border-slate-100 flex items-center justify-center text-slate-400 hover:text-green-700 hover:bg-green-50 transition-all">
                                        <i class="fas fa-heart text-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-16">
                    {{ $products->links() }}
                </div>
            @else
                <div class="text-center py-24">
                    <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-200 text-4xl">
                        <i class="fas fa-search-minus"></i>
                    </div>
                    <h2 class="text-2xl font-black text-slate-800 mb-2">No Products Found</h2>
                    <p class="text-slate-500">We couldn't find anything matching your search. Try different keywords!</p>
                </div>
            @endif
        </div>
    </div>
</div>
