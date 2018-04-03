<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('registration', 'Controller@registration')->name('registration');
Route::get('personal-room', 'Controller@personal_room')->name('personal-room');
Route::get('atom', 'Controller@atom')->name('atom');
Route::get('/', 'Controller@main')->name('main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
