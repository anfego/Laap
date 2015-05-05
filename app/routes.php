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
// for variables and all things Blade
Blade::setContentTags('<%', '%>');
// for escaped data
Blade::setEscapedContentTags('<%%', '%%>');

Route::any("/", [
    "as"  =>  "user.login",
    "uses"  =>  "LoginController@login"
]);
Route::any("/login", [
    "as"  =>  "user.login",
    "uses"  =>  "LoginController@login"
]);

Route::group(["before" => "auth"], function() {
    Route::any("/home", [
        "as"  =>  "user.home",
        "uses"  =>  "LoginController@home"
    ]);
    Route::get("/persons", function() {
        $persons = Person::all();
        return  $persons;
    });
    Route::get('/person/{id}', 'PersonController@show');
    Route::post('/person', 'PersonController@create');
    Route::put('/person/{id}', 'PersonController@edit');
    Route::any('/logout', 'LoginController@logout');
});