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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', 'PostController@index')->name('post.index');

Route::get('/post/create', 'PostController@create')->name('post.create');

Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');

Route::get('/post/show/{id}', 'PostController@show')->name('post.show');

Route::put('/post/{id}', 'PostController@update')->name('post.update');

Route::put('/post', 'PostController@store')->name('post.store');

Route::delete('/post/{id}', 'PostController@destroy')->name('post.destroy');
