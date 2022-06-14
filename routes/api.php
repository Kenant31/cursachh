<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeachersController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', function(Request $request) {
        return $request->user();
    });
});



Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(TeachersController::class)->group(function () {
        Route::get('teachers', 'index')->middleware('can:show teacher');
        Route::post('teachers', 'store')->middleware('can:add teacher');
        Route::get('teachers/{id}', 'show')->middleware('can:show teacher');
        Route::put('teachers/{id}', 'update')->middleware('can:edit teacher');
        Route::delete('teachers/{id}', 'destroy')->middleware('can:delete teacher');
        Route::get('search','search')->middleware('can:show teacher');
    });
});
