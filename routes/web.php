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


Route::get('/', 'HomeController@index')->name('index');
Route::get('/movies', 'MoviesController@index')->name('moviesHome');
Route::get('/movies/{id}', 'MoviesController@getMovie')->name('movieHome');
Route::get('/movies/{movieId}/favoritar', 'MoviesController@favoritar')->name('favoriteMovie');
Route::get('/movies/{movieId}/desfavoritar', 'MoviesController@desFavoritar')->name('favoriteMovieDelete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
