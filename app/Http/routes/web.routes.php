<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/contactos', 'ContactController@index');
Route::post('/contactos', 'ContactController@sendEmail');