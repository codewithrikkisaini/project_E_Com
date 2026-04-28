@component('layouts.app')
    <!-- Page Header -->
    <div class="pt-32 pb-16 bg-[#fdfcfb] relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-[#f4ebd0] rounded-l-full opacity-30 transform translate-x-1/2"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl lg:text-5xl font-serif font-black text-slate-800 mb-4">Our Products</h1>
            <p class="text-slate-600 max-w-2xl mx-auto">Explore our premium selection of natural and organic products, carefully crafted to enhance your lifestyle.</p>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(isset($products) && $products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($products as $product)
                        <div class="group rounded-2xl border border-slate-100 bg-white shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col">
                            <div class="aspect-[4/3] bg-[#fdfcfb] relative overflow-hidden flex items-center justify-center p-6">
                                @if($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="object-cover w-full h-full rounded-xl group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-green-50 to-[#f4ebd0] rounded-xl flex items-center justify-center">
                                        <i class="fas fa-box text-5xl text-green-200"></i>
                                    </div>
                                @endif
                                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-slate-800 shadow-sm">
                                    ₹{{ number_format($product->price, 2) }}
                                </div>
                            </div>
                            
                            <div class="p-6 flex-1 flex flex-col">
                                <h3 class="text-xl font-bold text-slate-800 mb-2">{{ $product->name }}</h3>
                                <p class="text-sm text-slate-500 mb-6 line-clamp-2 flex-1">{{ $product->description }}</p>
                                
                                <button class="w-full py-3 bg-[#1e4620] text-white text-xs font-black uppercase tracking-widest rounded-xl hover:bg-green-900 transition-colors shadow-md shadow-green-900/20">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-slate-50 mb-6 text-slate-300 text-4xl">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-800 mb-2">No Products Found</h2>
                    <p class="text-slate-500">We are currently restocking. Please check back later!</p>
                </div>
            @endif
        </div>
    </div>
@endcomponent
