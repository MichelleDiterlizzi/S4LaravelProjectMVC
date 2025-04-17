
@extends('layouts.user')

@section('title', "Detalles evento")
@section('content')

<div class="flex w-full flex-col items-center justify-center bg-white gap-5 p-10 ml-5">
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                {{ session('error') }}
            </div>
        @endif
    
    @if($event)
    <div class="flex w-full flex-row items-center justify-center gap-5 p-10">

        <div class="border border-gray-500 rounded-lg shadow-lg overflow-hidden flex flex-row w-3/4">
            <div class="p-4 flex flex-col flex-grow w-1/2 gap-4">
                <h1 class="text-blue-600 hover:underline font-semibold text-2xl mb-2">{{ $event->title }}:</h1>
                    
                <p class="text-gray-600 text-sm mb-1">{{ $event->description }}</p>
                <p class="text-gray-600 text-sm mb-1">{{ $event->address }}</p>
                <p class="text-gray-600 text-sm mb-1">{{ $event->price ?? 'El evento es gratuito' }}</p>
                <p class="text-gray-600 text-sm mb-1">{{ $event->event_date ?? 'Fecha no disponible' }}</p>
                <p class="text-md text-gray-700">
                    Personas apuntadas: <span class="font-semibold">{{ $event->total_people }}</span>
                </p>
                <p class="text-md text-gray-700">
                Organizado por: <span class="font-semibold">{{ $event->creator->name }}</span>
                </p>
                 <form action="{{ route('events.attend', $event->id) }}" method="POST" class="flex flex-col items-start gap-4 mt-5">
                            @csrf
                            <div>
                                <label for="guests_count" class="block text-sm font-medium text-gray-700 mb-1">¿Cuántos invitados adicionales traerás? (0 si vienes solo)</label>
                                <input type="number" id="guests_count" name="guests_count" value="0" min="0" max="10"
                                       class="p-2 border border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex gap-3 mt-2 sm:mt-0">
                                 <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-4 py-2 rounded transition duration-150 ease-in-out">
                                    Asistir
                                </button>
                            </div>
                </form>
                
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
