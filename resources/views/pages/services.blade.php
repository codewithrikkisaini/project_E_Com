@extends('layouts.public')

@section('content')
<section>
    <p class="text-xs font-bold tracking-[0.18em] text-cyan-200">SERVICES</p>
    <h1 class="mt-3 text-4xl font-black sm:text-5xl">Aapke business ke liye complete service stack</h1>

    <div class="mt-8 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
        <article class="rounded-2xl border border-cyan-300/20 bg-cyan-500/10 p-5">
            <h2 class="text-lg font-bold">Store Setup</h2>
            <p class="mt-2 text-sm text-slate-300">Product catalog, pricing, and category setup with clean UI.</p>
        </article>
        <article class="rounded-2xl border border-emerald-300/20 bg-emerald-500/10 p-5">
            <h2 class="text-lg font-bold">Admin Panel</h2>
            <p class="mt-2 text-sm text-slate-300">Login ke baad secure backend dashboard for complete control.</p>
        </article>
        <article class="rounded-2xl border border-amber-300/20 bg-amber-500/10 p-5">
            <h2 class="text-lg font-bold">Order Management</h2>
            <p class="mt-2 text-sm text-slate-300">Orders track, status manage, and customer handling workflows.</p>
        </article>
        <article class="rounded-2xl border border-fuchsia-300/20 bg-fuchsia-500/10 p-5">
            <h2 class="text-lg font-bold">Brand Design</h2>
            <p class="mt-2 text-sm text-slate-300">Creative sections, trust-building visuals, and conversion-driven layout.</p>
        </article>
    </div>
</section>
@endsection
