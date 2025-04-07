<?php
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); 

Route::get('/register/create', [RegisterController::class, 'create'])->name('register.create');

Route::post('/events', [EventController::class, 'store'])->name('events.store');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');