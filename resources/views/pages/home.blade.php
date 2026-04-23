@extends('layouts.public')

@section('content')
<section class="mx-auto w-full max-w-6xl px-4 pb-14 pt-12 sm:px-6">
    <div class="grid gap-8 lg:grid-cols-2">
        <div class="space-y-6">
            <h1 class="text-4xl font-bold leading-tight text-slate-900 sm:text-6xl">Trusted Quality Medicines Partner in India</h1>
            <p class="max-w-xl text-sm leading-7 text-slate-600 sm:text-base">For over 10 years, Admin has been the trusted partner for healthcare professionals and retail partners. With ISO 0000:2026 certification, 500+ quality products and nationwide network of 10,000+ healthcare partners, we are your reliable gateway to pharmaceutical excellence.</p>

            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-sm font-semibold text-slate-900">ISO 0000:2026 Certified</p>
                <p class="text-xs text-slate-500">Admin</p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('services') }}" class="rounded-lg bg-[#6f7053] px-6 py-3 text-sm font-semibold text-white">Buy Now</a>
                <a href="{{ route('contact') }}" class="rounded-lg bg-[#22c55e] px-6 py-3 text-sm font-semibold text-white">Order on WhatsApp</a>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-lg">
            <img src="https://images.unsplash.com/photo-1587854692152-cbe660dbde88?auto=format&fit=crop&w=1200&q=80" alt="Medicine product" class="h-80 w-full rounded-xl object-cover sm:h-[360px]">
            <p class="mt-4 text-center text-sm font-semibold text-slate-800">Trusted Quality Medicines Partner in India</p>
        </div>
    </div>
</section>

<section class="bg-[#111419] py-10 text-white">
    <div class="mx-auto grid w-full max-w-6xl gap-6 px-4 sm:grid-cols-3 sm:px-6">
        <div class="text-center">
            <p class="text-4xl font-bold text-emerald-300">10+</p>
            <p class="mt-2 text-sm text-slate-200">Decade of Industry Expertise</p>
        </div>
        <div class="text-center">
            <p class="text-4xl font-bold text-emerald-300">50+</p>
            <p class="mt-2 text-sm text-slate-200">Quality Products</p>
        </div>
        <div class="text-center">
            <p class="text-4xl font-bold text-emerald-300">20+</p>
            <p class="mt-2 text-sm text-slate-200">Healthcare Partners</p>
        </div>
    </div>
</section>

<section class="mx-auto w-full max-w-6xl px-4 py-14 sm:px-6">
    <p class="text-center text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Single Product Checkout</p>
    <h2 class="mt-2 text-center text-3xl font-bold text-slate-900">Order Directly From Home</h2>
    <p class="mt-2 text-center text-sm text-slate-500">Select quantity, pay via QR, upload screenshot, and track your order in one flow.</p>

    <div class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <img src="https://images.unsplash.com/photo-1585435557343-3b092031a831?auto=format&fit=crop&w=1400&q=80" alt="Product checkout" class="h-[460px] w-full object-cover">
        <div class="space-y-3 p-6">
            <h3 class="text-2xl font-semibold">NeuroBoost Elite - Advanced Cognitive Support</h3>
            <div class="grid gap-2 text-sm text-slate-600 sm:grid-cols-3">
                <p>Price: <span class="font-semibold text-slate-900">₹1200</span></p>
                <p>Category: General</p>
                <p>Stock: 145</p>
            </div>
            <p class="text-sm leading-6 text-slate-600">A premium, clinically-formulated medicine designed to enhance mental clarity, focus, and memory retention. Ideal for professionals and students seeking peak cognitive performance.</p>
            <div class="flex gap-3 pt-2">
                <a href="{{ route('services') }}" class="flex-1 rounded-lg bg-[#6f7053] px-5 py-3 text-center text-sm font-semibold text-white">Buy Now</a>
                <a href="{{ route('contact') }}" class="flex-1 rounded-lg bg-[#22c55e] px-5 py-3 text-center text-sm font-semibold text-white">Order on WhatsApp</a>
            </div>
        </div>
    </div>
</section>

<section class="mx-auto w-full max-w-6xl px-4 pb-14 sm:px-6">
    <h2 class="text-center text-4xl font-bold text-slate-900">Why Choose Admin?</h2>
    <p class="mt-2 text-center text-sm text-slate-500">We combine years of pharmaceutical expertise with transparent partnerships.</p>
    <div class="mt-8 grid gap-4 md:grid-cols-3">
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm"><h3 class="font-semibold">ISO 0000:2026 Certified</h3><p class="mt-2 text-sm text-slate-600">Meets international quality management standards.</p></div>
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm"><h3 class="font-semibold">High Profit Margins</h3><p class="mt-2 text-sm text-slate-600">Competitive pricing with generous margins for channel partners.</p></div>
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm"><h3 class="font-semibold">Reliable Distribution</h3><p class="mt-2 text-sm text-slate-600">Structured distribution process across varied markets.</p></div>
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm"><h3 class="font-semibold">Marketing Support</h3><p class="mt-2 text-sm text-slate-600">Campaigns and digital assets to boost visibility.</p></div>
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm"><h3 class="font-semibold">Expert Training</h3><p class="mt-2 text-sm text-slate-600">Education sessions on products and techniques.</p></div>
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm"><h3 class="font-semibold">Fast Expansion</h3><p class="mt-2 text-sm text-slate-600">Rapid outreach with robust supply chain integration.</p></div>
    </div>
</section>
@endsection
