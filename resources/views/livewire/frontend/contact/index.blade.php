<div>
    <!-- Page Header -->
    <div class="pt-32 pb-16 bg-[#fdfcfb] relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-[#f4ebd0] rounded-l-full opacity-30 transform translate-x-1/2"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl lg:text-5xl font-serif font-black text-slate-800 mb-4">Contact Us</h1>
            <p class="text-slate-600 max-w-2xl mx-auto">Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
        </div>
    </div>

    <!-- Content -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                <!-- Contact Info -->
                <div>
                    <h2 class="text-3xl font-serif font-black text-slate-800 mb-8">Get in Touch</h2>
                    
                    <div class="space-y-8">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center text-green-700 shrink-0">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-slate-800 mb-1">Our Location</h4>
                                <p class="text-slate-600">{{ $site_settings['settings_address'] ?? '123 Nature\'s Way, Green Valley, CA 90210' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center text-green-700 shrink-0">
                                <i class="fas fa-phone-alt text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-slate-800 mb-1">Phone Number</h4>
                                <p class="text-slate-600">{{ $site_settings['settings_mobiles'] ?? '+91 97197 00483' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center text-green-700 shrink-0">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-slate-800 mb-1">Email Address</h4>
                                <p class="text-slate-600">{{ $site_settings['settings_email'] ?? 'contact.ritiksaini@gmail.com' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100">
                    @if (session()->has('success'))
                        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-xl border border-green-200">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="submit" class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Full Name</label>
                            <input type="text" wire:model="name" class="w-full px-4 py-3 rounded-xl border-slate-200 focus:ring-green-500 focus:border-green-500 bg-white shadow-sm @error('name') border-red-500 @enderror" placeholder="John Doe">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                                <input type="email" wire:model="email" class="w-full px-4 py-3 rounded-xl border-slate-200 focus:ring-green-500 focus:border-green-500 bg-white shadow-sm @error('email') border-red-500 @enderror" placeholder="john@example.com">
                                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Phone Number</label>
                                <input type="text" wire:model="phone" class="w-full px-4 py-3 rounded-xl border-slate-200 focus:ring-green-500 focus:border-green-500 bg-white shadow-sm @error('phone') border-red-500 @enderror" placeholder="+91 ...">
                                @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Subject</label>
                            <input type="text" wire:model="subject" class="w-full px-4 py-3 rounded-xl border-slate-200 focus:ring-green-500 focus:border-green-500 bg-white shadow-sm" placeholder="How can we help?">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Message</label>
                            <textarea wire:model="message" rows="4" class="w-full px-4 py-3 rounded-xl border-slate-200 focus:ring-green-500 focus:border-green-500 bg-white shadow-sm @error('message') border-red-500 @enderror" placeholder="Write your message..."></textarea>
                            @error('message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        
                        <button type="submit" class="w-full py-4 bg-[#1e4620] text-white text-sm font-black uppercase tracking-widest rounded-xl hover:bg-green-900 transition-colors shadow-lg shadow-green-900/20 disabled:opacity-50" wire:loading.attr="disabled">
                            <span wire:loading.remove>Send Message</span>
                            <span wire:loading><i class="fas fa-spinner fa-spin mr-2"></i> Sending...</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
