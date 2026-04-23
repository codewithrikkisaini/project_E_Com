@extends('layouts.app')

@section('title', 'Get in Touch')

@section('content')
<section class="pt-20 pb-32 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-start">
            <!-- Left Info -->
            <div class="pt-10">
                <span class="text-green-700 font-bold uppercase tracking-widest text-sm mb-6 block">Contact Us</span>
                <h1 class="text-5xl md:text-6xl font-serif font-black text-slate-800 leading-tight mb-10">We'd Love to <span class="text-green-800 italic">Hear From You.</span></h1>
                <p class="text-xl text-slate-500 leading-relaxed font-medium mb-16">
                    Have questions about our natural products or need personalized advice? Reach out to our care team today.
                </p>

                <div class="space-y-12">
                    <div class="flex items-start gap-8">
                        <div class="w-16 h-16 bg-white rounded-3xl flex items-center justify-center text-green-700 shadow-sm border border-slate-100 flex-shrink-0">
                            <i class="fas fa-paper-plane text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="text-slate-900 font-black text-xl mb-2">Write to Us</h4>
                            <p class="text-slate-500 font-bold text-lg">contact.ritiksaini@gmail.com</p>
                            <p class="text-slate-400 font-medium mt-1">Direct support within 12 hours.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-8">
                        <div class="w-16 h-16 bg-white rounded-3xl flex items-center justify-center text-green-700 shadow-sm border border-slate-100 flex-shrink-0">
                            <i class="fas fa-phone-alt text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="text-slate-900 font-black text-xl mb-2">Speak with Us</h4>
                            <p class="text-slate-500 font-bold text-lg">+919719700483</p>
                            <p class="text-slate-400 font-medium mt-1">Mon - Fri, 9 am to 6 pm IST.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-20 pt-16 border-t border-slate-200 flex flex-wrap gap-6 items-center">
                    <p class="text-slate-900 font-black mr-4 uppercase tracking-widest text-sm">Follow the Journey</p>
                    <div class="flex gap-4">
                        @foreach(['whatsapp', 'facebook-f', 'instagram', 'twitter'] as $social)
                            <a href="#" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-slate-400 hover:bg-green-700 hover:text-white transition-all duration-300 shadow-sm">
                                <i class="fab fa-{{ $social }}"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Form -->
            <div class="bg-white rounded-[3.5rem] p-12 lg:p-16 shadow-2xl shadow-slate-200 border border-slate-50 relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-green-50 rounded-full blur-3xl opacity-60"></div>
                
                <h3 class="text-3xl font-serif font-black text-slate-800 mb-10 relative z-10">Send a Message</h3>
                
                <form action="#" class="space-y-8 relative z-10 font-medium">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-sm font-bold text-slate-700 ml-1">Your Name</label>
                            <input type="text" placeholder="John Doe" class="w-full px-8 py-5 bg-slate-50 rounded-2xl border-none focus:ring-2 focus:ring-green-700 transition-all duration-300 text-slate-900">
                        </div>
                        <div class="space-y-3">
                            <label class="text-sm font-bold text-slate-700 ml-1">Email Address</label>
                            <input type="email" placeholder="john@example.com" class="w-full px-8 py-5 bg-slate-50 rounded-2xl border-none focus:ring-2 focus:ring-green-700 transition-all duration-300 text-slate-900">
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-sm font-bold text-slate-700 ml-1">Subject</label>
                        <select class="w-full px-8 py-5 bg-slate-50 rounded-2xl border-none focus:ring-2 focus:ring-green-700 transition-all duration-300 appearance-none text-slate-900">
                            <option>Product Inquiries</option>
                            <option>Order Status</option>
                            <option>Wholesale Opportunities</option>
                            <option>General Support</option>
                        </select>
                    </div>

                    <div class="space-y-3">
                        <label class="text-sm font-bold text-slate-700 ml-1">Message Detail</label>
                        <textarea rows="5" placeholder="How can we assist you today?" class="w-full px-8 py-5 bg-slate-50 rounded-2xl border-none focus:ring-2 focus:ring-green-700 transition-all duration-300 resize-none text-slate-900"></textarea>
                    </div>

                    <button type="submit" class="w-full py-6 bg-[#6b624b] hover:bg-green-900 text-white font-black text-lg rounded-2xl shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        Send Inquiry
                        <i class="fas fa-paper-plane ml-3 text-sm"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
