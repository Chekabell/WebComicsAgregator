<?php
use App\Http\Controllers\ComicsControllerAPI;
use App\Http\Controllers\CommentControllerAPI;
use App\Http\Controllers\UserControllerAPI;
use Illuminate\Support\Facades\Route;

Route::get('/api/comics', [ComicsControllerAPI::class, 'index']);
Route::get('/api/comics/{comics}', [ComicsControllerAPI::class, 'show']);

Route::get('/api/comments', [CommentControllerAPI::class, 'index']);
Route::get('/api/comments/{comment}', [CommentControllerAPI::class, 'show']);

Route::get('/api/users', [UserControllerAPI::class, 'index']);
Route::get('/api/users/{user}', [UserControllerAPI::class, 'show']);
