<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoriesController@index');

Route::post('/categories', 'CategoriesController@store');

Route::get('/categories/create', 'CategoriesController@create');

Route::get('/categories/{category}/edit', 'CategoriesController@edit');

Route::patch('/categories/{category}/edit', 'CategoriesController@update');

Route::get('/tags', 'TagsController@index');

Route::post('/tags', 'TagsController@store');

Route::get('/tags/create', 'TagsController@create');

Route::get('/tags/{tag}/edit', 'TagsController@edit');

Route::patch('/tags/{tag}/edit', 'TagsController@update');

Route:: get('/posts', 'PostsController@index');

Route:: post('/posts', 'PostsController@store');

Route:: get('/posts/create', 'PostsController@create');

Route:: get('/posts/{post}/edit', 'PostsController@edit');

Route:: patch('/posts/{post}/edit', 'PostsController@update');



