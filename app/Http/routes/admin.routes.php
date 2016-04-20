<?php

use Illuminate\Foundation\Http\Middleware\Authorize;

Route::get('dashboard', function () {
    return '<h1>Welcome to the admin panel</h1>';
})->middleware(Authorize::class.':view-dashboard');

Route::resource('posts', 'PostController', ['parameters' => [
    'posts' => 'post'
]]);