<?php

Route::get('/register-main', 'RegController@store')->name('register-main');
Route::get('login', 'Auth\LoginController@login')->name('login');
//Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware->guest'], function () {
});

Route::get('/', 'Controller@main')->name('main');

Route::get('personal-room',['middleware' => ['auth'], 'uses'=>'Controller@personal_room'])->name('personal-room');
Route::get('atom', 'Controller@atom')->name('atom');

Auth::routes();


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
