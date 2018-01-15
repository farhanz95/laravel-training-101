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

// Post Route Start
Route::get('/posts', 'PostController@index')->name('posts.index');

Route::get('/posts/create', 'PostController@create')->name('posts.create');

Route::get('/posts/edit/{id}', 'PostController@edit')->name('posts.edit');

Route::get('/posts/show/{id}', 'PostController@show')->name('posts.show');

Route::put('/posts', 'PostController@store')->name('posts.store');

Route::put('/posts/{id}', 'PostController@update')->name('posts.update');

Route::delete('/posts/{id}', 'PostController@destroy')->name('posts.destroy');
// Post Route End

// User Route Start
Route::get('/users','UserController@index')->name('users.index');

Route::get('/users/create','UserController@create')->name('users.create');

Route::get('/users/{id}/show','UserController@show')->name('users.show');

Route::get('/users/{id}/edit','UserController@edit')->name('users.edit');

Route::put('users/store','UserController@store')->name('users.store');

Route::put('users/{id}','UserController@update')->name('users.update');

Route::delete('users/{id}','UserController@destroy')->name('users.destroy');
// User Route End

Route::get('account/activate/{token}','Auth\ActivationController@activate')->name('account.activate');

Route::get('account/activation/request','Auth\ActivationController@request')->name('account.activation.request');

Route::post('account/resend/activation','Auth\ActivationController@resend')->name('account.activation.resend');