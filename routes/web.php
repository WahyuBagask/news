<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/kategori', function () {
    return view ('kategori');
});
Route::get('/kriminal', function () {
    return view ('Kriminal');
});
Route::get('/finance', function () {
    return view ('finance');
});
Route::get('/politik', function () {
    return view ('politik');
});

Route::get('/halo', function () {
    return 'halo semua';
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
