<footer class="bg-slate-950 pt-24 pb-12 overflow-hidden relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center md:text-left">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20 text-white">
            <div class="space-y-6">
                 <h2 class="text-2xl font-serif font-black">Nick's & Morris</h2>
                 <p class="text-slate-400">Premium natural products for a healthy life.</p>
            </div>
            <div>
                <h3 class="font-bold mb-6">Explore</h3>
                <ul class="text-slate-400 space-y-4">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('products') }}">Products</a></li>
                </ul>
            </div>
        </div>
        <p class="text-slate-500 text-sm">© {{ date('Y') }} Nick's & Morris.</p>
    </div>
</footer>
