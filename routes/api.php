<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::middleware('guest')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->withoutMiddleware('auth:sanctum');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth:sanctum', 'is_admin'])->group(function () {
    Route::post('/event/create', [EventController::class, 'createEvent']);
});
