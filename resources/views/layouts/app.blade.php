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
        {{ $slot }}
    </main>

    <x-footer />

    @livewireScripts
</body>
</html>
