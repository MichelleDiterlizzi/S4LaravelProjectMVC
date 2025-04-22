<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perfil de Usuario')</title>
    
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen p-0"> 

    <header x-data="{ open: false }" class="relative w-full bg-orange-300 p-4 flex flex-wrap items-center justify-between gap-y-4 lg:flex-nowrap lg:h-20">
        <h1 class="text-emerald-900 font-bold text-3xl font-serif w-[10%]">Event Organizer</h1>

        <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-emerald-900 hover:bg-orange-200 focus:outline-none focus:bg-orange-200 focus:text-emerald-900 lg:hidden">
            <span class="sr-only">Abrir menú principal</span>
            <svg x-show="open" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
             <svg x-show="!open" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <nav :class="{'flex': open, 'hidden': !open}" class="mg:w-[50%] absolute top-full left-0 w-full bg-orange-300 shadow-md p-4 flex-col items-stretch gap-4 
                     lg:relative lg:top-auto lg:left-auto lg:w-auto lg:bg-transparent lg:shadow-none lg:p-0 lg:flex lg:flex-row lg:items-center lg:gap-6 lg:justify-end hidden">
            <a class="font-bold text-sm text-white hover:text-emerald-900 lg:text-xs" href="{{ route('home') }}">HOME</a>
            <a class="font-bold text-sm text-white hover:text-emerald-900 lg:text-xs" href="{{ route('categories.index') }}">CATEGORIAS</a>
            <a class="font-bold text-sm text-white hover:text-emerald-900 lg:text-xs" href="{{ route('events.create') }}">CREAR EVENTO</a>
            <a class="font-bold text-sm text-white hover:text-emerald-900 lg:text-xs" href="{{ route('profile.show') }}">PERFIL</a>
            <a class="font-bold text-sm text-white hover:text-emerald-900 lg:text-xs" href="#">CONTACT US</a>
        </nav>
    </header>

    <div class="container flex-grow"> 
        @yield('content')
    </div>

    <footer class="w-full p-10 bg-gray-800 text-white text-center">
        <p>&copy; {{ date('Y') }} Event Organizer. Todos los derechos reservados.</p> 
    </footer>
</body>
</html>