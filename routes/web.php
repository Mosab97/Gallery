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


Route::get('/', ['as' => 'album.index','uses' => 'AlbumsController@index']);

Route::get('/albums', ['as' => 'album.index','uses' => 'AlbumsController@index']);

Route::get('/albums/create', ['as' => 'album.create','uses' => 'AlbumsController@create']);

Route::post('/albums/store', ['as' => 'album.store','uses' => 'AlbumsController@store']);


Route::get('/albums/show/{id}', ['as' => 'album.show','uses' => 'AlbumsController@show']);


Route::get('/photos/create/{id}', ['as' => 'photos.create','uses' => 'PhotosController@create']);


Route::post('/photos/store/{id?}', ['as' => 'photos.store','uses' => 'PhotosController@store']);

Route::get('/photos/show/{id}', ['as' => 'Photo.show','uses' => 'PhotosController@show']);
Route::delete('/photos/destroy/{id}', ['as' => 'Photo.destroy','uses' => 'PhotosController@destroy']);

