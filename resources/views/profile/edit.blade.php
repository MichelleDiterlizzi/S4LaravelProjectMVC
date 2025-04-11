
@extends('layouts.user')

@section('title', 'Editar Perfil')
@section('content')

<div class="flex flex-row items-top justify-center bg-white  gap-10 p-10">
    

    <div class=" bg-stone-200 rounded-sm p-4 flex gap-3 flex-col w-[20%] ">  
        <a href="{{ route('profile.show') }}" >Perfil de usuario</a>
        <a href="{{ route('profile.edit') }}" class="text-cyan-800">Edita perfil</a>
        <a href="">Eventos</a>
        <a href="{{ route('logout') }}">Sign out</a>
        <a href="{{ route('destroy') }}" class="text-red-500 border-gray-500 border-t">Eliminar cuenta</a>
    </div>

    <div class="rounded-sm flex gap-2 flex-col w-[60%] justify-top items-center border border-gray-500 ">
        <h1 class="font-bold text-2xl mt-4">Editar Perfil</h1>
        <p class="text-sm mb-4">Maneja y actualiza tus datos de perfil.</p>


        <div class="flex flex-row items-center justify-around w-full border-gray-500 border-t "> 
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('success') }}
                </div>
            @endif

            <form class="mt-5 mb-5" action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PATCH')
        
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Nueva Contraseña</label>
                    <input type="password" name="password" id="password" class="w-full border border-gray-300 p-2 rounded" placeholder="">
                    @error('password')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border border-gray-300 p-2 rounded">
                </div>
        
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar Cambios</button>
            </form>
        </div>

    </div>
</div>
</div>
@endsection