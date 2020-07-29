<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoriesController@index');

Route::post('/categories', 'CategoriesController@store');

Route::get('/categories/create', 'CategoriesController@create');

Route::get('/categories/{category}/edit', 'CategoriesController@edit');

Route::patch('/categories/{category}/edit', 'CategoriesController@update');

Route:: get('/posts', 'PostsController@index');

Route:: post('/posts', 'PostsController@store');

Route:: get('/posts/create', 'PostsController@create');



