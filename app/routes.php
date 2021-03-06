<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('/product', 'ProductController@index');
Route::get('/product/{id}', 'ProductController@show');
Route::post('/product', 'ProductController@create');
Route::put('/product/{id}', 'ProductController@save');
Route::delete('/product/{id}', 'ProductController@remove');
Route::get('/merchant', 'MerchantController@index');
Route::get('/merchant/{id}', 'MerchantController@show');
Route::post('/merchant', 'MerchantController@create');

