<div class="bg-[#FBF9F6] min-h-screen py-32 px-4">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-black text-slate-900">Complete Your Order</h1>
            <p class="text-slate-500 text-sm">Fill details, pay via QR, upload screenshot and submit.</p>
        </div>

        @if (!Auth::check())
            <div class="mb-8 p-4 bg-red-50 border border-red-100 text-red-600 rounded-xl text-xs flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-sm"></i>
                Checkout is only available for customer accounts. Please <a href="{{ route('login') }}" class="font-bold underline">sign in with a user account</a> to continue.
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Column: Customer & Delivery Details -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-3xl border border-slate-100 p-8 shadow-sm">
                    <h2 class="text-lg font-bold text-slate-800 mb-6">Customer & Delivery Details</h2>

                    <!-- Product Snapshot -->
                    <div class="bg-slate-50 rounded-2xl p-4 mb-8 border border-slate-100">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-3">Product Snapshot</p>
                        <div class="flex items-center gap-4">
                            <div class="w-20 h-20 bg-white rounded-xl overflow-hidden border border-slate-200">
                                @if($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-300">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-bold text-slate-800 leading-tight mb-1">{{ $product->name }}</h4>
                                <div class="grid grid-cols-2 gap-x-4 gap-y-1 text-[11px] text-slate-500">
                                    <p>Unit Price: ₹{{ number_format($product->price, 2) }}</p>
                                    <p>Stock: {{ $product->stock ?? 'Available' }}</p>
                                    <p class="col-span-2 font-bold text-slate-700 mt-1">Subtotal: ₹{{ number_format($product->price * $quantity, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fields -->
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <label class="text-sm font-bold text-slate-700">Quantity</label>
                            <div class="flex items-center gap-4">
                                <span class="text-[10px] font-bold text-slate-400">Available stock: {{ $product->stock ?? 'Available' }}</span>
                                <div class="flex items-center bg-slate-50 rounded-lg border border-slate-200 p-1">
                                    <button wire:click="decrement" class="w-8 h-8 flex items-center justify-center text-slate-400 hover:text-slate-900">-</button>
                                    <div class="w-10 text-center font-bold text-sm text-slate-800">{{ $quantity }}</div>
                                    <button wire:click="increment" class="w-8 h-8 flex items-center justify-center text-slate-400 hover:text-slate-900">+</button>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5">Name</label>
                            <input type="text" wire:model="name" class="w-full rounded-xl border-slate-200 bg-white py-3 px-4 text-sm focus:ring-green-500 focus:border-green-500 transition shadow-sm">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Email</label>
                                <input type="email" wire:model="email" class="w-full rounded-xl border-slate-200 bg-white py-3 px-4 text-sm focus:ring-green-500 focus:border-green-500 transition shadow-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Phone</label>
                                <input type="text" wire:model="phone" class="w-full rounded-xl border-slate-200 bg-white py-3 px-4 text-sm focus:ring-green-500 focus:border-green-500 transition shadow-sm">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5">Shipping Address</label>
                            <textarea wire:model="address" rows="3" class="w-full rounded-xl border-slate-200 bg-white py-3 px-4 text-sm focus:ring-green-500 focus:border-green-500 transition shadow-sm"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">City</label>
                                <input type="text" wire:model="city" class="w-full rounded-xl border-slate-200 bg-white py-3 px-4 text-sm focus:ring-green-500 focus:border-green-500 transition shadow-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">State</label>
                                <input type="text" wire:model="state" class="w-full rounded-xl border-slate-200 bg-white py-3 px-4 text-sm focus:ring-green-500 focus:border-green-500 transition shadow-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Postal Code</label>
                                <input type="text" wire:model="postal_code" class="w-full rounded-xl border-slate-200 bg-white py-3 px-4 text-sm focus:ring-green-500 focus:border-green-500 transition shadow-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: QR Payment & Summary -->
            <div class="space-y-6">
                <div class="bg-white rounded-3xl border border-slate-100 p-8 shadow-sm">
                    <h2 class="text-lg font-bold text-slate-800 mb-6">QR Payment</h2>

                    <div class="aspect-square bg-slate-50 border-2 border-dotted border-slate-200 rounded-2xl mb-4 flex flex-col items-center justify-center p-4">
                        @if($qr_image)
                            <img src="{{ Storage::url($qr_image) }}" class="w-full h-full object-contain">
                        @else
                            <div class="text-center">
                                <p class="text-xs text-slate-400 font-bold mb-1">QR not uploaded yet</p>
                            </div>
                        @endif
                    </div>

                    <p class="text-[11px] text-slate-500 leading-relaxed text-center mb-6 px-4 whitespace-pre-line">
                        {{ $payment_instructions }}
                    </p>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-2">Upload Payment Screenshot</label>
                            <input type="file" wire:model="payment_screenshot" class="text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer w-full">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5">Payment Note (optional)</label>
                            <textarea wire:model="payment_note" rows="3" class="w-full rounded-xl border-slate-200 bg-white py-3 px-4 text-sm focus:ring-green-500 focus:border-green-500 transition shadow-sm"></textarea>
                        </div>

                        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">Order Summary</p>
                            <div class="space-y-3">
                                <div class="flex justify-between text-xs">
                                    <span class="text-slate-600 max-w-[150px]">{{ $product->name }}</span>
                                    <span class="text-slate-400 font-bold">Qty {{ $quantity }}</span>
                                </div>
                                <div class="flex justify-between text-xs">
                                    <span class="text-slate-600">Unit Price</span>
                                    <span class="text-slate-800 font-bold">₹{{ number_format($product->price, 2) }}</span>
                                </div>
                                <div class="pt-3 border-t border-slate-200 flex justify-between items-center">
                                    <span class="text-sm font-bold text-slate-800">Total</span>
                                    <span class="text-lg font-black text-slate-900">₹{{ number_format($product->price * $quantity, 2) }}</span>
                                </div>
                            </div>
                        </div>

                        @if(Auth::check())
                            <button wire:click="placeOrder" wire:loading.attr="disabled" class="w-full py-4 bg-[#4F7965] hover:bg-[#3D5F4F] text-white font-black rounded-2xl transition-all shadow-lg shadow-[#4F7965]/20 flex items-center justify-center gap-2">
                                <span wire:loading.remove>Submit Order</span>
                                <span wire:loading><i class="fas fa-spinner fa-spin"></i> Processing...</span>
                            </button>
                        @else
                            <button disabled class="w-full py-4 bg-[#4F7965]/50 text-white font-black rounded-2xl cursor-not-allowed">
                                Customer Account Required
                            </button>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
