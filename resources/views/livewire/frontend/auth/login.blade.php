<div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-[#f8fbfd] to-[#e2f0fb] p-4 relative overflow-hidden">
    <!-- Ambient Background Blur Effects -->
    <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-blue-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-cyan-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>

    <div class="w-full max-w-md z-10 mt-[-5vh]">
        <!-- Logo Area -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center space-x-1 text-slate-800 mb-1">
                <div class="flex items-center justify-center">
                    <svg class="w-16 h-16" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Left angle -->
                        <path d="M30 40 L20 50 L30 60" stroke="#777" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20 50 L10 50" stroke="#777" stroke-width="2" stroke-linecap="round"/>
                        
                        <!-- Middle N -->
                        <text x="50" y="62" font-family="sans-serif" font-weight="900" font-size="36" fill="#333" text-anchor="middle">N</text>
                        
                        <!-- Right angle -->
                        <path d="M70 40 L80 50 L70 60" stroke="#777" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M80 50 L90 50" stroke="#777" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            <h2 class="text-slate-800 font-bold text-xl leading-tight font-serif mt-[-10px]">Nick's & Morris</h2>
            <p class="text-slate-400 text-[10px] font-medium uppercase tracking-[0.2em] mt-1">Care for life</p>
        </div>

        <!-- Header Area -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-slate-800 mb-3 tracking-tight">Welcome Back</h1>
            <p class="text-slate-500 font-medium text-sm">Sign in to your account to continue</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white/90 backdrop-blur-sm rounded-[24px] shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-8 border border-white">
            <form wire:submit.prevent="login" class="space-y-6">
                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 mb-2 tracking-wide">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-at text-blue-500/80 text-sm"></i>
                        </div>
                        <input wire:model="email" id="email" type="email" required 
                            class="w-full pl-11 pr-4 py-3.5 bg-[#f8fafc] border border-slate-200/80 rounded-xl text-slate-800 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors placeholder:text-slate-400" 
                            placeholder="you@example.com">
                    </div>
                    @error('email') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs font-bold text-slate-700 mb-2 tracking-wide">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-blue-500/80 text-sm"></i>
                        </div>
                        <input wire:model="password" id="password" type="{{ $showPassword ? 'text' : 'password' }}" required 
                            class="w-full pl-11 pr-12 py-3.5 bg-[#f8fafc] border border-slate-200/80 rounded-xl text-slate-800 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors placeholder:text-slate-400 tracking-widest" 
                            placeholder="••••••••">
                        <button type="button" wire:click="togglePasswordVisibility" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none transition-colors">
                            <i class="fa-solid {{ $showPassword ? 'fa-eye-slash' : 'fa-eye' }} text-sm"></i>
                        </button>
                    </div>
                    @error('password') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center cursor-pointer group">
                        <input wire:model="remember" type="checkbox" class="w-4 h-4 rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500/20 cursor-pointer transition-colors group-hover:border-blue-400">
                        <span class="ml-2.5 text-sm text-slate-600 font-medium group-hover:text-slate-800 transition-colors">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-700 font-semibold transition-colors">Forgot password?</a>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" class="w-full flex items-center justify-center py-3.5 px-4 rounded-xl text-white font-semibold text-sm bg-gradient-to-r from-[#2563eb] to-[#0ea5e9] hover:from-[#1d4ed8] hover:to-[#0284c7] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all shadow-lg shadow-blue-500/30 transform hover:-translate-y-0.5 active:translate-y-0">
                        <span wire:loading.remove wire:target="login">Sign in</span>
                        <span wire:loading wire:target="login">Signing in...</span>
                        <i class="fa-solid fa-arrow-right ml-2 text-xs" wire:loading.remove wire:target="login"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
