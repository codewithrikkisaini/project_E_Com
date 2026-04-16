@extends('layouts.public')

@section('content')
<section class="mx-auto max-w-lg rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl shadow-cyan-500/10 md:p-10">
    <p class="text-xs font-bold tracking-[0.18em] text-cyan-200">LOGIN</p>
    <h1 class="mt-3 text-3xl font-black">Backend Access</h1>
    <p class="mt-2 text-sm text-slate-300">Login karo aur direct admin dashboard open hoga.</p>

    @if ($errors->any())
        <div class="mt-4 rounded-xl border border-rose-300/30 bg-rose-500/10 px-4 py-3 text-sm text-rose-200">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.store') }}" class="mt-6 space-y-4">
        @csrf

        <div>
            <label for="email" class="mb-1 block text-sm font-semibold text-slate-200">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus class="w-full rounded-xl border border-white/15 bg-white/5 px-4 py-3 outline-none ring-cyan-300 focus:ring" />
        </div>

        <div>
            <label for="password" class="mb-1 block text-sm font-semibold text-slate-200">Password</label>
            <input id="password" name="password" type="password" required class="w-full rounded-xl border border-white/15 bg-white/5 px-4 py-3 outline-none ring-cyan-300 focus:ring" />
        </div>

        <label class="flex items-center gap-2 text-sm text-slate-300">
            <input type="checkbox" name="remember" class="rounded border-white/20 bg-white/10 text-cyan-400" />
            Remember me
        </label>

        <button type="submit" class="w-full rounded-xl bg-cyan-500 px-4 py-3 font-bold text-slate-950 hover:bg-cyan-400">Login & Open Backend</button>
    </form>

    <p class="mt-5 text-xs text-slate-400">Seeded default login: <span class="font-semibold text-slate-200">test@example.com</span> / <span class="font-semibold text-slate-200">password</span></p>
</section>
@endsection
