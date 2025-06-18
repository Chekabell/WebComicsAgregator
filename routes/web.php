<?php

use App\Http\Controllers\ComicsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ComicsController::class, 'index'])->name('weclome');

Route::get('/comics', [ComicsController::class, 'index'])->name('comics.index');
Route::get('/comics/create', [ComicsController::class, 'create'])->name('comics.create');
Route::post('/comics', [ComicsController::class, 'store'])->name('comics.store');
Route::get('/comics/{comics}', [ComicsController::class, 'show'])->name('comics.show');
Route::get('/comics/{comics}/edit', [ComicsController::class, 'edit'])->name('comics.edit');
Route::patch('/comics/{comics}', [ComicsController::class, 'update'])->name('comics.update');
Route::delete('/comics/{comics}', [ComicsController::class, 'destroy'])->name('comics.destroy');


Route::get('/tags/{id}', [ComicsController::class, 'showComicsByTags']);
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/comments', [UserController::class, 'showComments']);
