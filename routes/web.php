<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeachersControllerWeb;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/teachers', [TeachersControllerWeb::class, 'index'])->name('dashboard')->middleware('can:show teacher');
    Route::get('/teachers/{id}', [TeachersControllerWeb::class, 'show'])->name('detail')->middleware('can:show teacher');
    Route::get('search', [TeachersControllerWeb::class, 'search'])->name('search')->middleware('can:show teacher');;
    Route::get('add-teacher', [TeachersControllerWeb::class, 'create'])->name('add-teacher')->middleware('can:add teacher');
    Route::post('store-teacher', [TeachersControllerWeb::class, 'store'])->name('store-teacher')->middleware('can:add teacher');
    Route::get('edit-teacher/{id}', [TeachersControllerWeb::class, 'edit'])->name('edit-teacher')->middleware('can:edit teacher');
    Route::put('update-teacher/{id}', [TeachersControllerWeb::class, 'update'])->name('update-teacher')->middleware('can:edit teacher');
    Route::delete('delete-teacher/{id}', [TeachersControllerWeb::class, 'delete'])->name('delete-teacher')->middleware('can:delete teacher');
    Route::post('/teachers/{id}/comment',[CommentController::class,'store'])->name('comment.store');
    Route::get('/teachers/{id}/comment/{comm}/edit',[CommentController::class,'edit'])->name('comment.edit');
    Route::put('/teachers/{id}/comment/{comm}/update',[CommentController::class,'update'])->name('comment.update');
    Route::delete('/teachers/{id}/comment/{comm}/delete',[CommentController::class,'delete'])->name('comment.delete');

    Route::resource('roles', \App\Http\Controllers\RoleController::class)->middleware('role:super-user');
    Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('role:super-user');

});


require __DIR__.'/auth.php';
