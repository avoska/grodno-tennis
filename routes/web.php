<?php

Route::get('/register-request-table', 'RegController@rregistration_of_table_request')->name('register-request-table');
Route::group(['middleware'=>['auth']], function () {
	Route::get('/register', 'Controller@main');
	Route::get('/login', 'Controller@main');
});
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

Route::get('my-matches','ProfileController@profile')->name('my-matches');
Route::get('all-players','ProfileController@profile_all_players')->name('all-players');
Route::get('add-request','ProfileController@add_request')->name('add-request');
Route::get('personal-data','ProfileController@profile_my_data')->name('personal-data');
Route::get('invites','ProfileController@profile_invites')->name('invites');
Route::get('my-requests','ProfileController@profile_my_requests')->name('my-requests');
Route::get('my-requests/{id}','ProfileController@delete_request')->name('delete-request');
Route::get('invites/delete/{id}','ProfileController@delete_request_in_invites')->name('delete-request-in-invites');
Route::get('invites/add/{id}','ProfileController@add_match')->name('add-match');
Route::post('personal-room-update','UpdateController@store')->name('updateUsers');
Route::post('personal-room-upload','UploadController@upload')->name('upload');
Route::get('atom', 'Controller@atom')->name('atom');


Auth::routes();




Auth::routes();

