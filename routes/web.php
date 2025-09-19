<?php

use App\Http\Controllers\ComicsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ComicsController::class, 'index'])->name('weclome');

Route::get('/comics', [ComicsController::class, 'index'])->name('comics.index');
Route::get('/comics/create', [ComicsController::class, 'create'])->name('comics.create')->middleware('auth');
Route::post('/comics', [ComicsController::class, 'store'])->name('comics.store')->middleware('auth');
Route::get('/comics/{comics}', [ComicsController::class, 'show'])->name('comics.show');
Route::get('/comics/{comics}/edit', [ComicsController::class, 'edit'])->name('comics.edit')->middleware('auth');
Route::patch('/comics/{comics}', [ComicsController::class, 'update'])->name('comics.update')->middleware('auth');
Route::delete('/comics/{comics}', [ComicsController::class, 'destroy'])->name('comics.destroy')->middleware('auth');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/comments', [UserController::class, 'showComments']);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'authenticate']);
Route::get('/error', function(){
    return view('error', [
        'message' => session('message')
    ]);
});

