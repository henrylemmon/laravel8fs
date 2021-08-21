<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;

Route::get('/', [PostsController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostsController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('/newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Admin
Route::post('admin/posts', [AdminPostsController::class, 'store'])->middleware('admin');
Route::get('admin/posts/create', [AdminPostsController::class, 'create'])->middleware('admin');
Route::get('admin/posts', [AdminPostsController::class, 'index'])->middleware('admin');
Route::get('admin/posts/{post}/edit', [AdminPostsController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{post}', [AdminPostsController::class, 'update'])->middleware('admin');
Route::delete('admin/posts/{post}', [AdminPostsController::class, 'destroy'])->middleware('admin');
