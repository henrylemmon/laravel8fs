<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostsController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    public function store()
    {
        /* $path = request()->file('thumbnail')->store('thumbnails');

         return 'Done' . $path;*/

        $attributes = $this->validatePost();

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        // if(isset($attributes['thumbnail'])) {
        if($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

    /**
     * @param Post $post
     * @return array
     */
    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required|min:3|max:255',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required|min:3|max:255',
            'body' => 'required|min:3|max:255',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
    }
}
