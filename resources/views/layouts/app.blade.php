<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Nick\'s & Morris') | Care for Life</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #fcfcfc;
        }
        .font-serif { font-family: 'Outfit', sans-serif; }
    </style>
    
    @livewireStyles
</head>
<body class="antialiased selection:bg-green-100 selection:text-green-900" x-data="{ mobileMenu: false }">
    
    <x-navbar />

    <main>
        @if(session('success'))
            <div class="max-w-7xl mx-auto pt-24 pb-4 px-4 sm:px-6 lg:px-8 -mb-24 relative z-40">
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center gap-3 shadow-sm">
                    <i class="fas fa-check-circle"></i>
                    <span class="text-sm font-bold">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        @if(session('error'))
            <div class="max-w-7xl mx-auto pt-24 pb-4 px-4 sm:px-6 lg:px-8 -mb-24 relative z-40">
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl flex items-center gap-3 shadow-sm">
                    <i class="fas fa-exclamation-circle"></i>
                    <span class="text-sm font-bold">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        {{ $slot }}
    </main>

    <x-footer />

    @livewireScripts
</body>
</html>
