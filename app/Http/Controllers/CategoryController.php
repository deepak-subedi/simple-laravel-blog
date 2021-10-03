<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return view('posts.index', [
            // 'posts' => $category->posts
            // 'posts' => $category->posts->load(['category', 'author']) // Lazy/eager loading, to solve N+1
            'posts' => $category->posts()->paginate(6) // eager loading within Eloquent model
        ]);
    }
}
