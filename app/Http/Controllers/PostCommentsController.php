<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        $comment = request()->validate([
            'body' => ['required', 'max:255', 'min:1'],
        ]);

        /*ddd($comment['body']);*/

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $comment['body'],
        ]);

        return back();
    }
}
