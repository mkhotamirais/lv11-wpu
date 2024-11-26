<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'home page']);
});

Route::get('/posts', function () {
    // $posts = Post::with(['author', 'category'])->latest()->get();

    // $posts = Post::latest()->get();

    // if (request('search')) {
    //     $posts->where('title', 'like', '%' . request('search') . '%');
    //     // ->orWhere('body', 'like', '%' . request('search') . '%');
    // }

    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString();

    return view('posts', ['title' => 'posts page', 'posts' => $posts]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'single post page', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    // $posts = $user->posts->load('category', 'author');
    return view('posts', ['title' => count($user->posts) . " Articles by $user->name", 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    // $posts = $category->posts->load('category', 'author');
    return view('posts', ['title' => "Articles in $category->name", 'posts' => $category->posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'about page']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'contact page']);
});