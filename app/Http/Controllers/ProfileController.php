<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// QUITA o comenta esta si la tenías de antes (no es necesaria aquí): use App\Models\User;
use Illuminate\Support\Facades\Auth; // <-- ¡¡AÑADE ESTA LÍNEA!!
use Illuminate\Support\Facades\Hash; // Necesaria si actualizas contraseña
use Illuminate\Validation\Rule; 

class ProfileController extends Controller
{
    public function show()
    {

        $user = Auth::user();
        return view('Profile.show', compact('user')); 
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user')); 
    }

    public function update(Request $request)
{
    $user = Auth::user();

    // Validar los datos enviados desde el formulario
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|Rule::unique,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->name = $validated['name'];
    $user->email = $validated['email'];

    if (!empty($validated['password'])) {
        $user->password = bcrypt($validated['password']);
    }

    $user->save();

    // Redirigir con un mensaje de éxito
    return redirect()->route('profile.show')->with('success', 'Perfil actualizado correctamente.');
}
}