<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function show($id)
    {
        return view('user.show', ['id' => $id]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('user.create', compact('categories'));
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
    public function edit($id)
    {
        return view('user.edit', ['id' => $id]);
    }
    public function update(Request $request, $id)
    {
        // Logic to update user data
        return redirect()->route('user.show', ['id' => $id]);
    }
    public function destroy($id)
    {
        // Logic to delete user data
        return redirect()->route('user.index');
    }
}
