@extends('layouts.public')

@section('content')
<section class="grid gap-8 rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl shadow-cyan-500/10 md:grid-cols-2 md:p-12">
    <div>
        <p class="mb-3 inline-flex rounded-full border border-cyan-300/40 bg-cyan-400/10 px-3 py-1 text-xs font-bold tracking-[0.18em] text-cyan-200">WELCOME</p>
        <h1 class="text-4xl font-black leading-tight sm:text-5xl">Build Fast.<br>Sell Smart.<br>Grow Daily.</h1>
        <p class="mt-5 max-w-xl text-slate-300">Yeh aapka modern ecommerce frontend hai. Ab visitors directly Home, About, Services aur Contact pages dekh sakte hain.</p>
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('services') }}" class="rounded-xl bg-cyan-500 px-5 py-3 font-bold text-slate-950 hover:bg-cyan-400">Explore Services</a>
            <a href="{{ route('contact') }}" class="rounded-xl border border-white/20 px-5 py-3 font-bold hover:bg-white/10">Contact Us</a>
        </div>
    </div>
    <div class="rounded-2xl border border-cyan-300/20 bg-gradient-to-br from-cyan-400/20 via-emerald-300/10 to-slate-900 p-6">
        <h2 class="text-xl font-bold text-cyan-200">Quick Highlights</h2>
        <ul class="mt-4 space-y-3 text-slate-200">
            <li class="rounded-xl bg-white/5 p-3">Responsive frontend for all devices</li>
            <li class="rounded-xl bg-white/5 p-3">Simple login to open backend dashboard</li>
            <li class="rounded-xl bg-white/5 p-3">Clean base ready for content updates</li>
        </ul>
    </div>
</section>
@endsection
