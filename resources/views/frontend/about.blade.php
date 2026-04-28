@component('layouts.app')
<!-- Page Header -->
<div class="pt-32 pb-16 bg-[#1e4620] relative overflow-hidden text-white">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-white/5 rounded-l-full transform translate-x-1/2"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl lg:text-5xl font-serif font-black mb-4">Our Story</h1>
        <p class="text-green-100 max-w-2xl mx-auto">Learn about our journey, our mission, and what drives us to provide
            the best natural products for you.</p>
    </div>
</div>

<!-- Content -->
<div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative">
                <div
                    class="aspect-square rounded-full bg-gradient-to-tr from-green-100 to-[#f4ebd0] p-8 absolute -inset-4 opacity-50 blur-2xl">
                </div>
                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80"
                    alt="Nature" class="relative rounded-3xl shadow-2xl object-cover aspect-[4/5] w-full">
            </div>

            <div>
                @if(isset($site_settings['about_content']))
                    <div class="prose prose-slate max-w-none prose-lg">
                        {!! $site_settings['about_content'] !!}
                    </div>
                @else
                    <h2 class="text-3xl lg:text-4xl font-serif font-black text-slate-800 mb-6">Care for Life. Naturally.</h2>
                    <p class="text-slate-600 mb-6 leading-relaxed text-lg">
                        At Nick's & Morris, we believe that nature provides everything we need to live a healthy, balanced
                        life. Our journey started with a simple idea: to bring the purest, most effective natural products
                        directly to you.
                    </p>
                    <p class="text-slate-600 mb-8 leading-relaxed text-lg">
                        We carefully source our ingredients from sustainable farms and ethical producers, ensuring that
                        every product you buy not only benefits you but also supports the environment and local communities.
                    </p>
                @endif

                <div class="grid grid-cols-2 gap-8 mt-12">
                    <div>
                        <h4 class="text-4xl font-black text-[#1e4620] mb-2">{{ $site_settings['about_stat_1_value'] ?? '100%' }}</h4>
                        <p class="text-sm font-bold text-slate-500 uppercase tracking-wider">{{ $site_settings['about_stat_1_label'] ?? 'Organic' }}</p>
                    </div>
                    <div>
                        <h4 class="text-4xl font-black text-[#1e4620] mb-2">{{ $site_settings['about_stat_2_value'] ?? '50k+' }}</h4>
                        <p class="text-sm font-bold text-slate-500 uppercase tracking-wider">{{ $site_settings['about_stat_2_label'] ?? 'Happy Customers' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endcomponent