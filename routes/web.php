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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('parkir-masuk', ['as' => 'parkir.masuk', 'uses' => 'ParkirController@parkir_masuk_view']);
	Route::get('parkir-keluar', ['as' => 'parkir.keluar', 'uses' => 'ParkirController@parkir_keluar_view']);
	Route::get('monitoring', ['as' => 'monitoring', 'uses' => 'MonitoringController@index']);	
	Route::get('master/truk', ['as' => 'master.truk', 'uses' => 'MasterController@truk_index']);	
	Route::get('master/truk/create', ['as' => 'master.truk.create', 'uses' => 'MasterController@truk_create']);	
	Route::post('master/truk/store', ['as' => 'master.truk.store', 'uses' => 'MasterController@truk_store']);
	Route::delete('master/truk/destroy/{id}', ['as' => 'master.truk.destroy', 'uses' => 'MasterController@truk_destroy']);
	Route::get('master/truk/edit/{id}', ['as' => 'master.truk.edit', 'uses' => 'MasterController@truk_edit']);
	Route::put('master/truk/update', ['as' => 'master.truk.update', 'uses' => 'MasterController@truk_update']);
	Route::get('log', ['as' => 'loggings', 'uses' => 'LoggingController@index']);	

});


