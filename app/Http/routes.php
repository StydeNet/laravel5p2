<?php

$router->get('/', function () {
    return view('welcome');
});

$router->auth();

$router->get('/home', 'HomeController@index');