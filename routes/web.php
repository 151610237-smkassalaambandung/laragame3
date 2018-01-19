<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/home', 'HomeController@index');
Route::group(['prefix'=>'guest'], function(){

		Route::resource('home','GuestController');

	});


Auth::routes();

Route::get('/', 'GuestController@index');
Route::get('/register',function()
{
	return view('errors.403');
});

Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']], function(){
	Route::resource('kategoris', 'KategoriController');
	Route::resource('beritas', 'BeritaController');
	Route::resource('rumah','AdminController');


});