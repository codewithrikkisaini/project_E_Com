@extends('layouts.public')

@section('content')
<section class="mx-auto w-full max-w-6xl px-4 pb-14 pt-14 sm:px-6">
    <div class="rounded-3xl bg-[#f5f6f4] px-6 py-14 text-center">
        <h1 class="text-5xl font-bold text-slate-900">Pharma Insights & Updates</h1>
        <p class="mx-auto mt-4 max-w-3xl text-base leading-7 text-slate-600">Latest articles, research, and wellness updates from Admin. Discover expert-backed guidance across pharma, health, and lifestyle.</p>
    </div>

    <div class="mt-10 rounded-xl border border-slate-200 bg-white p-4">
        <input type="text" placeholder="Search articles by title or content..." class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-[#2d7138]">
    </div>

    <div class="mt-5 flex flex-wrap items-center gap-2 text-sm">
        <span class="rounded-full bg-[#5b8f6b] px-4 py-2 font-semibold text-white">All Categories</span>
        <span class="rounded-full border border-slate-300 px-4 py-2 text-slate-700">Diabetes (1)</span>
        <span class="rounded-full border border-slate-300 px-4 py-2 text-slate-700">Sugar (1)</span>
    </div>

    <div class="mt-8 grid gap-6 md:grid-cols-2">
        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <img src="https://images.unsplash.com/photo-1585435557343-3b092031a831?auto=format&fit=crop&w=1400&q=80" alt="Blog one" class="h-56 w-full object-cover">
            <div class="p-5">
                <p class="text-xs text-slate-500">Apr 12, 2026</p>
                <h2 class="mt-2 text-3xl font-semibold text-slate-900">Diabetes Medicines</h2>
                <p class="mt-3 text-sm leading-6 text-slate-600">Diabetes is a disease in which your blood glucose, or blood sugar, levels are too high. Glucose comes from the foods you eat.</p>
                <a href="#" class="mt-4 inline-block text-sm font-semibold text-[#2d7138]">Read more</a>
            </div>
        </article>

        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <img src="https://images.unsplash.com/photo-1585435557343-3b092031a831?auto=format&fit=crop&w=1400&q=80" alt="Blog two" class="h-56 w-full object-cover">
            <div class="p-5">
                <p class="text-xs text-slate-500">Apr 12, 2026</p>
                <h2 class="mt-2 text-3xl font-semibold text-slate-900">Oral & Injectable Medications for Type 2 Diabetes</h2>
                <p class="mt-3 text-sm leading-6 text-slate-600">People with type 2 diabetes can use various medications other than insulin to help manage their diabetes effectively.</p>
                <a href="#" class="mt-4 inline-block text-sm font-semibold text-[#2d7138]">Read more</a>
            </div>
        </article>
    </div>
</section>
@endsection
