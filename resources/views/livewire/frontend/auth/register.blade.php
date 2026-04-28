<div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-[#f8fbfd] to-[#e2f0fb] p-4 relative overflow-hidden py-12">
    <!-- Ambient Background Blur Effects -->
    <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-blue-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-cyan-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>

    <div class="w-full max-w-md z-10">
        <!-- Logo Area -->
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center space-x-1 text-slate-800 mb-1">
                <div class="flex items-center justify-center">
                    <svg class="w-14 h-14" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M30 40 L20 50 L30 60" stroke="#777" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20 50 L10 50" stroke="#777" stroke-width="2" stroke-linecap="round"/>
                        <text x="50" y="62" font-family="sans-serif" font-weight="900" font-size="36" fill="#333" text-anchor="middle">N</text>
                        <path d="M70 40 L80 50 L70 60" stroke="#777" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M80 50 L90 50" stroke="#777" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            <h2 class="text-slate-800 font-bold text-lg leading-tight font-serif mt-[-10px]">Nick's & Morris</h2>
        </div>

        <!-- Header Area -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-slate-800 mb-2 tracking-tight">Create Account</h1>
            <p class="text-slate-500 font-medium text-sm">Join us to get started with your journey</p>
        </div>

        <!-- Register Card -->
        <div class="bg-white/90 backdrop-blur-sm rounded-[24px] shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-8 border border-white">
            <form wire:submit.prevent="register" class="space-y-5">
                
                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-xs font-bold text-slate-700 mb-2 tracking-wide">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-user text-blue-500/80 text-sm"></i>
                        </div>
                        <input wire:model="name" id="name" type="text" required 
                            class="w-full pl-11 pr-4 py-3 bg-[#f8fafc] border border-slate-200/80 rounded-xl text-slate-800 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors placeholder:text-slate-400" 
                            placeholder="John Doe">
                    </div>
                    @error('name') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 mb-2 tracking-wide">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-at text-blue-500/80 text-sm"></i>
                        </div>
                        <input wire:model="email" id="email" type="email" required 
                            class="w-full pl-11 pr-4 py-3 bg-[#f8fafc] border border-slate-200/80 rounded-xl text-slate-800 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors placeholder:text-slate-400" 
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
                            class="w-full pl-11 pr-12 py-3 bg-[#f8fafc] border border-slate-200/80 rounded-xl text-slate-800 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors placeholder:text-slate-400 tracking-widest" 
                            placeholder="••••••••">
                        <button type="button" wire:click="togglePasswordVisibility" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none transition-colors">
                            <i class="fa-solid {{ $showPassword ? 'fa-eye-slash' : 'fa-eye' }} text-sm"></i>
                        </button>
                    </div>
                    @error('password') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-bold text-slate-700 mb-2 tracking-wide">Confirm Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock-open text-blue-500/80 text-sm"></i>
                        </div>
                        <input wire:model="password_confirmation" id="password_confirmation" type="{{ $showPasswordConfirmation ? 'text' : 'password' }}" required 
                            class="w-full pl-11 pr-12 py-3 bg-[#f8fafc] border border-slate-200/80 rounded-xl text-slate-800 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors placeholder:text-slate-400 tracking-widest" 
                            placeholder="••••••••">
                        <button type="button" wire:click="togglePasswordConfirmationVisibility" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none transition-colors">
                            <i class="fa-solid {{ $showPasswordConfirmation ? 'fa-eye-slash' : 'fa-eye' }} text-sm"></i>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="w-full flex items-center justify-center py-3.5 px-4 rounded-xl text-white font-semibold text-sm bg-gradient-to-r from-[#2563eb] to-[#0ea5e9] hover:from-[#1d4ed8] hover:to-[#0284c7] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all shadow-lg shadow-blue-500/30 transform hover:-translate-y-0.5 active:translate-y-0">
                        <span wire:loading.remove wire:target="register">Create Account</span>
                        <span wire:loading wire:target="register">Creating Account...</span>
                        <i class="fa-solid fa-arrow-right ml-2 text-xs" wire:loading.remove wire:target="register"></i>
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center mt-6">
                    <p class="text-sm text-slate-500">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:text-blue-700 transition-colors">Sign in here</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
