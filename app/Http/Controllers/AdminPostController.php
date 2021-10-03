<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Category;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => auth()->user()->posts()->paginate(50)
        ]);
    }

    public function create()
    {  
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        // validate the post
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'description' => 'required',
            'body' => 'required',
            'thumbnail' => 'image',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        // set the logged in user_id
        $attributes['user_id'] = auth()->id();

        // save the file in public directory and also return the path of it
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        // save the post in post table
        Post::create($attributes);

        // return back to homepage
        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Post $post)
    {
        // validate the post
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'description' => 'required',
            'body' => 'required',
            'thumbnail' => 'image',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        // save the file in public directory and also return the path of it
        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        // update the post
        $post->update($attributes);

        // return back to homepage
        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/')->with('success', 'Post Deleted!');
    }
}
