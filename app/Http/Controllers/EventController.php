<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;

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
        $event = Event::with(['creator', 'category', 'attendees'])->findOrFail($id);

        return view('events.show', compact('event'));
    }

    public function attend(Request $request, Event $event)
    {
        
        $user = Auth::user();

        
        $validated = $request->validate([
            'guests_count' => 'nullable|integer|min:0|max:50',
        ]);
        $guestsCount = $validated['guests_count'] ?? 0;
        try {
            $event->attendees()->attach($user->id, ['guests_count' => $guestsCount]);

            return redirect()->route('events.show', $event->id)->with('success', '¡Te has apuntado al evento!');
        } catch (QueryException $e) {
            return redirect()->route('events.show', $event->id)->with('error', 'Ya estabas apuntado a este evento.');
        }
    }

    public function unattend(Request $request, Event $event): RedirectResponse
    {
        $user = Auth::user();
        $detached = $event->attendees()->detach($user->id);

        if ($detached) {
            return redirect()->route('profile.eventsRegistered')
                             ->with('success', 'Has cancelado tu asistencia al evento: "' . $event->title . '".');
        } else {
             return redirect()->route('profile.eventsRegistered')
                             ->with('error', 'No se pudo cancelar la asistencia o ya no estabas apuntado al evento: "' . $event->title . '".');
        }
    }

    public function edit(Event $event)
    {
        $categories = Category::orderBy('name')->get();
        return view('events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, Event $event)
    {

        // --- VALIDACIÓN ---
        // Si usas un Form Request (ej. UpdateEventRequest), la validación es automática.
        // Si no, valida aquí:
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date', // Ajusta el formato si es necesario
            'location' => 'nullable|string|max:255',
            // Añade aquí todos los campos que permites editar
        ]);

        $event->update($validatedData);

        // --- REDIRECCIÓN ---
        return redirect()->route('profile.eventsCreated')->with('success', '¡Evento actualizado correctamente!');
    }
}
