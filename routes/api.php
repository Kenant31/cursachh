<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\CommentController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('/teachers/{id}/comment', [CommentController::class,'show']);
Route::get('teachers', [TeachersController::class,'index']);
Route::get('teachers/{id}', [TeachersController::class,'show']);
Route::get('search',[TeachersController::class,'search']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', function(Request $request) {
        return $request->user();
    });

    Route::controller(CommentController::class)->group(function () {
        Route::post('/teachers/{id}/comment', 'store');
        Route::put('/teachers/{id}/comment/{comm}', 'update');
        Route::delete('/teachers/{id}/comment/{comm}', 'delete');

    });

    Route::controller(TeachersController::class)->group(function () {
        Route::post('teachers', 'store')->middleware('can:add teacher');
        Route::put('teachers/{id}', 'update')->middleware('can:edit teacher');
        Route::delete('teachers/{id}', 'destroy')->middleware('can:delete teacher');
    });
});

