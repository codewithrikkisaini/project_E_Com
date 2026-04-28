@php
    $settings = \App\Models\SiteSetting::whereIn('key', [
        'banner_title',
        'banner_description',
        'banner_button1_text',
        'banner_button1_url',
        'banner_button2_text',
        'banner_button2_url',
        'banner_image',
        'settings_iso_certification',
        'settings_website_name'
    ])->pluck('value', 'key');

    $bannerTitle = $settings['banner_title'] ?? 'Trusted Quality Medicines Partner in India';
    $bannerDesc = $settings['banner_description'] ?? 'For over 10 years, Admin has been the trusted partner for healthcare professionals and entrepreneurs. With ISO 0000:2026 certification, 50+ quality products, and a nationwide network of 10,000+ healthcare partners, we\'re your reliable gateway to pharmaceutical excellence.';
    $btn1Text = $settings['banner_button1_text'] ?? 'Buy Now';
    $btn1Url = $settings['banner_button1_url'] ?? route('products');
    $btn2Text = $settings['banner_button2_text'] ?? 'Order on WhatsApp';
    $btn2Url = $settings['banner_button2_url'] ?? '#';
    $bannerImage = $settings['banner_image'] ?? null;
    $isoCert = $settings['settings_iso_certification'] ?? 'ISO 0000:2026 Certified';
    $siteName = $settings['settings_website_name'] ?? 'Admin';
@endphp

@component('layouts.app')
<!-- Hero Section -->
<div class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden min-h-[80vh] flex items-center bg-[#F9F9F6]">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 z-0">
        <div
            class="absolute top-0 right-0 w-[800px] h-[800px] bg-[#F0F4F0] rounded-full opacity-60 transform translate-x-1/3 -translate-y-1/4 blur-3xl">
        </div>
        <div
            class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-[#F2EFE8] rounded-full opacity-60 transform -translate-x-1/4 translate-y-1/4 blur-3xl">
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <!-- Text Content -->
            <div class="text-center lg:text-left">
                <h1
                    class="text-5xl lg:text-6xl xl:text-[68px] font-bold text-[#1F1F1F] mb-6 leading-[1.1] tracking-tight">
                    {{ $bannerTitle }}
                </h1>

                <p class="text-lg text-slate-600 mb-8 max-w-xl mx-auto lg:mx-0 leading-relaxed whitespace-pre-line">
                    {{ $bannerDesc }}
                </p>

                <!-- Certification Box -->
                @if($isoCert)
                    <div
                        class="bg-white rounded-xl p-4 mb-10 flex items-center gap-4 max-w-sm mx-auto lg:mx-0 shadow-sm border border-slate-100">
                        <div class="text-slate-800 text-xl font-bold px-2">
                            <svg class="w-6 h-6 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                        </div>
                        <div class="text-left border-l pl-4 border-slate-200">
                            <p class="text-[13px] font-bold text-slate-900">{{ $isoCert }}</p>
                            <p class="text-xs text-slate-500 font-medium">{{ $siteName }}</p>
                        </div>
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center gap-4 justify-center lg:justify-start">
                    @if($btn1Text)
                        <a href="{{ $btn1Url }}"
                            class="w-full sm:w-auto px-8 py-3.5 bg-[#67826B] text-white text-sm font-bold rounded-lg hover:bg-[#526a56] transition-colors flex items-center justify-center gap-2 shadow-sm">
                            {{ $btn1Text }} <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    @endif
                    @if($btn2Text)
                        <a href="{{ $btn2Url }}"
                            class="w-full sm:w-auto px-8 py-3.5 bg-[#25D366] text-white text-sm font-bold rounded-lg hover:bg-[#20bd5a] transition-colors flex items-center justify-center gap-2 shadow-sm">
                            <i class="fab fa-whatsapp text-lg"></i> {{ $btn2Text }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- Visual Content (White Card) -->

            <div class="relative w-full max-w-lg mx-auto lg:mx-0 lg:ml-auto">
                <div
                    class="bg-white rounded-[1rem] shadow-[0_20px_50px_-12px_rgba(0,0,0,0.1)] p-4 transform transition-transform hover:scale-[1.02] duration-500 border border-slate-100">

                    <div class="rounded-lg overflow-hidden aspect-[4/3] bg-slate-50 relative">
                        @if($bannerImage)
                            <img src="{{ Storage::url($bannerImage) }}" alt="Hero Banner"
                                class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('img/hero-banner.png') }}" alt="Hero Banner"
                                class="w-full h-full object-cover">
                        @endif
                    </div>

                    <div class="mt-6 mb-4 text-center px-4">
                        <h3 class="text-[17px] font-bold text-slate-800">{{ $bannerTitle }}</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endcomponent