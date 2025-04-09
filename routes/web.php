<?php
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('guest')->group(function () {
    
    Route::get('/register', [RegisterController::class, 'create'])->name('register.create');

    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    
    Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/index', function () {
    return view('index');
})->name('index');
 

    Route::post('/authenticate', [AuthController::class, 'authenticate'])
           ->name('login.authenticate');

});
Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/authenticate', [AuthController::class, 'authenticate'])
           ->name('login.authenticate');

Route::get('/logout/{id}', [AuthController::class, 'destroy'])->name('logout');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


Route::middleware('auth')->group(function () {

    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');

    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('/Profile/show', [ProfileController::class, 'show'])->name('Profile.show');
    
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

