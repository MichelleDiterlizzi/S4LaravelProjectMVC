<?php
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); // Mostrar formulario

Route::post('/events', [EventController::class, 'store'])->name('events.store'); // Guardar evento