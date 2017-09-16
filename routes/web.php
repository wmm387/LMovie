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

Route::get('movie', 'MovieListController@index');

Route::group(['prefix' => 'wmm', 'namespace' => 'Admin',
				'middleware' => 'auth'], function() {

	Route::get('movie', 'MovieController@index');
	Route::get('movie/create', 'MovieController@create');
	Route::post('movie/store', 'MovieController@store');

});
Auth::routes();