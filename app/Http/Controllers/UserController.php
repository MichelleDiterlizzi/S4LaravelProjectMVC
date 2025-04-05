<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('user.create');
    }

    public function store(Request $request)
    {
        // Logic to store user data
        return redirect()->route('index');
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
