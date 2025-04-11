<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perfil de Usuario')</title>
    
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
</head>
<body>
    <header class="bg-orange-300 text-white p-4 flex justify-between items-center">
        <h1 class="text-emerald-900 font-bold text-3xl font-serif w-[10%]">Event Organizer</h1>
        <nav class="w-[50%] flex justify-end mx-6">
            <ul class="flex gap-6">
                <li class="font-bold text-xs"><a href="">HOME</a></li>
                <li class="text-xs font-bold"><a href="">CATEGORIAS</a></li>
                <li class="text-xs font-bold"><a href="">CONTACT US</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>&copy; 2025 Mi Aplicación Laravel</p>
    </footer>
</body>
</html>