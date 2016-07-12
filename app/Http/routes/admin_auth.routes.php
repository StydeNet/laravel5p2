<?php

// Authentication Routes...
$router->get('login', 'Auth\AuthController@showLoginForm');
$router->post('login', 'Auth\AuthController@login');
$router->get('logout', 'Auth\AuthController@logout');

// Registration Routes...

// Password Reset Routes...
$router->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$router->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$router->post('password/reset', 'Auth\PasswordController@reset');