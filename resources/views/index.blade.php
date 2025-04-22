<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    <title>Event Organizer</title>
    
</head>
<body class=" flex flex-col items-center">
  <header x-data="{ open: false }" class="relative w-full bg-orange-300 p-4 flex flex-wrap items-center justify-between gap-y-4 lg:flex-nowrap lg:h-20">  
        
        <h1 class="text-emerald-900 font-bold text-2xl lg:text-3xl font-serif flex-shrink-0 mr-6"> 
            <p>Event Organizer</p>
        </h1>

        <form action="{{ route('events.search') }}" method="GET" class="relative w-full lg:w-auto lg:flex-grow lg:max-w-sm lg:mx-4 order-3 lg:order-none">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" name="query" placeholder="Buscar eventos..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full text-gray-700 bg-white shadow-sm focus:outline-none focus:ring-0 focus:border-gray-500" value="{{ request('query') }}" required>
        </form>

        <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-emerald-900 hover:bg-orange-200 focus:outline-none focus:bg-orange-200 focus:text-emerald-900 lg:hidden">
            <span class="sr-only">Abrir menú principal</span>
            <svg x-show="open" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
             <svg x-show="!open" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <nav :class="{'flex': open, 'hidden': !open}" class="absolute top-full left-0 w-full bg-orange-300 shadow-md p-4 flex-col items-stretch gap-4 
                     lg:relative lg:top-auto lg:left-auto lg:w-auto lg:bg-transparent lg:shadow-none lg:p-0 lg:flex lg:flex-row lg:items-center lg:gap-6 lg:justify-end hidden">
            <a class="font-bold text-sm text-white hover:text-emerald-900 lg:text-xs" href="{{ route('categories.index') }}">CATEGORIAS</a>
            <a class="font-bold text-sm text-white hover:text-emerald-900 lg:text-xs" href="{{ route('events.create') }}">CREAR EVENTO</a>
            <a class="font-bold text-sm text-white hover:text-emerald-900 lg:text-xs" href="{{ route('profile.show') }}">PERFIL</a>
            <a class="font-bold text-sm text-white hover:text-emerald-900 lg:text-xs" href="#">CONTACT US</a>
        </nav>

    </header>
    <div class="w-full h-96 bg-cover bg-center"  style="background-image: url('{{ asset('img/background3.jpg') }}')">
  
  
    </div>
  <main>



  </main>
  <footer></footer>
</body>
</html>