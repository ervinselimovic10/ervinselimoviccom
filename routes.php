<?php

$router->map('GET', '/', 'Onz\Controllers\PageController@getHomePage', 'home'); 
$router->map('GET', '/blog', 'Onz\Controllers\PageController@getBlog', 'blog');
$router->map('POST', '/blog', 'Onz\Controllers\PageController@postSearch', 'search');
$router->map('GET', '/vux0knNl2XPj4qei2az4D82mnWmu5ULp', 'Onz\Controllers\NewPassController@getNewPass', 'new_pass');
$router->map('POST', '/vux0knNl2XPj4qei2az4D82mnWmu5ULp', 'Onz\Controllers\NewPassController@postNewPass', 'p_new_pass');
$router->map('GET', '/cookies', 'Onz\Controllers\PageController@getCookies', 'cookies');

if (Onz\Auth\LoggedIn::user()) {
  $router->map('GET', '/logout', 'Onz\Controllers\LoginController@getLogout', 'logout');
  $router->map('GET', '/profile', 'Onz\Controllers\ProfileController@getProfile', 'profile');
  $router->map('POST', '/profile', 'Onz\Controllers\ProfileController@postProfile', 'p_profile');
  $router->map('GET', '/5E32JWSATE1cqzs2iCHcP3ixsx1z308d', 'Onz\Controllers\ProfileController@getChangePass', 'change_pass');
  $router->map('POST', '/5E32JWSATE1cqzs2iCHcP3ixsx1z308d', 'Onz\Controllers\ProfileController@postChangePass', 'p_change_pass');
  $router->map('GET', '/MRT99y1i73Xsej9KZr0K8O77t7DTldnQ', 'Onz\Controllers\ProfileController@getDeleteAcc', 'delete_acc');
  $router->map('POST', '/MRT99y1i73Xsej9KZr0K8O77t7DTldnQ', 'Onz\Controllers\ProfileController@postDeleteAcc', 'p_delete_acc');
} else {
  $router->map('GET', '/register', 'Onz\Controllers\RegisterController@getRegisterPage', 'register');
  $router->map('POST', '/register', 'Onz\Controllers\RegisterController@postRegisterPage', 'p_register');
  $router->map('GET', '/activate-acc', 'Onz\Controllers\RegisterController@getActivateAcc', 'activate_acc');

  $router->map('GET', '/login', 'Onz\Controllers\LoginController@getLoginPage', 'login');
  $router->map('POST', '/login', 'Onz\Controllers\LoginController@postLoginPage', 'p_login');
}

if ((Onz\Auth\LoggedIn::user()) && (Onz\Auth\LoggedIn::user()->access_level == 666)) {
  $router->map('POST', '/40c2CxwIB370zVGDGsV0905kAK6SWXas', 'Onz\Controllers\AdminController@postSavePage', 'save_page');
  $router->map('GET', '/E4tHR2ItQGcka7MBHXxkCDO1oGM8JC8m', 'Onz\Controllers\AdminController@getAddPage', 'add_page');
  $router->map('POST', '/E4tHR2ItQGcka7MBHXxkCDO1oGM8JC8m', 'Onz\Controllers\AdminController@postAddPage', 'p_add_page');
  $router->map('GET', '/6qOdy7uoRhYAHG5ZuNPROvPTlvQ84069', 'Onz\Controllers\AdminController@getDeletePage', 'delete_page');
  $router->map('POST', '/6qOdy7uoRhYAHG5ZuNPROvPTlvQ84069', 'Onz\Controllers\AdminController@postDeletePage', 'p_delete_page');
  $router->map('GET', '/Pt6u79I8GFnSvJl8bAS3mv0LcJEvrhae', 'Onz\Controllers\AdminController@getAddCat', 'add_cat');
  $router->map('POST', '/Pt6u79I8GFnSvJl8bAS3mv0LcJEvrhae', 'Onz\Controllers\AdminController@postAddCat', 'p_add_cat');
  $router->map('GET', '/dUsJm6kP499O409X0BDTIT0SbB1UH2cc', 'Onz\Controllers\AdminController@getUploadImg', 'img_up');
  $router->map('POST', '/dUsJm6kP499O409X0BDTIT0SbB1UH2cc', 'Onz\Controllers\AdminController@postUploadImg', 'p_img_up');

  $router->map('GET', '/x1dB59d3Sr60f8OxA8m0739KMfvey7EZ', 'Onz\Controllers\AdminController@getUsers', 'users');
  $router->map('POST', '/x1dB59d3Sr60f8OxA8m0739KMfvey7EZ', 'Onz\Controllers\AdminController@postUsers', 'p_users');
}

// Must be the last to check!
$router->map('GET', '/[*]', 'Onz\Controllers\PageController@getPage', 'page');
$router->map('POST', '/[*]', 'Onz\Controllers\PageController@postPage', 'post_page');



