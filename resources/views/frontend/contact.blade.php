@component('layouts.app')
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
                                <p class="text-slate-600">123 Nature's Way<br>Green Valley, CA 90210</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center text-green-700 shrink-0">
                                <i class="fas fa-phone-alt text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-slate-800 mb-1">Phone Number</h4>
                                <p class="text-slate-600">+91 97197 00483</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center text-green-700 shrink-0">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-slate-800 mb-1">Email Address</h4>
                                <p class="text-slate-600">contact.ritiksaini@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100">
                    <form class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Full Name</label>
                            <input type="text" class="w-full px-4 py-3 rounded-xl border-slate-200 focus:ring-green-500 focus:border-green-500 bg-white shadow-sm" placeholder="John Doe">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                            <input type="email" class="w-full px-4 py-3 rounded-xl border-slate-200 focus:ring-green-500 focus:border-green-500 bg-white shadow-sm" placeholder="john@example.com">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Message</label>
                            <textarea rows="4" class="w-full px-4 py-3 rounded-xl border-slate-200 focus:ring-green-500 focus:border-green-500 bg-white shadow-sm" placeholder="How can we help you?"></textarea>
                        </div>
                        
                        <button type="button" class="w-full py-4 bg-[#1e4620] text-white text-sm font-black uppercase tracking-widest rounded-xl hover:bg-green-900 transition-colors shadow-lg shadow-green-900/20">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endcomponent
