
@extends('layouts.user')

@section('title', "Detalles evento")
@section('content')

<div class="flex w-full flex-col items-center justify-center bg-white gap-5 p-10 ml-5">
    @if($event)
    

    <div class="flex w-full flex-row items-center justify-center gap-5 p-10">

        <div class="border border-gray-500 rounded-lg shadow-lg overflow-hidden flex flex-row w-3/4">
            <div class="p-4 flex flex-col flex-grow w-1/2 gap-4">
                <h1 class="text-blue-600 hover:underline font-semibold text-2xl mb-2">{{ $event->title }}:</h1>
                    
                <p class="text-gray-600 text-sm mb-1">{{ $event->description }}</p>
                <p class="text-gray-600 text-sm mb-1">{{ $event->address }}</p>
                <p class="text-gray-600 text-sm mb-1">{{ $event->price ?? 'El evento es gratuito' }}</p>
                <p class="text-gray-600 text-sm mb-4">{{ $event->event_date ?? 'Fecha no disponible' }}</p>
                
    <p class="text-md text-gray-700 mt-4">
        Organizado por: <span class="font-semibold">{{ $event->creator->name }}</span>
    </p>
                <div class="mt-auto"> 
                    <a href="" class="bg-orange-400 text-white px-3 py-1 rounded text-sm inline-block">Asistir</a>
                </div>
            </div>

            <div class="p-4 flex flex-col flex-grow w-1/2">

                @if($event->image)
                <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $event->image) }}')">
                </div>
                @else
                <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset($event->category->image) }}')">
                </div>
                @endif
            </div>
        </div>
        
        @else
            <p class="w-full text-center">Error al cargar el evento</p>
        @endif
    </div>
@endsection
