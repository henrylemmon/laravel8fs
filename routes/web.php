<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostCommentsController;

Route::get('/', [PostsController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostsController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->middleware('auth');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

