
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perfil de Usuario')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
</head>


<body class="bg-zinc-700">
    

<div class="flex items-center justify-center min-h-screen px-8">
    

    <div class="flex w-[70%] h-[70vh] bg-white rounded-xl overflow-hidden shadow-lg ">

        <div class="hidden md:flex w-2/4 bg-orange-600 flex-col items-center justify-top text-white " style="background-image: url('{{ asset('img/night-event.jpg') }}') ; background-size: cover; background-position: center;">
        
            <h2 class="text-2xl font-bold mt-10">Welcome Page</h2>
            <p class="text-center mt-2">Crea y participa a los mejores eventos de la ciudad!</p>

        </div>

        <div class="w-full md:w-2/4 p-6 flex flex-col items-center" >

            <h2 class="text-2xl text-orange-400 font-bold text-center mb-4">Iniciar Sesión</h2>

            <form class="w-[70%] mt-6 flex flex-col gap-6" action="{{ route('login.autenticate') }}" method="POST" enctype="multipart/form-data">
            @csrf
        

                <div div class="w-full flex flex-col gap-2">
                    <label for="email">Email:</label>
                    <input class="p-1 border rounded-sm border-gray-300 text-gray-700 bg-gray-100 w-full" type="text" placeholder="EMAIL" name="email" value="{{old('email')}}" required>
                @error ('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
            </div>

            <div class="w-full flex flex-col gap-2">
                <label for="password">Password:</label>
                <input class="p-1 border rounded-sm border-gray-300 text-gray-700 bg-gray-100 w-full" type="password" placeholder="PASSWORD" name="password" value="{{old('password')}}" required>
                @error ('password')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        <button class="bg-orange-400 w-full rounded-sm text-white p-1 mt-4" type="submit">LOGIN</button>
    </form>

    <a href="" class="text-orange-800 text-sm hover:underline text-center mt-4">¿Has olvidado tu contraseña?</a>
    <a href="" class="text-orange-800 text-sm hover:underline text-center mt-4">Crea una nueva cuenta</a>

</div>
</div>
</body>

</html>