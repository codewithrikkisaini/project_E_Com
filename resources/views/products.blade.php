@extends('layouts.app')

@section('title', 'Our Collection')

@section('content')
<section class="pt-20 pb-32 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Collection Header -->
        <div class="text-center mb-20 space-y-4">
            <span class="text-green-700 font-bold uppercase tracking-widest text-sm">Natural Selection</span>
            <h1 class="text-5xl md:text-6xl font-serif font-black text-slate-800">Our Premium <span class="text-green-800">Collection</span></h1>
            <p class="text-slate-500 text-lg max-w-2xl mx-auto leading-relaxed">
                Explore our handpicked selection of organic and natural products designed to elevate your daily routine.
            </p>
        </div>

        <!-- Filters (Specific to Nick's & Morris) -->
        <div class="flex flex-wrap justify-center gap-4 mb-20">
            @foreach(['All Products', 'Hair Care', 'Skin Care', 'Body Care', 'Essential Oils'] as $cat)
                <button class="px-8 py-3 rounded-2xl font-bold transition-all duration-300 {{ $loop->first ? 'bg-[#6b624b] text-white shadow-xl shadow-slate-200' : 'bg-white text-slate-600 hover:bg-green-50 hover:text-green-800' }}">
                    {{ $cat }}
                </button>
            @endforeach
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
            @php
                $products = [
                    ['title' => 'Luxury Soap Bar', 'price' => 12, 'image' => 'https://images.unsplash.com/photo-1600857062241-98e5dba7f214?w=500&auto=format&fit=crop', 'tag' => 'Best Seller'],
                    ['title' => 'Herbal Hair Oil', 'price' => 25, 'image' => 'https://images.unsplash.com/photo-1626784215021-2e39ccf971cd?w=500&auto=format&fit=crop', 'tag' => 'Pure'],
                    ['title' => 'Organic Face Wash', 'price' => 18, 'image' => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?w=500&auto=format&fit=crop', 'tag' => 'New'],
                    ['title' => 'Body Butter', 'price' => 30, 'image' => 'https://images.unsplash.com/photo-1594132176001-cb869bd72124?w=500&auto=format&fit=crop', 'tag' => 'Hot'],
                    ['title' => 'Rosemary Essence', 'price' => 45, 'image' => 'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?w=500&auto=format&fit=crop', 'tag' => 'Essential'],
                    ['title' => 'Aloe Vera Gel', 'price' => 15, 'image' => 'https://images.unsplash.com/photo-1598449356475-b9f71db7d847?w=500&auto=format&fit=crop', 'tag' => 'Cooling'],
                    ['title' => 'Tea Tree Oil', 'price' => 22, 'image' => 'https://images.unsplash.com/photo-1617897903246-719242758050?w=500&auto=format&fit=crop', 'tag' => 'Healing'],
                    ['title' => 'Shea Conditioner', 'price' => 28, 'image' => 'https://images.unsplash.com/photo-1535585209827-a15fcdbc4c2d?w=500&auto=format&fit=crop', 'tag' => 'Shine'],
                ];
            @endphp

            @foreach($products as $product)
                <div class="group">
                    <div class="relative aspect-[4/5] overflow-hidden rounded-[2.5rem] bg-white shadow-sm group-hover:shadow-2xl transition-all duration-500 mb-6">
                        <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        
                        <!-- Tag -->
                        <div class="absolute top-6 left-6">
                            <span class="px-4 py-1.5 bg-white/90 backdrop-blur-md text-[#6b624b] text-[10px] font-black uppercase tracking-widest rounded-full shadow-sm">
                                {{ $product['tag'] }}
                            </span>
                        </div>

                        <!-- Add to Cart Overlay -->
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                            <div class="flex gap-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 pointer-events-auto">
                                <button class="w-14 h-14 bg-[#6b624b] text-white rounded-2xl flex items-center justify-center hover:bg-green-800 transition-colors shadow-xl">
                                    <i class="fas fa-shopping-bag"></i>
                                </button>
                                <button class="w-14 h-14 bg-white text-slate-800 rounded-2xl flex items-center justify-center hover:text-green-800 transition-colors shadow-xl">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-bold text-slate-800 group-hover:text-green-800 transition-colors">{{ $product['title'] }}</h3>
                            <div class="flex items-center text-yellow-500 text-xs">
                                <i class="fas fa-star"></i>
                                <span class="ml-1 text-slate-400 font-bold">5.0</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-2xl font-black text-slate-900">${{ $product['price'] }}.00</p>
                            <button class="text-sm font-bold text-[#6b624b] hover:text-green-800 transition-colors underline underline-offset-4">Buy Now</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Load More -->
        <div class="mt-24 text-center">
            <button class="px-12 py-5 bg-white border-2 border-slate-100 font-black text-slate-800 rounded-[2rem] hover:border-green-800 hover:text-green-800 transition-all duration-300 shadow-sm">
                Load More Products
            </button>
        </div>
    </div>
</section>
@endsection
