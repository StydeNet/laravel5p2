<?php

use App\User;
use Illuminate\Foundation\Http\Middleware\Authorize;

Route::get('dashboard', function () {
    return '<h1>Welcome to the admin panel</h1>';
});

Route::resource('posts', 'PostController', ['parameters' => [
    'posts' => 'post'
]]);

Route::get('login-as/{id}', function ($id) {
    auth()->loginUsingId($id);

    return Redirect::to('/');
});

Route::resource('users', 'UserController', ['parameters' => [
    'users' => 'user'
]]);