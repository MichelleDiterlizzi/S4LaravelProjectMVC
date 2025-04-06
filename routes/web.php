<?php
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); 

Route::get('/user/create', [UserController::class, 'create'])->name('user.create');

Route::post('/events', [EventController::class, 'store'])->name('events.store');

Route::post('/user', [UserController::class, 'store'])->name('user.store');// Guardar evento