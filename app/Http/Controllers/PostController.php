<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        // checking the user is loggedin or not
        if (auth()->check()) {
            if(auth()->user()->can('admin')) {
                $posts = Post::latest()
                              ->filter(request(['search']))
                              ->paginate(6);
            } else {
                $posts = auth()->user()
                            ->posts()
                            ->latest()
                            ->filter(request(['search']))
                            ->paginate(6);
            }
        } else {
            $posts = Post::latest()
                        ->filter(request(['search']))
                        ->paginate(6);
        }
        

        return view('posts.index', [
            "posts" => $posts, // eager loading within Eloquent model
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
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
            'slug' => 'required|unique:posts,slug',
            'description' => 'required',
            'body' => 'required',
            'thumbnail' => 'required:image',
            'category_id' => 'required|exists:categories,id'
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
}
