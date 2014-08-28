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

Route::any("/", [
	"as"	=>	"user.login",
	"uses"	=>	"LoginController@login"
]);
Route::any("/login", [
	"as"	=>	"user.login",
	"uses"	=>	"LoginController@login"
]);

Route::group(["before" => "auth"], function() {
	Route::any("/apps", [
		"as"	=> 	"user.apps",
		"uses"	=>	"LoginController@apps"
	]);

	Route::any("/lab", [
		"as"	=>	"user.lab",
		"uses"	=>	"LabController@index"
	]);

	
	Route::get("lab/nuevo", function(){
		return View::make('lab.new');
	});
	Route::post("lab/nuevo", [
		"as" 	=> 	"user.lab",
		"uses"	=>	"LabController@create"
	]);
	
	Route::get("lab/{id}", [
		"as" 	=> 	"lab.customer",
		"uses"	=>	"LabController@show"
	]);
	Route::get("lab/{id}/nuevaOrden",[
			"as" 	=> 	"user.newOrder",
			"uses"	=>	"LabController@addOrderTo"
	]);
});