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


// Route::get('/', function()
// {
//     return View::make('hello');
// });

// Route::get('/', function()
// {
//     return View::make('home');
// });

// Route::get('test', 'LoginController@getIndex');

Route::any("/login", [
	"as"   => "user.login",
	"uses" => "LoginController@login"
]);
Route::any("/apps", [
	"as"   => "user.apps",
	"uses" => "LoginController@apps"
]);
// Route::get('/', 'HomeController@showWelcome');

// Route::get('test', array('uses' => 'LoginController@index');
// {
// 	// return View::make('hello');
//     return View::make('layouts.master');
// });