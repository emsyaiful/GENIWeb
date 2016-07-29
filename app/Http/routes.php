<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	Blade::setEscapedContentTags('[[', ']]');
    Blade::setContentTags('[[[', ']]]');
    return view('pages/home');
});

Route::post('/contactus', 'UserController@contactUs');

// api
Route::group(['prefix' => 'api'], function()
{
	Route::post('register', 'AuthenticateController@register');
	Route::get('login', 'AuthenticateController@login');
	Route::group(['middleware'  => 'jwt-auth'], function(){
		Route::get('get_user_details', 'AuthenticateController@getUser_details');
	});
});

// data
Route::get('/getUser', 'UserController@getUser');

Route::get('/hash', 'UserController@hash');

Route::get('/twitter', function () {
    return redirect('http://twitter.com/it_bios');
});
Route::get('/facebook', function () {
    return redirect('http://facebook.com/Bina-Informasi-Optima-Solusindo-141167359572632');
});