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


Route::group(['middleware' => ['web']], function () {
	Route::resource('liblary', 'BukuController');
	Route::resource('buku', 'BukuController');
	Route::resource('peminjaman', 'PeminjamanController');
	Route::post ( '/deleteItem', 'BukuController@deleteItem' );
	Route::post ( '/addItem', 'BukuController@addItem' );
	Route::post ( '/editItem', 'BukuController@editItem' );
	Auth::routes();

Route::get('liblary', 'HomeController@index');

});


