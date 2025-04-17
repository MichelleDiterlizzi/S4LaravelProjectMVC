
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

        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Evento <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $event->name) }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción <span class="text-danger">*</span></label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $event->description) }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Fecha y Hora <span class="text-danger">*</span></label>
                <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date', $event->start_date ? $event->start_date->format('Y-m-d\TH:i') : '') }}" required>
                @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Ubicación</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $event->location) }}">
                @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría <span class="text-danger">*</span></label>
                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
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

            <div class="mb-3 form-check">
                <input type="hidden" name="is_free" value="0">
                <input type="checkbox"
                    class="form-check-input @error('is_free') is-invalid @enderror"
                    id="is_free"
                    name="is_free"
                    value="1" 
                    {{ old('is_free', $event->is_free) ? 'checked' : '' }}> 
                <label class="form-check-label" for="is_free">¿Es Gratis?</label>
                @error('is_free') {{-- d-block para que se muestre el error bajo el checkbox --}}
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Precio (€)</label>
                <input type="number"
                    class="form-control @error('price') is-invalid @enderror"
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

            <div class="mb-3">
                <label for="image" class="form-label">Imagen del Evento</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/png, image/jpeg, image/webp">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Sube una nueva imagen sólo si deseas reemplazar la actual.</small>

                {{-- Muestra la imagen actual si existe --}}
                @if($event->image)
                    <div class="mt-2">
                        <p class="mb-1"><strong>Imagen Actual:</strong></p>
                        <img src="{{ Storage::url($event->image) }}" alt="Imagen actual de {{ $event->name }}" style="max-height: 150px; width: auto; border-radius: 5px; border: 1px solid #dee2e6;">
                        {{-- Opcional: Checkbox para eliminar imagen --}}
                        {{--
                        <div class="form-check mt-1">
                            <input class="form-check-input" type="checkbox" name="delete_image" id="delete_image" value="1">
                            <label class="form-check-label" for="delete_image">
                                Eliminar imagen actual (sin reemplazar)
                            </label>
                        </div>
                        --}}
                    </div>
                @endif
            </div>


            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('profile.eventsCreated') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>

    </div>
</div>
</div>
@endsection