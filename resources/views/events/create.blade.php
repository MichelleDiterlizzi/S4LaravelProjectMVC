
@extends('layouts.user')

@section('title', 'Crear Evento')
@section('content')

<div class="flex flex-col items-center bg-white py-4 gap-4">
    <h1>Crear Evento</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form class="flex flex-col "action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="title">Título:</label>
        <input type="text" name="title" required>

        <label for="adress">Dirección:</label>
        <input type="text" name="adress" required>

        <label for="date">Fecha:</label>
        <input type="datetime-local" name="date" required>

        <label for="price">Precio:</label>
        <input type="number" name="price" required>

        <label for="is_free">¿Es gratuito?</label>
        <select name="is_free">
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>

        <label for="description">Descripción:</label>
        <textarea name="description" required></textarea>

        <label for="category">Categoría:</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label for="image">Imagen:</label>
        <input type="file" name="image">

        <button type="submit">Crear Evento</button>
    </form>
</div>
@endsection