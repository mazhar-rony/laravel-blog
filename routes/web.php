<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/pdf', 'HomeController@genReport');

Route::get('/profile', 'ProfileController@profile');

Route::get('/profile/edit', 'ProfileController@edit');

Route::post('/profile/edit', 'ProfileController@update');

// 'admin' middleware applied in Categories Controller

Route::get('/categories', 'CategoriesController@index');

Route::post('/categories', 'CategoriesController@store');

Route::get('/categories/create', 'CategoriesController@create');

Route::get('/categories/{category}/edit', 'CategoriesController@edit');

Route::patch('/categories/{category}/edit', 'CategoriesController@update');

// 'admin' middleware applied in Tags Controller

Route::get('/tags', 'TagsController@index');

Route::post('/tags', 'TagsController@store');

Route::get('/tags/create', 'TagsController@create');

Route::get('/tags/{tag}/edit', 'TagsController@edit');

Route::patch('/tags/{tag}/edit', 'TagsController@update');

Route:: get('/posts', 'PostsController@index')->middleware('admin');// middleware can also declare in constructor

Route:: post('/posts', 'PostsController@store')->middleware('admin');// middleware can also declare in constructor

Route:: get('/posts/create', 'PostsController@create')->middleware('admin');// middleware can also declare in constructor

Route:: get('/posts/{post}', 'HomeController@show');

Route:: get('/posts/{post}/edit', 'PostsController@edit')->middleware('admin');

Route:: patch('/posts/{post}/edit', 'PostsController@update')->middleware('admin');

Route:: get('/posts/{post}/approve', 'PostsController@approve')->middleware('admin');

Route:: post('/posts/{post}/comments', 'CommentsController@store')->middleware('auth');

Route:: get('/posts/{post}/liked', 'CommentsController@postLike')->middleware('auth');

Route:: get('/posts/{category}/category', 'SearchController@searchPostByCategory');

//when using Route Name: <a href="{{ route('search.tag', ['tag' => $tag->id]) }}">{{ $tag->name }}</a>
Route:: get('/posts/{tag}/tag', 'SearchController@searchPostByTag')->name('search.tag');

Route:: get('/comments/{comment}/liked', 'CommentsController@commentLike')->middleware('auth');



