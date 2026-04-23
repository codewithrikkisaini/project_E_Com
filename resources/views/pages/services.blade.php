@extends('layouts.public')

@section('content')
<section class="mx-auto w-full max-w-6xl px-4 pb-14 pt-14 sm:px-6">
    <h1 class="text-center text-5xl font-bold text-slate-900">Buy Products</h1>
    <p class="mx-auto mt-4 max-w-2xl text-center text-slate-600">Choose from trusted pharmaceutical products and place your order with a simple checkout flow.</p>

    <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=900&q=80" alt="Product one" class="h-56 w-full object-cover">
            <div class="p-5">
                <h2 class="text-lg font-semibold">NeuroBoost Elite</h2>
                <p class="mt-2 text-sm text-slate-600">Advanced cognitive support with balanced ingredients.</p>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-base font-semibold text-slate-900">₹1200</span>
                    <a href="{{ route('contact') }}" class="rounded-lg bg-[#22c55e] px-4 py-2 text-sm font-semibold text-white">Order</a>
                </div>
            </div>
        </article>

        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <img src="https://images.unsplash.com/photo-1631549916768-4119b4123a31?auto=format&fit=crop&w=900&q=80" alt="Product two" class="h-56 w-full object-cover">
            <div class="p-5">
                <h2 class="text-lg font-semibold">Nf-Xiverin 200</h2>
                <p class="mt-2 text-sm text-slate-600">Sustained release capsules crafted for reliable outcomes.</p>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-base font-semibold text-slate-900">₹980</span>
                    <a href="{{ route('contact') }}" class="rounded-lg bg-[#22c55e] px-4 py-2 text-sm font-semibold text-white">Order</a>
                </div>
            </div>
        </article>

        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <img src="https://images.unsplash.com/photo-1584362917165-526a968579e8?auto=format&fit=crop&w=900&q=80" alt="Product three" class="h-56 w-full object-cover">
            <div class="p-5">
                <h2 class="text-lg font-semibold">GlucoShield Plus</h2>
                <p class="mt-2 text-sm text-slate-600">Daily diabetes support designed for modern routines.</p>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-base font-semibold text-slate-900">₹760</span>
                    <a href="{{ route('contact') }}" class="rounded-lg bg-[#22c55e] px-4 py-2 text-sm font-semibold text-white">Order</a>
                </div>
            </div>
        </article>
    </div>
</section>
@endsection
