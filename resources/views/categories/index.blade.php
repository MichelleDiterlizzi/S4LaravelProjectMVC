
@extends('layouts.user')

@section('title', 'Categorías de Eventos')
@section('content')

<div class="flex flex-col items-center justify-center bg-white  gap-5 p-10 ml-10">

    <h1 class="text-2xl mb-6">Categorías de Eventos</h1>

    @if($categories->isNotEmpty())
    <div class="flex w-full flex-row items-top gap-5 p-10">

        @if($categories->isNotEmpty())
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 w-full px-4"> 
            @foreach($categories as $category)
                
                <div class="border border-gray-500 rounded-lg shadow-lg overflow-hidden flex flex-col">
                    @if($category->image)
                    <img class="w-full h-48 object-cover" src="{{ asset($category->image) }}">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Sin imagen</span>
                        </div>
                    @endif
                    
                    <div class="p-4 flex flex-col flex-grow"> 
                        <a href="{{route('categories.show', $category->id)}}" class="text-blue-600 hover:underline"> 
                            {{ $category->name }}
                        </a> 
                        <p class="text-gray-600 text-sm mb-1">{{ $category->description ?? 'Descripción no disponible' }}</p>
                        <div class="mt-auto"> 
                             <a href="{{ route('categories.show', $category->id) }}" class="bg-orange-400 text-white px-3 py-1 rounded text-sm inline-block">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    @else
        <p>No hay categorías disponibles en este momento.</p>
    @endif
    @endif
    
</div>
@endsection