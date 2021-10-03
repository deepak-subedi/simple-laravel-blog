<?php

namespace App\Http\Controllers;

use App\Models\User;

class AuthorController extends Controller
{
    public function show(User $author)
    {
        return view('posts.index', [
            // 'posts' => $author->posts
            // 'posts' => $author->posts->load(['category', 'author']) // Lazy/eager loading, to solve N+1
            'posts' => $author->posts()->paginate(6) // eager loading within Eloquent model
        ]);
    }
}
