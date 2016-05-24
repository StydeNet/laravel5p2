<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('edit-profile', 'ProfileController@edit');
Route::put('edit-profile', 'ProfileController@update');