<?php
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('guest')->group(function () {
    
    Route::get('/register', [RegisterController::class, 'create'])->name('register.create');

    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/authenticate', [AuthController::class, 'authenticate'])
           ->name('login.authenticate');

});