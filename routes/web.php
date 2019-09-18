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

Route::get('/', 'AlbumsController@homepage')->name('homepage');
Route::get('/albums', 'AlbumsController@index')->name('albums_list');
Route::get('/albums/create', 'AlbumsController@create')->name('album_create');
Route::get('/albums/{id}', 'AlbumsController@show')->name('show_album');
Route::post('/albums/store', 'AlbumsController@store')->name('album_store');

Route::get('/photos/create/{id}', 'PhotosController@create')->name('create_photo');
Route::post('/photos/store', 'PhotosController@store')->name('photo_store');
Route::get('/photos/{id}', 'PhotosController@show')->name('show_photo');
Route::delete('/photos/{id}', 'PhotosController@destroy')->name('delete_photo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
