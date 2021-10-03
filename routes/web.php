<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);

Route::get('/authors/{author:username}', [AuthorController::class, 'show']);

// Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
// Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [LoginController::class, 'create'])->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->middleware('guest');

Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');


Route::middleware('can:users')->group(function () {
    Route::get('admin/posts/create', [AdminPostController::class, 'create']);
    Route::post('admin/posts', [AdminPostController::class, 'store']);
    Route::get('admin/posts', [AdminPostController::class, 'index']);
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
});

Route::middleware('can:admin')->group(function () {
    Route::get('admin/users/create', [AdminUserController::class, 'create']);
    Route::post('admin/users', [AdminUserController::class, 'store']);
    Route::get('admin/users', [AdminUserController::class, 'index']);
    Route::get('admin/users/{user}/edit', [AdminUserController::class, 'edit']);
    Route::patch('admin/users/{user}', [AdminUserController::class, 'update']);
    Route::delete('admin/users/{user}', [AdminUserController::class, 'destroy']);
});

