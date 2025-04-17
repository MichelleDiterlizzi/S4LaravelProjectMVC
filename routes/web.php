<?php
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {

    return view('index');

    })->name('index');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/events/search', [EventController::class, 'search'])->name('events.search');

Route::get('/events-registered', [ProfileController::class, 'events'])->name('profile.eventsRegistered');

Route::get('/events-created', [ProfileController::class, 'eventsCreated'])->name('profile.eventsCreated');

Route::middleware('guest')->group(function () {
    
    Route::get('/register', [RegisterController::class, 'create'])->name('register.create');

    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/authenticate', [AuthController::class, 'authenticate'])
           ->name('login.authenticate');

});

Route::middleware('auth')->group(function () {

    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    
    Route::post('/events', [EventController::class, 'store'])->name('events.store');

    Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/destroy', function () {return view('profile.warning');})->name('destroy');

    Route::post('/events/{event}/attend', [EventController::class, 'attend'])->name('events.attend');
    
    Route::delete('/events/{event}/unattend', [EventController::class, 'unattend'])->name('events.unattend');
});

Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

