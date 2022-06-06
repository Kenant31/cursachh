<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeachersController;


    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::post('logout', 'logout');



        Route::post('refresh', 'refresh');
    });

    Route::controller(TeachersController::class)->group(function () {
        Route::get('teachers', 'index');
        Route::post('teacher', 'store');
        Route::get('teacher/{id}', 'show');
        Route::put('teacher/{id}', 'update');
        Route::delete('teacher/{id}', 'destroy');
        Route::get('search','search');
    });
