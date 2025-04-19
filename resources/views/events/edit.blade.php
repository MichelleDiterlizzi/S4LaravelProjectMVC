
@extends('layouts.user')

@section('title', 'Editar Perfil')
@section('content')

<div class="flex flex-row items-top justify-center bg-white  gap-10 p-10">
    

    <div class=" bg-stone-200 rounded-sm p-4 flex gap-3 flex-col w-[20%] ">  
        <a href="{{ route('profile.show') }}" >Perfil de usuario</a>
        <a href="{{ route('profile.edit') }}" class="text-cyan-800">Edita perfil</a>
        <a href="{{ route('profile.eventsRegistered') }}" >Eventos Inscrito</a>
        <a href="{{ route('profile.eventsCreated') }}" >Eventos Creados</a>
        <a href="{{ route('logout') }}">Sign out</a>
        <a href="{{ route('destroy') }}" class="text-red-500 border-gray-500 border-t">Eliminar cuenta</a>
    </div>

    <div class="rounded-sm flex gap-2 flex-col w-[60%] justify-top items-center border border-gray-500 ">
        <h1 class="font-bold text-2xl mt-4">Editar Evento</h1>
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups! Hubo algunos problemas con tu entrada:</strong>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col lg:flex-row lg:flex-wrap gap-8 w-full p-10">
            @csrf
            @method('PATCH')

            <div class="mb-3 w-full lg:w-[40%]">
                <label for="title" class="form-label">Nombre del Evento <span class="text-danger">*</span></label>
                <input type="text" class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $event->title) }}" required>
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            
            <div class="mb-3 w-full lg:w-[40%]">
                <label for="event_date" class="form-label">Fecha y Hora <span class="text-danger">*</span></label>
                <input type="datetime-local" class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full form-control @error('event_date') is-invalid @enderror" id="event_date" name="event_date" value="{{ old('event_date', $event->event_date ? $event->event_date->format('Y-m-d\TH:i') : '') }}" required>
                @error('event_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3 w-full lg:w-[40%]">
                <label for="address" class="form-label">Ubicación</label>
                <input type="text" class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $event->address) }}">
                @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3 w-full lg:w-[40%]">
                <label for="category_id" class="form-label">Categoría <span class="text-danger">*</span></label>
                <select class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                    <option value="">Selecciona una categoría...</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $event->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 w-full lg:w-[40%] form-check items-start justify-center">
                <label class="form-check-label w-[30%%]" for="is_free">¿Es Gratis?</label>
                <select type="checkbox"
                    class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full @error('is_free') is-invalid @enderror"
                    id="is_free"
                    name="is_free"
                    {{ old('is_free', $event->is_free) ? 'checked' : '' }}> 
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>        
                @error('is_free')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 w-full lg:w-[40%]">
                <label for="price" class="form-label">Precio (€)</label>
                <input type="number"
                    class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full form-control @error('price') is-invalid @enderror"
                    id="price"
                    name="price"
                    value="{{ old('price', $event->price) }}"
                    step="0.01" 
                    min="0">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Dejar en blanco o 0 si el evento es gratuito.</small>
            </div>

            <div class="mb-3 w-full lg:w-[80%] flex flex-col">
                <label for="description" class="form-label">Descripción <span class="text-danger">*</span></label>
                <textarea class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $event->description) }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3 flex flex-col w-full lg:w-[40%]">
                <label for="image">Imagen:</label>
                <input id="image" class="hidden" type="file" name="image" onchange="updateFileName(this)" value="{{old('image')}}">

                <label for="image" class="p-1 border rounded-2xl border-gray-300 text-gray-700 bg-gray-100 w-[50%]">
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

                
                @if($event->image)
                    <div class="mt-2">
                        <p class="mb-1"><strong>Imagen Actual:</strong></p>
                        <img src="{{ Storage::url($event->image) }}" alt="Imagen actual de {{ $event->name }}" style="max-height: 150px; width: auto; border-radius: 5px; border: 1px solid #dee2e6;">
                    </div>
                @endif


            <div class="w-full mt-4 flex gap-4">
                <button type="submit" class="underline btn btn-primary cursor-pointer" >Guardar Cambios</button>
                <a href="{{ route('profile.eventsCreated') }}" class="underline btn btn-secondary">Cancelar</a>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const isFreeSelect = document.querySelector('select[name="is_free"]');
                    const priceInput = document.getElementById('price');
                    function updatePriceInputState() {
                        if (!isFreeSelect || !priceInput) {
                            console.error("Error: No se encontraron los elementos 'is_free' o 'price'.");
                            return;
                        }
                        if (isFreeSelect.value === '1') {
                            priceInput.disabled = true;
                            priceInput.value = '';
                        }else {
                            priceInput.disabled = false;
                        }
                    }
                    updatePriceInputState();
                    if (isFreeSelect) { 
                       isFreeSelect.addEventListener('change', updatePriceInputState);
                    }
                });
            </script>
        </form>

    </div>
</div>

@endsection