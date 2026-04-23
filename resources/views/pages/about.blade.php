@extends('layouts.public')

@section('content')
<section class="mx-auto w-full max-w-6xl px-4 pb-12 pt-14 sm:px-6">
    <h1 class="text-center text-5xl font-bold text-slate-900">About Us</h1>
    <p class="mx-auto mt-4 max-w-3xl text-center text-base leading-7 text-slate-600">Admin is a trusted pharmaceutical distribution partner focused on quality medicines, reliable service, and long-term healthcare impact across India.</p>

    <div class="mt-10 grid gap-5 md:grid-cols-3">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900">Our Vision</h2>
            <p class="mt-3 text-sm leading-6 text-slate-600">To become the most trusted and transparent medicine partner for retailers, hospitals, and healthcare professionals nationwide.</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900">Our Mission</h2>
            <p class="mt-3 text-sm leading-6 text-slate-600">Deliver quality products, expert support, and efficient distribution while ensuring compliance, affordability, and customer-first service.</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900">Our Promise</h2>
            <p class="mt-3 text-sm leading-6 text-slate-600">Every order is handled with care, consistency, and accountability so partners can focus on patient care and business growth.</p>
        </div>
    </div>
</section>
@endsection
