
@extends('layouts.user')

@section('title', 'User Profile')
@section('content')

<div class="flex flex-row items-top justify-center bg-white  gap-10 p-10">
    

    <div class=" bg-stone-200 rounded-sm p-4 flex gap-3 flex-col w-[20%] ">  
        <a href="" class="text-cyan-800">Perfil de usuario</a>
        <a href="" >Edita perfil</a>
        <a href="" >Eventos</a>
        <a href="">Sign out</a>
        <a href="" class="text-red-500 border-gray-500 border-t">Eliminar cuenta</a>
    </div>

    <div class="rounded-sm flex gap-2 flex-col w-[60%] justify-top items-center border border-gray-500 ">
        <h1 class="font-bold text-2xl mt-4">Perfil de Usuario</h1>
        <p class="text-sm mb-4">Maneja y actualiza tus datos de perfil.</p>


        <div class="flex flex-row items-center justify-around w-full border-gray-500 border-t "> 

            <div class="flex flex-col items-center w-[100%] border-gray-500 border-r ">

                <svg class="w-[60%]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" className="size-4">
                    <path fillRule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clipRule="evenodd" />
                  </svg>
                  <p class="mb-4">{{ Auth::user()->name }}</p>
            </div>

            <div class="flex flex-col p-8  items-left w-full">
                <div class="flex flex-col w-[100%]">
                    <label for="">Email</label>
                    <div class="flex w-full justify-between gap-2">
                        <div class="border border-gray-500 flex w-[100%] items-center">
                            <p class="ml-4">
                                {{ Auth::user()->email}}
                            </p>
                        </div>
                    </div>
                </div>
            
            
            
                <div class="flex flex-col gap-2 items-center w-full mt-6">
                    <div class="flex flex-col items-left w-full">
                    <label for="new_password">Password</label>

                    <div class="flex w-full justify-between gap-2">
                        <div class="border border-gray-500 flex w-[100%] items-center">
                            <p class="ml-4">
                                *******
                            </p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection