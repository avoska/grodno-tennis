<?php

Route::get('/register-request-table', 'RegController@rregistration_of_table_request')->name('register-request-table');

//Route::group(['prefix'=>'admin','middleware'=>['web','auth']], function () {
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin-index', ['uses' => 'Admin\AdminController@show'])->name('admin-index');

    Route::get('/admin-table-tournaments', ['uses' => 'Admin\AdminController@table_tournaments'])->name('admin-table-tournaments');
    Route::get('/players-for-tournament/{id}', ['uses' => 'Admin\AdminController@players_for_tournament'])->name('players-for-tournament');
    Route::get('/send-tournament-invite/{id}', ['uses' => 'Admin\AdminController@send_tournament_invite'])->name('send-tournament-invite');
    Route::get('/delete-tournament-player/{id}', ['uses' => 'Admin\AdminController@delete_tournament_player'])->name('delete-tournament-player');
    Route::get('/tournament-requests/{id}', ['uses' => 'Admin\AdminController@tournament_requests'])->name('tournament-requests');
    Route::get('/admin-accept-request/{id}', ['uses' => 'Admin\AdminController@admin_accept_request'])->name('admin-accept-request');
    Route::get('/admin-delete-request/{id}', ['uses' => 'Admin\AdminController@admin_delete_request'])->name('admin-delete-request');
    Route::get('/admin-tournaments-for-delete', ['uses' => 'Admin\AdminController@admin_tournaments_for_delete'])->name('admin-tournaments-for-delete');
    Route::get('/delete-tournament/{id}', ['uses' => 'Admin\AdminController@delete_tournament'])->name('delete-tournament');
    Route::get('/tournament-players/{id}', ['uses' => 'Admin\AdminController@tournament_players'])->name('tournament-players');

    Route::get('/add-tournament', ['uses' => 'Admin\AdminPostController@show_add_tournament'])->name('admin-add-tournament');
    Route::post('/add-tournament-post', ['uses' => 'Admin\AdminPostController@create_tournament'])->name('admin-add-post-tournament');
    Route::get('/update-tournament', ['uses' => 'Admin\AdminUpdatePostController@show_update_tournament'])->name('admin-update-tournament');
    Route::post('/update-tournament-post/{id}', ['uses' => 'Admin\AdminUpdatePostController@update_tournament'])->name('admin-update-post-tournament');
    Route::get('/admin-searched-tournament/{id}', ['uses' => 'Admin\AdminUpdatePostController@show_searched_tournament'])->name('admin-searched-tournament');

    Route::get('/add-playground', ['uses' => 'Admin\AdminPostController@show_add_playground'])->name('admin-add-playground');
    Route::post('/add-playground-post', ['uses' => 'Admin\AdminPostController@create_playground'])->name('admin-add-post-playground');
    Route::get('/update-playground', ['uses' => 'Admin\AdminUpdatePostController@show_update_playground'])->name('admin-update-playground');
    Route::post('/update-playground-post/{id}', ['uses' => 'Admin\AdminUpdatePostController@update_playground'])->name('admin-update-post-playground');
    Route::get('/admin-searched-playground/{id}', ['uses' => 'Admin\AdminUpdatePostController@show_searched_playground'])->name('admin-searched-playground');

    Route::get('/admin-all-players', ['uses' => 'Admin\AdminUpdatePostController@show_all_players'])->name('admin-all-players');
    Route::get('/admin-searched-player/{id}', ['uses' => 'Admin\AdminUpdatePostController@show_searched_player'])->name('admin-searched-player');
    Route::post('/admin-update-player/{id}', ['uses' => 'Admin\AdminUpdatePostController@update_players'])->name('admin-update-player');
    Route::get('/delete-player/{id}', ['uses' => 'Admin\AdminUpdatePostController@delete_player'])->name('delete-player');
});

Route::get('/', 'Controller@main')->name('main');

Route::get('my-matches', 'ProfileController@profile')->name('my-matches');
Route::get('all-players', 'ProfileController@profile_all_players')->name('all-players');
Route::get('add-request', 'ProfileController@add_request')->name('add-request');
Route::get('personal-data', 'ProfileController@profile_my_data')->name('personal-data');
Route::get('invites', 'ProfileController@profile_invites')->name('invites');
Route::get('my-requests', 'ProfileController@profile_my_requests')->name('my-requests');
Route::get('tournaments', 'ProfileController@profile_tournaments')->name('tournaments');
Route::get('send-tournament-request/{id}', 'ProfileController@send_tournament_request')->name('send-tournament-request');
Route::get('delete-my-requests/{id}', 'ProfileController@delete_request')->name('delete-request');
Route::get('delete-tournament-request/{id}', 'ProfileController@delete_tournament_request')->name('delete-tournament-request');
Route::get('invites/delete/{id}', 'ProfileController@delete_request_in_invites')->name('delete-request-in-invites');
Route::get('tournament-invites/delete/{id}', 'ProfileController@delete_tournament_request_in_invites')->name('delete-tournament-request-in-invites');
Route::get('invites/add/{id}', 'ProfileController@add_match')->name('add-match');
Route::get('accept-tournament/{id}', 'ProfileController@accept_tournament')->name('accept-tournament');
Route::post('personal-room-update', 'UpdateController@store')->name('updateUsers');
Route::post('personal-room-upload/{id}', 'UploadController@upload')->name('upload');
Route::post('admin-upload/{id}', 'UploadController@admin_upload_avatar')->name('admin-upload');
Route::get('atom', 'Controller@atom')->name('atom');

Route::get('admin-searchSimple', 'SearchController@admin_index')->name('admin-searchSimple');
Route::get('searchSimple', 'SearchController@index')->name('searchSimple');
Route::get('admin-tournament-searchSimple/{id}', 'SearchController@admin_tournament_searchSimple')->name('admin-tournament-searchSimple');

Auth::routes();

Auth::routes();

