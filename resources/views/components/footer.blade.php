<footer class="pt-24 pb-12 overflow-hidden relative" style="background-color: {{ $site_settings['settings_header_footer_color'] ?? '#020617' }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center md:text-left">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20 text-white">
            <div class="space-y-6">
                 @if(!empty($site_settings['settings_dark_logo']))
                     <img src="{{ Storage::url($site_settings['settings_dark_logo']) }}" alt="{{ $site_settings['settings_website_name'] ?? 'Logo' }}" class="h-12 object-contain mb-4">
                 @else
                     <h2 class="text-2xl font-serif font-black">{{ $site_settings['settings_website_name'] ?? "Nick's & Morris" }}</h2>
                 @endif
                 <p class="text-slate-400">{{ $site_settings['settings_footer_text'] ?? "Premium natural products for a healthy life." }}</p>
                 <div class="flex gap-4 pt-4 justify-center md:justify-start">
                     @if(!empty($site_settings['settings_whatsapp']))
                         <a href="{{ $site_settings['settings_whatsapp'] }}" target="_blank" class="hover:text-green-400 transition-colors"><i class="fab fa-whatsapp text-xl"></i></a>
                     @endif
                     @if(!empty($site_settings['settings_facebook']))
                         <a href="{{ $site_settings['settings_facebook'] }}" target="_blank" class="hover:text-green-400 transition-colors"><i class="fab fa-facebook-f text-xl"></i></a>
                     @endif
                     @if(!empty($site_settings['settings_instagram']))
                         <a href="{{ $site_settings['settings_instagram'] }}" target="_blank" class="hover:text-green-400 transition-colors"><i class="fab fa-instagram text-xl"></i></a>
                     @endif
                     @if(!empty($site_settings['settings_youtube']))
                         <a href="{{ $site_settings['settings_youtube'] }}" target="_blank" class="hover:text-green-400 transition-colors"><i class="fab fa-youtube text-xl"></i></a>
                     @endif
                 </div>
            </div>
            <div>
                <h3 class="font-bold mb-6 text-lg">Contact Us</h3>
                <ul class="text-slate-400 space-y-4">
                    @if(!empty($site_settings['settings_address']))
                        <li class="flex gap-3"><i class="fas fa-map-marker-alt mt-1 text-green-400"></i> <span>{{ $site_settings['settings_address'] }}</span></li>
                    @endif
                    @if(!empty($site_settings['settings_mobiles']))
                        <li class="flex gap-3"><i class="fas fa-phone mt-1 text-green-400"></i> <span>{{ $site_settings['settings_mobiles'] }}</span></li>
                    @endif
                    @if(!empty($site_settings['settings_email']))
                        <li class="flex gap-3"><i class="fas fa-envelope mt-1 text-green-400"></i> <span>{{ $site_settings['settings_email'] }}</span></li>
                    @endif
                </ul>
            </div>
            <div>
                <h3 class="font-bold mb-6 text-lg">Explore</h3>
                <ul class="text-slate-400 space-y-4">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('products') }}" class="hover:text-white transition">Products</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a></li>
                </ul>
            </div>
        </div>
        <p class="text-slate-500 text-sm border-t border-slate-800 pt-8 mt-8 text-center">© {{ date('Y') }} {{ $site_settings['settings_website_name'] ?? "Nick's & Morris" }}. All rights reserved.</p>
    </div>
</footer>
