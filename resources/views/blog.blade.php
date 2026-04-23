@extends('layouts.app')

@section('title', 'Insights & Health')

@section('content')
<section class="pt-20 pb-32 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex flex-col lg:flex-row justify-between items-end mb-24 gap-10">
            <div class="max-w-3xl">
                <span class="text-green-700 font-bold uppercase tracking-widest text-sm mb-4 block">Care Journal</span>
                <h1 class="text-5xl md:text-6xl font-serif font-black text-slate-800 leading-tight">Wisdom for a <span class="text-green-800 italic underline decoration-green-200 underline-offset-8">Natural Life.</span></h1>
            </div>
            <div class="flex gap-4">
                <div class="relative">
                    <input type="text" placeholder="Search insights..." class="pl-14 pr-8 py-5 bg-white rounded-3xl border-none shadow-sm focus:ring-2 focus:ring-green-700 w-full lg:w-80 font-medium">
                    <i class="fas fa-search absolute left-6 top-1/2 -translate-y-1/2 text-slate-400"></i>
                </div>
            </div>
        </div>

        <!-- Featured Article -->
        <div class="group relative rounded-[3.5rem] bg-white overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-700 mb-24 flex flex-col lg:flex-row">
            <div class="lg:w-1/2 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=1000&auto=format&fit=crop" alt="Featured post" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-1000">
            </div>
            <div class="lg:w-1/2 p-12 lg:p-20 flex flex-col justify-center">
                <span class="text-green-700 font-black uppercase tracking-widest text-xs mb-6 block">Sustainability</span>
                <h2 class="text-4xl font-serif font-black text-slate-800 mb-6 leading-tight group-hover:text-green-800 transition-colors">Why Organic Sourcing is the Heart of Nick's & Morris</h2>
                <p class="text-xl text-slate-500 leading-relaxed font-medium mb-10">
                    Discover how our commitment to organic farming directly impacts the potency and purity of every product we create for you...
                </p>
                <div class="flex items-center justify-between pt-10 border-t border-slate-50">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-slate-100 rounded-full"></div>
                        <div>
                            <p class="font-bold text-slate-900">Emily Garden</p>
                            <p class="text-slate-400 text-sm font-bold uppercase tracking-widest">Health Expert</p>
                        </div>
                    </div>
                    <a href="#" class="w-16 h-16 bg-slate-900 text-white rounded-full flex items-center justify-center group-hover:bg-green-700 transition-all duration-300">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Blog Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @php
                $posts = [
                    ['cat' => 'Routine', 'title' => 'Morning Rituals for Radiant Skin', 'image' => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?w=800&auto=format&fit=crop'],
                    ['cat' => 'Ingredients', 'title' => 'The Healing Power of Essential Oils', 'image' => 'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?w=800&auto=format&fit=crop'],
                    ['cat' => 'Science', 'title' => 'Understanding Hair Myths in 2024', 'image' => 'https://images.unsplash.com/photo-1535585209827-a15fcdbc4c2d?w=800&auto=format&fit=crop'],
                    ['cat' => 'Lifestyle', 'title' => 'Meditation and Skin Health Connection', 'image' => 'https://images.unsplash.com/photo-1594132176001-cb869bd72124?w=800&auto=format&fit=crop'],
                    ['cat' => 'Nature', 'title' => 'Sourcing the Finest Aloe Vera', 'image' => 'https://images.unsplash.com/photo-1598449356475-b9f71db7d847?w=800&auto=format&fit=crop'],
                    ['cat' => 'Ethics', 'title' => 'Our Zero-Waste Packaging Journey', 'image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=800&auto=format&fit=crop'],
                ];
            @endphp

            @foreach($posts as $post)
                <article class="group bg-white rounded-[3rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-50">
                    <div class="relative overflow-hidden aspect-[16/10]">
                        <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-10">
                        <span class="text-green-700 font-black uppercase tracking-widest text-[10px] mb-4 block">{{ $post['cat'] }}</span>
                        <h3 class="text-2xl font-bold text-slate-800 mb-6 leading-tight group-hover:text-green-800 transition-colors">
                            {{ $post['title'] }}
                        </h3>
                        <div class="pt-6 border-t border-slate-50 flex justify-between items-center text-slate-400 text-sm font-bold">
                            <span>5 MIN READ</span>
                            <a href="#" class="text-slate-900 group-hover:text-green-700 transition-colors">READ MORE</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
