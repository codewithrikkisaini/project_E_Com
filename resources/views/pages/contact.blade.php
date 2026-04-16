@extends('layouts.public')

@section('content')
<section class="grid gap-6 rounded-3xl border border-white/10 bg-white/5 p-8 md:grid-cols-2 md:p-12">
    <div>
        <p class="text-xs font-bold tracking-[0.18em] text-cyan-200">CONTACT</p>
        <h1 class="mt-3 text-4xl font-black">Let us build your next store</h1>
        <p class="mt-4 text-slate-300">Phone, email ya direct visit se contact karein. Team fast response degi.</p>

        <div class="mt-8 space-y-3 text-sm text-slate-200">
            <p><span class="font-bold text-cyan-200">Email:</span> hello@ecom.local</p>
            <p><span class="font-bold text-cyan-200">Phone:</span> +91 90000 00000</p>
            <p><span class="font-bold text-cyan-200">Address:</span> Jaipur, Rajasthan, India</p>
        </div>
    </div>

    <form class="space-y-4 rounded-2xl border border-white/10 bg-slate-900/70 p-6">
        <input type="text" placeholder="Your Name" class="w-full rounded-xl border border-white/15 bg-white/5 px-4 py-3 outline-none ring-cyan-300 focus:ring" />
        <input type="email" placeholder="Your Email" class="w-full rounded-xl border border-white/15 bg-white/5 px-4 py-3 outline-none ring-cyan-300 focus:ring" />
        <textarea rows="4" placeholder="Your Message" class="w-full rounded-xl border border-white/15 bg-white/5 px-4 py-3 outline-none ring-cyan-300 focus:ring"></textarea>
        <button type="button" class="w-full rounded-xl bg-cyan-500 px-4 py-3 font-bold text-slate-950 hover:bg-cyan-400">Send Message</button>
    </form>
</section>
@endsection
