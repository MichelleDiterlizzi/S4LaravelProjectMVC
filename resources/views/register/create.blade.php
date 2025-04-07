
@extends('layouts.user')

@section('title', 'Crear Usuario')
@section('content')

<div class="flex flex-col items-center bg-white py-10 gap-4">
    

    <div class="w-[60%] border-gray-300 shadow-md rounded-lg p-10 flex flex-col gap-4 items-center">
        <h1 class="font-bold text-xl ">WELCOME!</h1>
        <p class="">Disfruta de los mejores eventos de la ciudad, o organiza los tutyos!</p>

        <form class="flex flex-col flex-wrap gap-4 items-center w-[70%]" action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="w-full flex flex-col gap-2">
            <label for="name">Nombre y apellidos</label>
            <input class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full" type="text" placeholder="NOMBRE Y APELLIDOS" value="{{old('name')}}" name="name" required>
            @error ('name')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
        

        <div div class="w-full flex flex-col gap-2">
            <label for="email">Email</label>
            <input class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full" type="text" placeholder="EMAIL" name="email" value="{{old('email')}}" required>
            @error ('email')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-full flex flex-col gap-2">
            <label for="password">Password</label>
            <input class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full" type="password" placeholder="PASSWORD" name="password" value="{{old('password')}}" required>
            @error ('password')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-full flex flex-col gap-2">
            <label for="password_confirmation">Confirm Password</label>
            <input class="p-2 border border-gray-300 text-gray-700 bg-gray-100 w-full" type="password" placeholder="REPITE PASSWORD" name="password_confirmation" value="{{old('password_confirmation')}}" required>
            @error ('password_confirmation')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
        


        <button class="bg-orange-400 w-full text-white p-2 " type="submit">Crea Usuario</button>
    </form>
</div>
</div>
@endsection