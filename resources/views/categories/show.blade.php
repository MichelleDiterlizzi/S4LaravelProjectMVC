
@extends('layouts.user')

@section('title', $category->name)
@section('content')

<div class="flex w-full flex-col items-center justify-center bg-white gap-5 p-10 ml-5">

    <h1 class="text-2xl">{{ $category->name }}:</h1>

    <div class="flex w-full flex-row items-top gap-5 p-10">

        @if($events->isNotEmpty())
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 w-full px-4"> 
            @foreach($events as $event)
                
                <div class="border border-gray-500 rounded-lg shadow-lg overflow-hidden flex flex-col">
                    @if($event->image)
                        <div class="w-full h-48 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $event->image) }}')">
                        </div>
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Sin imagen</span>
                        </div>
                    @endif
                    
                    <div class="p-4 flex flex-col flex-grow"> 
                        <a href="{{-- route('event.show', $event->id) --}}" class="text-blue-600 hover:underline font-semibold text-lg mb-2">
                            {{ $event->title }}
                        </a>
                        <p class="text-gray-600 text-sm mb-1">{{ $event->address ?? 'Dirección no disponible' }}</p>
                        <p class="text-gray-600 text-sm mb-4">{{ $event->event_date ?? 'Fecha no disponible' }}</p>
                        <div class="mt-auto"> 
                             <a href="{{-- route('event.show', $event->id) --}}" class="bg-orange-400 text-white px-3 py-1 rounded text-sm inline-block">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="w-full text-center">No hay eventos de esta categoría disponibles en este momento.</p>
    @endif
    

   
</div>
@endsection