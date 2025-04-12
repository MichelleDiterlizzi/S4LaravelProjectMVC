
@extends('layouts.user')

@section('title', $category->name)
@section('content')

<div class="flex flex-col items-top justify-center bg-white  gap-5 p-10 ml-10">

    <h1 class="text-2xl font-bold mb-6">{{$category->name }}</h1>

    @if($events->isNotEmpty())
        <ul class="list-disc list-inside space-y-2">
            @foreach($events as $event)
                <li>
                    <div class="w-30 h-30 bg-cover bg-center"  style="background-image: url('{{ asset('img/background3.jpg') }}')">{{ $event->image }}</div>
                    <a href="{{--route('event.show', $event->id)--}}" class="text-blue-600 hover:underline"> 
                        {{ $event->title }}
                    </a> 
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay eventos de esta categoría disponibles en este momento.</p>
    @endif
    

   
</div>
@endsection