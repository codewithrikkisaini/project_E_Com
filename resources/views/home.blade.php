@extends('layouts.app')

@section('title', 'Nick\'s & Morris')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[80vh] flex items-center pt-10 overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-green-50 border border-green-100 text-green-700 text-sm font-bold tracking-wide uppercase animate-fade-in">
                    <span class="mr-2">🌱</span>
                    Natural & Premium Quality
                </div>
                
                <h1 class="text-6xl lg:text-7xl font-serif font-black text-slate-800 leading-tight">
                    Pure Care for your <span class="text-green-800 italic">Lifestyle.</span>
                </h1>
                
                <p class="text-xl text-slate-500 leading-relaxed max-w-lg font-medium">
                    Experience the essence of nature with Nick's & Morris. Our premium products are crafted with care to bring you the best of life.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="{{ route('products') }}" class="px-10 py-4 bg-[#6b624b] hover:bg-[#5a523e] text-white font-bold rounded-2xl shadow-xl transition-all duration-300 transform hover:-translate-y-1 text-center">
                        Shop Collection
                    </a>
                    <a href="{{ route('about') }}" class="px-10 py-4 border-2 border-slate-200 hover:border-green-800 hover:text-green-800 text-slate-600 font-bold rounded-2xl transition-all duration-300 flex items-center justify-center">
                        Our Story
                    </a>
                </div>
            </div>

            <div class="relative hidden lg:block">
                <div class="relative z-10 rounded-[3rem] overflow-hidden shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?q=80&w=1000&auto=format&fit=crop" alt="Natural Product" class="w-full">
                </div>
                <!-- Decoration -->
                <div class="absolute -top-10 -right-10 w-64 h-64 bg-green-50 rounded-full blur-3xl -z-10"></div>
                <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-green-100 rounded-full blur-3xl -z-10"></div>
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            @foreach([
                ['title' => '100% Organic', 'desc' => 'Certified natural ingredients sourced directly from farms.', 'icon' => 'leaf'],
                ['title' => 'Fast Delivery', 'desc' => 'Across India delivery within 3-5 business days.', 'icon' => 'shipping-fast'],
                ['title' => 'Customer Care', 'desc' => 'Dedicated support for all your queries and concerns.', 'icon' => 'headset']
            ] as $feature)
                <div class="bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-shadow duration-300 text-center">
                    <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center text-green-700 mx-auto mb-6">
                        <i class="fas fa-{{ $feature['icon'] }} text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4">{{ $feature['title'] }}</h3>
                    <p class="text-slate-500 leading-relaxed">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-16 px-4">
            <div>
                <span class="text-green-700 font-bold uppercase tracking-widest text-sm">Best Sellers</span>
                <h2 class="text-4xl font-serif font-black text-slate-800 mt-2">Popular at Nick's & Morris</h2>
            </div>
            <a href="{{ route('products') }}" class="text-green-800 font-bold border-b-2 border-green-800 pb-1 hover:text-green-600 hover:border-green-600 transition-colors">View All</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 px-4">
            @php
                $products = [
                    ['title' => 'Luxury Soap Bar', 'price' => 12, 'image' => 'https://images.unsplash.com/photo-1600857062241-98e5dba7f214?w=500&auto=format&fit=crop'],
                    ['title' => 'Herbal Hair Oil', 'price' => 25, 'image' => 'https://images.unsplash.com/photo-1626784215021-2e39ccf971cd?w=500&auto=format&fit=crop'],
                    ['title' => 'Organic Face Wash', 'price' => 18, 'image' => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?w=500&auto=format&fit=crop'],
                    ['title' => 'Body Butter', 'price' => 30, 'image' => 'https://images.unsplash.com/photo-1594132176001-cb869bd72124?w=500&auto=format&fit=crop'],
                ];
            @endphp

            @foreach($products as $product)
                <div class="group">
                    <div class="aspect-[4/5] overflow-hidden rounded-[2rem] bg-slate-100 mb-6 relative">
                        <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-x-0 bottom-0 p-6 translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                            <button class="w-full py-4 bg-white/90 backdrop-blur-md rounded-2xl font-bold text-slate-800 shadow-xl">Quick View</button>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3 class="text-lg font-bold text-slate-800 mb-1">{{ $product['title'] }}</h3>
                        <p class="text-green-800 font-black">${{ $product['price'] }}.00</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
