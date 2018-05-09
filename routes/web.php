<?php

Route::get('/register-request-table', 'RegController@rregistration_of_table_request')->name('register-request-table');

Route::get('/register', 'Auth\AuthController@register')->name('gggg');
//Route::group(['prefix'=>'admin','middleware'=>['web','auth']], function () {
Route::group(['middleware'=>['auth']], function () {
	Route::get('/admin-index',['uses'=>'Admin\AdminController@show'])->name('admin-index');
	Route::get('/add-tournament',['uses'=>'Admin\AdminPostController@show'])->name('admin-add-tournament');
	Route::post('/add-tournament-post',['uses'=>'Admin\AdminPostController@create'])->name('admin-add-post-tournament');
	Route::get('/update-tournament',['uses'=>'Admin\AdminUpdatePostController@show'])->name('admin-update-tournament');
	Route::post('/update-tournament-post',['uses'=>'Admin\AdminUpdatePostController@create'])->name('admin-update-post-tournament');
	Route::get('/add-playground',['uses'=>'Admin\AdminPostController@show'])->name('admin-add-playground');
	Route::post('/add-playground-post',['uses'=>'Admin\AdminPostController@create'])->name('admin-add-post-playground');
	Route::get('/update-playground',['uses'=>'Admin\AdminUpdatePostController@show'])->name('admin-update-playground');
	Route::post('/update-playground-post',['uses'=>'Admin\AdminUpdatePostController@create'])->name('admin-update-post-playground');
});

Route::get('/', 'Controller@main')->name('main');

Route::get('personal-room','ProfileController@profile')->name('personal-room');
Route::get('personal-room-all-players','ProfileController@profile_all_players')->name('personal-room-all-players');
Route::get('personal-room-my-data','ProfileController@profile_my_data')->name('personal-room-my-data');
Route::get('personal-room-invites','ProfileController@profile_invites')->name('personal-room-invites');
Route::get('personal-room-my-requests','ProfileController@profile_my_requests')->name('personal-room-my-requests');
Route::get('personal-room-my-requests/{id}','ProfileController@delete_request')->name('delete-request');
Route::post('personal-room-update','UpdateController@store')->name('updateUsers');
Route::post('personal-room-upload','UploadController@upload')->name('upload');
Route::get('atom', 'Controller@atom')->name('atom');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
