<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon; // Asegúrate de importar Carbon

class HomeController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        
        $freeEvents = Event::where(function ($query) {
                $query->where('price', '=', 0)
                      ->orWhereNull('price');
            })
            ->where('event_date', '>', $now) 
            ->orderBy('event_date', 'asc')
            ->take(5)
            ->get();

        $popularEvents = Event::withCount('participants')
            ->where('event_date', '>', $now)
            ->orderBy('participants_count', 'desc')
            ->take(5)
            ->get();

        $eveningEvents = Event::where('event_date', '>', $now)
            ->whereTime('event_date', '>=', '19:00:00') 
            ->orderBy('event_date', 'asc')
            ->take(5)
            ->get();
            
        $dayEvents = Event::where('event_date', '>', $now)
            ->whereTime('event_date', '<', '19:00:00')
            ->orderBy('event_date', 'asc')
            ->take(5)
            ->get();

        return view('welcome', compact(
            'freeEvents',
            'popularEvents',
            'eveningEvents',
            'dayEvents'
        ));
    }
}