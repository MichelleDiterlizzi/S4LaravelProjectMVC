<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('Profile.show', compact('user')); 
    }

    public function edit()
    {
        $user = auth()->user();
        return view('Profile.edit', compact('user')); 
    }

    public function update(Request $request)
{
    $user = auth()->user();

    // Validar los datos enviados desde el formulario
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:Profiles,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->name = $validated['name'];
    $user->email = $validated['email'];

    if (!empty($validated['password'])) {
        $user->password = bcrypt($validated['password']);
    }

    $user->save();

    // Redirigir con un mensaje de éxito
    return redirect()->route('Profile.show')->with('success', 'Perfil actualizado correctamente.');
}
}