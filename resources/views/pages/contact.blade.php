@extends('layouts.public')

@section('content')
<section class="mx-auto w-full max-w-6xl px-4 pb-16 pt-12 sm:px-6">
    <div class="rounded-3xl bg-[#f5f6f4] py-8 text-center">
        <h1 class="text-6xl font-bold text-slate-900">Get in Touch</h1>
        <p class="mx-auto mt-4 max-w-3xl text-base leading-7 text-slate-600">We'd love to hear from you. Have a question about our pharmaceutical solutions? Reach out to our team and we'll get back to you as soon as possible.</p>
    </div>

    <div class="mt-8 grid gap-4 md:grid-cols-3">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-semibold text-slate-500">Phone</p>
            <p class="mt-3 text-lg font-semibold text-slate-900">+919719700483</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-semibold text-slate-500">Email</p>
            <p class="mt-3 text-lg font-semibold text-[#2d7138]">contact.ritiksaini@gmail.com</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-semibold text-slate-500">Office</p>
            <p class="mt-3 text-sm leading-6 text-slate-700">6th Floor, Premiere House 1, Opp Gurudwara, Bodakdev, Ahmedabad City, Ahmedabad - 380054, Gujrat</p>
        </div>
    </div>

    <div class="mt-6 grid overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm lg:grid-cols-2">
        <form class="space-y-4 p-8">
            <h2 class="text-4xl font-bold text-slate-900">Send us a Message</h2>
            <p class="text-sm text-slate-500">Fill out the form below and we'll respond to your inquiry within 24 hours.</p>
            <input type="text" placeholder="John Doe" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-[#2d7138]">
            <input type="email" placeholder="john@example.com" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-[#2d7138]">
            <input type="text" placeholder="+91-7827-488844" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-[#2d7138]">
            <input type="text" placeholder="Inquiry about..." class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-[#2d7138]">
            <textarea rows="4" placeholder="Please provide details about your inquiry..." class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-[#2d7138]"></textarea>
            <button type="button" class="w-full rounded-xl bg-[#3d7e56] px-4 py-3 text-sm font-semibold text-white">Send Message</button>
        </form>

        <div class="space-y-5 bg-[#f8f8f6] p-8">
            <h3 class="text-4xl font-bold text-slate-900">Why Contact Us?</h3>
            <ul class="space-y-3 text-sm text-slate-700">
                <li><span class="font-semibold text-slate-900">Expert Consultation</span><br>Get advice from our pharmaceutical experts.</li>
                <li><span class="font-semibold text-slate-900">Quick Response</span><br>We respond to all inquiries within 24 hours.</li>
                <li><span class="font-semibold text-slate-900">Professional Support</span><br>Dedicated support from our professional team.</li>
                <li><span class="font-semibold text-slate-900">Confidential</span><br>All inquiries are kept strictly confidential.</li>
            </ul>
            <div class="grid gap-3 sm:grid-cols-2">
                <a href="https://wa.me/919719700483" class="rounded-xl bg-[#22c55e] px-4 py-3 text-center text-sm font-semibold text-white">WhatsApp</a>
                <a href="tel:+919719700483" class="rounded-xl border border-[#3d7e56] px-4 py-3 text-center text-sm font-semibold text-[#3d7e56]">Call</a>
            </div>
        </div>
    </div>

    <div class="mt-16">
        <h2 class="text-center text-4xl font-bold text-slate-900">Frequently Asked Questions</h2>
        <p class="mt-2 text-center text-sm text-slate-500">Common questions about our services</p>
        <div class="mx-auto mt-8 max-w-4xl space-y-3">
            <div class="rounded-xl border border-slate-200 bg-white px-5 py-4 text-sm font-medium text-slate-800">What pharmaceutical products do you offer?</div>
            <div class="rounded-xl border border-slate-200 bg-white px-5 py-4 text-sm font-medium text-slate-800">How quickly can you respond to my inquiry?</div>
            <div class="rounded-xl border border-slate-200 bg-white px-5 py-4 text-sm font-medium text-slate-800">Do you offer bulk orders or B2B solutions?</div>
            <div class="rounded-xl border border-slate-200 bg-white px-5 py-4 text-sm font-medium text-slate-800">Is my information secure when I submit a form?</div>
        </div>
    </div>
</section>
@endsection
