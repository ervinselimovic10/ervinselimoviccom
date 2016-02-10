<?php

$router->map('GET', '/', 'Onz\Controllers\PageController@getHomePage', 'home');

$router->map('GET', '/register', 'Onz\Controllers\RegisterController@getRegisterPage', 'register');
$router->map('POST', '/register', 'Onz\Controllers\RegisterController@postRegisterPage', 'p_register');

$router->map('GET', '/login', 'Onz\Controllers\LoginController@getLoginPage', 'login');
$router->map('POST', '/login', 'Onz\Controllers\LoginController@postLoginPage', 'p_login');

