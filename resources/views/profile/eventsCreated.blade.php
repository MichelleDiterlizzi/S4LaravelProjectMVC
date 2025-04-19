
@extends('layouts.user')

@section('title', 'User Profile')
@section('content')

<div class="flex flex-row items-top justify-center bg-white  gap-10 p-10">
    

    <div class=" bg-stone-200 rounded-sm p-4 flex gap-3 flex-col w-[20%] ">  
        <a href="{{ route('profile.show') }}">Perfil de usuario</a>
        <a href="{{ route('profile.edit') }}" >Edita perfil</a>
        <a href="{{ route('profile.eventsRegistered') }}" >Mis Entradas</a>
        <a href="{{route('profile.eventsCreated') }}" class="text-cyan-800">Eventos Creados</a>
        <a href="{{ route('logout') }}">Sign out</a>
        <a href="{{ route('destroy') }}" class="text-red-500 border-gray-500 border-t">Eliminar cuenta</a>
    </div>

    <div class="flex flex-col w-[60%] items-start border border-gray-500 rounded-lg shadow-md p-6">
        <h1 class="text-2xl mb-6">Eventos que has creado:</h1>

        @if (session('success'))
            <div class="w-full bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
         @if (session('error'))
            <div class="w-full bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if($createdEvents->isNotEmpty())
            <div class="space-y-6 w-full">
                @forelse ($createdEvents as $event)
        <div class="border border-gray-300 rounded-lg overflow-hidden flex flex-col sm:flex-row ">
            <div class="w-full sm:w-1/4 md:w-1/5 flex-shrink-0 h-40 sm:h-auto bg-gray-200">
                @if ($event->image)
                    <img class="w-full h-full object-cover" src="{{ asset('storage/' . $event->image) }}" alt="Imagen de {{ $event->title }}">
                @else
                     <img class="w-full h-full object-cover" src="{{ asset($event->category->image) }}" alt="Categoría: {{ $event->category->name }}">
                @endif
            </div>
            <div class="p-4 flex flex-col flex-grow">
                <h2 class="text-lg font-semibold mb-1">
                    <a href="{{ route('events.show', $event->id) }}" class="text-blue-600 hover:underline">
                        {{ $event->title }}
                    </a>
                </h2>
                <p class="text-gray-600 text-sm mb-1">{{ optional($event->event_date)->format('d/m/Y H:i') ?? 'Fecha no disponible' }}</p>
                <p class="text-gray-600 text-sm mb-2">{{ $event->address ?? 'Dirección no disponible' }}</p>

                <p class="text-gray-700 text-sm font-medium mb-3">
                    Personas apuntadas: <span class="font-semibold">{{ $event->total_people }}</span> 
                </p>

                <div class="mt-2 gap-4 flex flex-col sm:flex-row sm:items-center sm:justify-end">
                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-warning underline ">Editar</a>
                    
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este evento?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger underline cursor-pointer ">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
    @endforelse
            </div>
        @else
            <div class="w-full bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4" role="alert">
                No has creado ningún evento aún.
            <a class="underline" href="{{ route('events.create') }}">Crear mi primer evento</a>
            </div>
        @endif
    </div>
</div>
@endsection