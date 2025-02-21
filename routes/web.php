<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//GOOGLE AUTH
//Route::get('/auth/google/redirect', [App\Http\Controllers\GoogleAuthController::class, 'redirectToGoogle'])->name('google.redirect');
//Route::get('/auth/google/callback', [App\Http\Controllers\GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
