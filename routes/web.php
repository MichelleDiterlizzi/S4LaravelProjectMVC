<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events/create', function () {
    return view('create');
});

Route::post('/events', function () {
    return view('test');
});