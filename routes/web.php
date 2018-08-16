<?php


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', 'PostController@post')->middleware('auth');

Route::get('/profiles', 'ProfileController@profiles')->middleware('auth');

Route::get('/category', 'categoryController@categories')->middleware('auth');

Route::post('/addCategory', 'categoryController@addCategory')->middleware('auth');

Route::post('/addProfile', 'profileController@addProfile')->middleware('auth');

Route::post('/addPost', 'PostController@addPost')->middleware('auth');

Route::get('/view/{id}', 'PostController@view')->middleware('auth');

Route::get('/edit/{id}', 'PostController@edit')->middleware('auth');

Route::post('/editPost/{id}', 'PostController@editPost')->middleware('auth');

Route::get('/delete/{id}', 'PostController@deletePost')->middleware('auth');

Route::get('/category/{id}', 'PostController@category')->middleware('auth');

Route::get('/like/{id}', 'PostController@like')->middleware('auth');

Route::get('/dislike/{id}', 'PostController@dislike')->middleware('auth');

Route::post('/comment/{id}', 'PostController@comment')->middleware('auth');

Route::post('/search', 'PostController@search')->middleware('auth');
