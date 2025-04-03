<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

class EventController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('events.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d\TH:i',
            'price' => 'required|numeric',
            'is_free' => 'required|boolean',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'creator_id' => 'required|exists:users,id', // Asegúrate de que el creador exista
            'category_id' => 'required|exists:categories,id', // Asegúrate de que la categoría exista
        ]);

        // Manejar la imagen si se sube
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('events', 'public'); // Guarda en storage/app/public/events
            $validated['image'] = $path;
        }

        
        Event::create($validated);

        return redirect()->route('events.create')->with('success', 'Evento creado exitosamente.');
    }
}
