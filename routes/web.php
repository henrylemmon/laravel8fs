<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest()/*->with('category', 'author')*/->get(),
        'categories' => Category::all(),
    ]);
})->name('home');

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post,
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'currentCategory' => $category,
        'posts' => $category->posts/*->load(['category', 'author'])*/,
        'categories' => Category::all(),
    ]);
})->name('category');

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts/*->load(['category', 'author'])*/,
        'categories' => Category::all(),
    ]);
});
