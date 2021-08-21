<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(15)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
