<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('movies', 'MovieController@getAll')->name('allMovies');

Route::post('movies', 'MovieController@create')->name('createMovie');

Route::get('movies/{id}', 'MovieController@getById')->name('movie');

Route::put('movies/{id}', 'MovieController@update')->name('updateMovie');


Route::get('genres', 'GenreController@getAll')->name('allGenres');

Route::get('genres/{id}', 'GenreController@getById')->name('Genre');

Route::post('genres', 'GenreController@create')->name('createGenre');

Route::put('genres/{id}', 'GenreController@update')->name('updateGenre');
