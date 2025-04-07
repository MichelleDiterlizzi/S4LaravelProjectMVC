<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;

class RegisterController extends Controller
{

    public function create()
    {
        $categories = Category::all();
        return view('register.create', compact('categories'));
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:dns|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', 
        ]);
        
        $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']), // ¡Importante hashear la contraseña!
            ]);
            return redirect()->route('user.login')->with('success', 'Usuario creado correctamente.'); 
    }
    
}
