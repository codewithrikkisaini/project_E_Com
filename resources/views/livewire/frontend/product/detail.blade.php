<div class="bg-[#F9FAFB] min-h-screen py-32 px-4">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <span class="text-[10px] font-extrabold uppercase tracking-[0.2em] text-slate-400 mb-2 block">Single Product Checkout</span>
            <h1 class="text-4xl font-black text-slate-900 mb-4">Order Directly From Home</h1>
            <p class="text-slate-500 text-sm max-w-lg mx-auto">Select quantity, pay with QR, upload screenshot, and track your order in one flow.</p>
        </div>

        <!-- Product Image Section -->
        <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 overflow-hidden mb-8 border border-white">
            @if($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-auto aspect-[16/10] object-cover">
            @else
                <div class="w-full h-auto aspect-[16/10] bg-slate-100 flex items-center justify-center">
                    <i class="fas fa-box text-6xl text-slate-200"></i>
                </div>
            @endif
        </div>

        <!-- Product Info Card -->
        <div class="bg-white rounded-[2rem] border border-slate-100 p-8 md:p-10 shadow-sm">
            <div class="mb-8">
                <h2 class="text-2xl md:text-3xl font-black text-slate-900 mb-4 leading-tight">
                    {{ $product->name ?? 'NeuroBoost Elite — Advanced Cognitive Support' }}
                </h2>
                
                <div class="flex flex-wrap items-center gap-x-8 gap-y-4">
                    <p class="text-lg font-bold text-slate-800">Price: ₹{{ number_format($product->price ?? 120, 2) }}</p>
                    <div class="flex items-center gap-6 text-sm">
                        <p class="text-slate-500"><span class="font-bold text-slate-800">Category:</span> {{ $product->category->name ?? 'General' }}</p>
                        <p class="text-slate-500"><span class="font-bold text-slate-800">Stock:</span> {{ $product->stock ?? '143' }}</p>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-10">
                <h3 class="text-xs font-black uppercase tracking-widest text-slate-400 mb-4">Description</h3>
                <div class="text-slate-600 text-sm leading-relaxed space-y-4">
                    @if($product->description)
                        {!! nl2br(e($product->description)) !!}
                    @else
                        <p>A premium, clinically-formulated nootropic designed to enhance mental clarity, focus, and memory retention. Ideal for professionals and students seeking peak cognitive performance.</p>
                        <p>Elevate your mental game with NeuroBoost Elite. Our advanced formula supports memory, focus, and cognitive health. Shop now for fast shipping and a 30-day guarantee.</p>
                    @endif
                </div>
            </div>

            <!-- Quantity Selector -->
            <div class="flex items-center justify-between mb-10 pb-10 border-b border-slate-50">
                <div>
                    <h3 class="text-sm font-bold text-slate-800">Select Quantity</h3>
                </div>
                <div class="flex items-center gap-6">
                    <span class="text-[11px] font-bold text-slate-400">Available: {{ $product->stock ?? 143 }}</span>
                    <div class="flex items-center bg-slate-50 rounded-xl border border-slate-200 p-1">
                        <button wire:click="decrement" class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-slate-900 transition">
                            <i class="fas fa-minus text-xs"></i>
                        </button>
                        <div class="w-12 text-center font-bold text-slate-800">
                            {{ $quantity }}
                        </div>
                        <button wire:click="increment" class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-slate-900 transition">
                            <i class="fas fa-plus text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <button wire:click="buyNow" class="w-full py-5 bg-[#4F7965] hover:bg-[#3D5F4F] text-white font-black rounded-2xl transition-all shadow-lg shadow-[#4F7965]/20">
                    Buy Now
                </button>
                <a href="https://wa.me/{{ $site_settings['settings_mobiles'] ?? '' }}" target="_blank" class="w-full py-5 bg-[#22C55E] hover:bg-[#16A34A] text-white font-black rounded-2xl transition-all text-center flex items-center justify-center gap-2">
                    <i class="fab fa-whatsapp text-lg"></i> Order on WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>
