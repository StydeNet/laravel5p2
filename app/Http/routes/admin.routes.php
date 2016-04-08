<?php

use App\Post;
use Illuminate\Foundation\Http\Middleware\Authorize;

Route::bind('post', function ($post) {
    $post = new Post();
    $post->title = 'Esto es un ejemplo';

    return $post;
});

Route::get('dashboard', function () {
    return '<h1>Welcome to the admin panel</h1>';
})->middleware(Authorize::class.':view-dashboard');

Route::get('posts', function () {
    return 'List of posts';
})->middleware(Authorize::class.':view,'.Post::class);

Route::get('posts/create', function () {
    return 'Create a posts [form]';
});

Route::post('posts', function () {
    return 'Store a post in the DB';
});

Route::get('posts/{post}/edit', function ($post) {
    return 'Edit the post '.$post->title;
})->middleware(Authorize::class.':edit,post');

Route::put('posts/{post}', function () {
    return 'Update a post in the DB';
});

Route::delete('posts/{post}', function () {
    return 'Delete a post';
});