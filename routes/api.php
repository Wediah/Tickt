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

Route::prefix('admin')->middleware(['auth:sanctum', 'is_admin'])->group(function () {
    Route::get('/events/all', [EventController::class, 'allEvents']);
    Route::post('/event/create', [EventController::class, 'createEvent']);
    Route::post('/event/{id}/update', [EventController::class, 'updateEvent']);
    Route::post('/event/{id}/delete', [EventController::class, 'deleteEvent']);
});


