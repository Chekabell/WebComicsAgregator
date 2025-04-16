<?php

use App\Http\Controllers\ComicsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/comics', [ComicsController::class, 'index']);

Route::get('/comics/{id}', [ComicsController::class, 'show']); 

Route::get('/comics/{id}/tags', [ComicsController::class, 'showWithTags']); 

Route::get('/tags/{id}', [ComicsController::class, 'showComicsByTags']); 

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{id}', [UserController::class, 'show']); 

Route::get('/users/{id}/comments', [UserController::class, 'showWithComments']); 