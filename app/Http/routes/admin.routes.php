<?php

use App\User;
use Illuminate\Foundation\Http\Middleware\Authorize;

Route::get('dashboard', function () {
    return '<h1>Welcome to the admin panel</h1>';
})->middleware(Authorize::class.':view-dashboard');

Route::resource('posts', 'PostController', ['parameters' => [
    'posts' => 'post'
]]);

Route::get('login-as/{id}', function ($id) {
    auth()->loginUsingId($id);

    return Redirect::to('/');
});

Route::get('users', function () {

    $users = User::all();

    return view('admin.users', compact('users'));

});