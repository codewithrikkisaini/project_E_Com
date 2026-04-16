@extends('layouts.public')

@section('content')
<section class="rounded-3xl border border-white/10 bg-white/5 p-8 md:p-12">
    <p class="text-xs font-bold tracking-[0.18em] text-cyan-200">ABOUT US</p>
    <h1 class="mt-3 text-4xl font-black sm:text-5xl">Hum Digital Commerce ko Simple banate hain</h1>
    <p class="mt-5 max-w-3xl text-slate-300">Hamari team ka focus hai ki business owners bina technical tension ke online sell kar saken. Fast design, practical features aur strong admin control ke saath hum growth-ready solutions banate hain.</p>

    <div class="mt-8 grid gap-4 md:grid-cols-3">
        <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-5">
            <h2 class="font-bold text-cyan-200">Vision</h2>
            <p class="mt-2 text-sm text-slate-300">Har local brand ko global-ready ecommerce presence dena.</p>
        </div>
        <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-5">
            <h2 class="font-bold text-cyan-200">Mission</h2>
            <p class="mt-2 text-sm text-slate-300">Design + technology ka best mix dekar online sales boost karna.</p>
        </div>
        <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-5">
            <h2 class="font-bold text-cyan-200">Approach</h2>
            <p class="mt-2 text-sm text-slate-300">Simple UX, secure login flow, aur scalable backend architecture.</p>
        </div>
    </div>
</section>
@endsection
