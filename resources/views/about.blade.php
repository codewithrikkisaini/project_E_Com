@extends('layouts.app')

@section('title', 'Our Story')

@section('content')
<!-- Header Section -->
<section class="pt-24 pb-32 overflow-hidden relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div class="space-y-8">
                <span class="text-green-700 font-bold uppercase tracking-widest text-sm">Founded in 2014</span>
                <h1 class="text-6xl font-serif font-black text-slate-800 leading-tight">Authentic Care for your <span class="text-green-800 italic underline decoration-green-200 underline-offset-8">Vitality.</span></h1>
                <p class="text-xl text-slate-500 leading-relaxed font-medium">
                    At Nick's & Morris, we believe that the purest ingredients lead to the best results. Our journey started with a simple goal: to bring the wisdom of nature into modern daily care.
                </p>
                <div class="flex items-center gap-8 pt-4">
                    <div class="flex flex-col">
                        <span class="text-4xl font-black text-slate-900 line-height-1">10+</span>
                        <span class="text-slate-400 font-bold text-xs uppercase tracking-widest">Years Experience</span>
                    </div>
                    <div class="w-px h-12 bg-slate-200"></div>
                    <div class="flex flex-col">
                        <span class="text-4xl font-black text-slate-900 line-height-1">150+</span>
                        <span class="text-slate-400 font-bold text-xs uppercase tracking-widest">Natural Products</span>
                    </div>
                </div>
            </div>
            <div class="relative group">
                <div class="absolute -top-10 -left-10 w-64 h-64 bg-green-50 rounded-full blur-3xl -z-10 animate-pulse"></div>
                <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1000&auto=format&fit=crop" alt="Our Team" class="rounded-[3rem] shadow-2xl relative z-10 transform group-hover:-rotate-2 transition-transform duration-700">
                <div class="absolute -bottom-10 -right-10 bg-[#6b624b] text-white p-10 rounded-[2.5rem] shadow-2xl z-20">
                    <p class="text-sm font-black uppercase tracking-widest mb-2">Quality First</p>
                    <p class="text-2xl font-serif">Verified Purity</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-32 bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
            <pattern id="leaf-pattern" width="20" height="20" patternUnits="userSpaceOnUse">
                <path d="M10 0 C15 5, 15 15, 10 20 C5 15, 5 5, 10 0" fill="white" />
            </pattern>
            <rect width="100%" height="100%" fill="url(#leaf-pattern)" />
        </svg>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-24">
            <h2 class="text-4xl font-serif font-black text-white mb-6">Our Core Principles</h2>
            <div class="w-24 h-1 bg-green-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            @foreach([
                ['title' => 'Ethically Sourced', 'desc' => 'We partner directly with organic farms to ensure the highest quality and fair trade practices.', 'icon' => 'globe-americas'],
                ['title' => 'Scientific Roots', 'desc' => 'Every product is backed by intensive research to maximize its natural biological benefits.', 'icon' => 'microscope'],
                ['title' => 'Zero Waste Goal', 'desc' => 'Committed to eco-friendly packaging and sustainable shipping methods for a greener earth.', 'icon' => 'recycle']
            ] as $principle)
                <div class="p-10 rounded-[3rem] bg-white group hover:bg-green-50 transition-all duration-500 transform hover:-translate-y-4">
                    <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center text-green-700 mb-8 group-hover:bg-white transition-colors">
                        <i class="fas fa-{{ $principle['icon'] }} text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">{{ $principle['title'] }}</h3>
                    <p class="text-slate-500 leading-relaxed font-medium">{{ $principle['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Timeline / Legacy -->
<section class="py-32 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <span class="text-green-700 font-bold uppercase tracking-widest text-sm mb-6 block">Our Legacy</span>
        <h2 class="text-4xl font-serif font-black text-slate-800 mb-12">Continuing the Tradition of <span class="text-green-800 underline decoration-green-100 italic">Purity.</span></h2>
        <div class="relative py-12 px-10 rounded-[3rem] bg-slate-50 overflow-hidden text-left">
            <div class="absolute top-0 right-0 p-10 opacity-5">
                <i class="fas fa-quote-right text-9xl"></i>
            </div>
            <p class="text-xl text-slate-600 leading-relaxed italic relative z-10">
                "What started as a small personal project in our founder's kitchen has blossomed into a global community of natural enthusiasts. At Nick's & Morris, we don't just sell products; we share a lifestyle centered around respect for nature and yourself."
            </p>
            <div class="mt-8 flex items-center gap-4">
                <div class="w-12 h-12 bg-green-800 rounded-full"></div>
                <div>
                    <p class="font-bold text-slate-900">Morris Nickson</p>
                    <p class="text-slate-400 text-sm font-bold uppercase tracking-widest">Founder & CEO</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
