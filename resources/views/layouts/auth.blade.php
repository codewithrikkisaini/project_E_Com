<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Login | Nick\'s & Morris')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        .font-serif { font-family: 'Outfit', sans-serif; }
    </style>
    
    @livewireStyles
</head>
<body class="antialiased selection:bg-blue-100 selection:text-blue-900 bg-[#f4f7fc]">
    
    <main>
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
