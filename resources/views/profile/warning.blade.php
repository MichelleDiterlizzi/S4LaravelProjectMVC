
@extends('layouts.user')

@section('title', 'User Profile')
@section('content')

<div class="flex flex-row items-top sm:justify-center justify-between bg-white  sm:gap-10 sm:p-10">
    

    <div class=" bg-stone-200 rounded-sm p-4 flex gap-3 flex-col sm:max-w-lg min-h-screen border-r border-gray-500 sm:border-none sm:min-h-0">  
        <a href="{{ route('profile.show') }}" class="text-cyan-800">Perfil de usuario</a>
        <a href="{{ route('profile.edit') }}" >Edita perfil</a>
        <a href="{{ route('profile.show') }}" >Eventos</a>
        <a href="{{ route('logout') }}">Sign out</a>
        <a href="{{ route('profile.destroy') }}" class="text-red-500 border-gray-500 border-t">Eliminar cuenta</a>
    </div>

    <div class="rounded-sm flex gap-4 flex-col w-[60%] justify-top items-center sm:border border-gray-500 p-4">
            <h2 class="text-lg font-medium text-red-700">Eliminar Cuenta</h2>
            <p class="text-sm text-gray-600">
                Una vez que tu cuenta sea eliminada, todos sus recursos y datos serán borrados permanentemente...
            </p>
        
            <div x-data="{ showModal: {{ $errors->userDeletion->isNotEmpty() ? 'true' : 'false' }} }">
        
                
                <button
                    type="button"
                    @click="showModal = true" {{-- Al hacer clic, pone showModal a true --}}
                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                >
                    Eliminar Cuenta
                </button>
        
                
                    <div x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center min-h-screen text-center sm:block sm:p-0 bg-gray-500 bg-opacity-75" @click="showModal = false" aria-hidden="true">
        
        
                        <div
                            class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl sm:my-8 sm:align-middle sm:max-w-lg" @click.stop>
                           
                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')
        
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100" id="modal-title">
                                    ¿Estás seguro de que quieres eliminar tu cuenta?
                                </h2>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    Introduce tu contraseña actual para confirmar la eliminación permanente.
                                </p>
                                <div class="mt-6">
                                     <label for="password_delete_direct" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                        Contraseña Actual
                                    </label>
                                    <input
                                        id="password_delete_direct"
                                        name="password"
                                        type="password"
                                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                        placeholder="Tu Contraseña Actual"
                                        required/>
                                    @error('password', 'userDeletion')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
        
                                
                                <div class="mt-6 flex flex-row-reverse gap-3">
                                     <button type="submit" class="inline-flex justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:w-auto">
                                        Eliminar Cuenta
                                    </button>
                                    <button
                                        type="button"
                                        @click="showModal = false"
                                        class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto dark:bg-gray-700 dark:text-gray-300 dark:ring-gray-600 dark:hover:bg-gray-600"
                                     >
                                        Cancelar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection