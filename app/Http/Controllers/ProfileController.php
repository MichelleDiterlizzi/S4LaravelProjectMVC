<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $Profile = auth()->Profile();
        return view('Profile.show', compact('Profile')); 
    }

    public function edit()
    {
        $Profile = auth()->Profile();
        return view('Profile.edit', compact('Profile')); 
    }

    public function update(Request $request)
{
    $Profile = auth()->Profile();

    // Validar los datos enviados desde el formulario
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:Profiles,email,' . $Profile->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    $Profile->name = $validated['name'];
    $Profile->email = $validated['email'];

    if (!empty($validated['password'])) {
        $Profile->password = bcrypt($validated['password']);
    }

    $Profile->save();

    // Redirigir con un mensaje de éxito
    return redirect()->route('Profile.show')->with('success', 'Perfil actualizado correctamente.');
}
}