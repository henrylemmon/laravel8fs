<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{
    public function index()
    {
        // ddd(Gate::allows('admin'));
        // returns bool
        // dd(request()->user()->can('admin'));

        // checks authorization
        // dd($this->authorize('admin'));

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
