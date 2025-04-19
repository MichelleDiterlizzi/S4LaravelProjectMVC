
@extends('layouts.user')

@section('title', 'Crear Evento')
@section('content')

<div class="flex flex-col items-center justify-around bg-white p-10 gap-4">
    

    <div class="md:w-[70%] w-full border-gray-300 shadow-md rounded-lg p-10 flex flex-col gap-4">
        <h1 class="font-bold text-xl ">Crea tu evento!</h1>
        <p class="">¡Organiza una experiencia inolvidable! Crea tu evento y haz que todos lo recuerden.</p>

        @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
        @endif

        <form class="flex md:flex-row flex-col flex-wrap gap-4 items-center" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="w-[70%] md:w-[40%]">
            <label for="title">Título:</label>
            <input class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full" type="text" placeholder="TÍTULO" value="{{old('title')}}" name="title">
            @error ('title')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="w-[70%] md:w-[40%]">
            <label for="address">Dirección:</label>
            <input class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full" type="text" placeholder="DIRECCIÓN" name="address" value="{{old('address')}}" required>
            @error ('address')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-[70%] md:w-[40%]">
        <label for="event_date">Fecha:</label>
        <input class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full" type="datetime-local" name="event_date" value="{{old('event_date')}}" required>
        @error ('event_date')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-[70%] md:w-[40%] items-center">
            <label for="is_free">¿Es gratuito?</label>
            <br>
            <select class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full" value="{{old('
            is_free')}}" name="is_free">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
            @error ('is_free')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="w-[70%] md:w-[40%]">
            <label for="price">Precio:</label>
            <input class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full" type="number" placeholder="00.00" name="price" value="{{old('price')}}" id="price" step="0.01" disabled required>
            @error ('price')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-[70%] md:w-[40%]">
            <label for="category_id">Categoría:</label>
            <select class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full" name="category_id" value="{{old('category_id')}}" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>
            @error ('category_id')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-[70%] md:w-[82%]">
            <label for="description">Descripción:</label>
            <textarea class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full" value="{{old('description')}}" name="description" placeholder="DESCRIPCIÓN" required></textarea>
            @error ('description')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
        

        <script>
            document.querySelector('select[name="is_free"]').addEventListener('change', function(e) {
            const priceInput = document.getElementById('price');
            if (e.target.value === "0") {
                priceInput.disabled = false;
            } else {
                priceInput.disabled = true;
                priceInput.value = '';
            }
            });
        </script>

        
    <div class="w-[70%] md:w-[82%] flex flex-col">
        <label for="image">Imagen:</label>
            <input id="image" class="hidden" type="file" name="image" onchange="updateFileName(this)" value="{{old('image')}}">

            <label for="image" class="p-1 border rounded-2xl border-gray-300 text-gray-700 bg-gray-100 w-[30%]">
            Seleccionar archivo..
            </label>
            <span id="file-name" class=" text-gray-700">Ningún archivo seleccionado</span>
            @error ('image')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
    </div>

<script>
    function updateFileName(input) {
        const fileName = input.files[0] ? input.files[0].name : "Ningún archivo seleccionado";
        document.getElementById('file-name').textContent = fileName;
    }
</script>


        <button class="bg-orange-400 w-[70%] md:w-[82%] text-white p-2 " type="submit">Crear Evento</button>
    </form>
</div>
</div>
@endsection