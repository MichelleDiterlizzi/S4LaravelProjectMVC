
@extends('layouts.user')

@section('title', 'Categorías de Eventos')
@section('content')

<div class="flex flex-col items-top justify-center bg-white  gap-5 p-10 ml-10">

    <h1 class="text-2xl font-bold mb-6">Categorías de Eventos</h1>

    @if($categories->isNotEmpty())
        <ul class="list-disc list-inside space-y-2">
            @foreach($categories as $category)
                <li>
                    <a href="{{route('categories.show', $category->id)}}" class="text-blue-600 hover:underline"> 
                        {{ $category->name }}
                    </a> 
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay categorías disponibles en este momento.</p>
    @endif
    

   
</div>
@endsection