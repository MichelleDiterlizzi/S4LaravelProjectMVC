<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

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
            'address' => 'required|string|max:255',
            'event_date' => 'required|date_format:Y-m-d\TH:i',
            'price' => 'nullable|numeric',
            'is_free' => 'required|boolean',
            'description' => 'required|string|min:50',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
            'creator_id' => 'exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('events', 'public'); 
            $validated['image'] = $path;
        }

        if ($validated['is_free']) {
            $validated['price'] = null;
        }

        $validated['creator_id'] = Auth::id();

        
        Event::create($validated);

        return redirect()->route('events.create')->with('success', 'Evento creado exitosamente.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $events = Event::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->where('event_date', '>=', now())
            ->paginate(12);

        return view('events.search', compact('events', 'query'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }
}
