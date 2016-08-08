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
Blade::setEscapedContentTags('[[', ']]');
Blade::setContentTags('[[[', ']]]');

Route::get('/', function () {
    return view('pages/home');
});

Route::get('/dashboard', function () {
    return view('pages/dashboard');
});

Route::get('/index', function () {
    return view('pages/home');
});

Route::post('/contactus', 'UserController@contactUs');

Route::get('/detailberita', function(){
	return view('pages/portfolio');
});

Route::get('/faq', function(){
	return view('pages/faq');
});

Route::get('/doc', function(){
	return view('pages/doc');
});

Route::get('/login', function() {
	return view('pages/login');
});

Route::get('/register', function() {
	return view('pages/register');
});

// api
Route::group(['prefix' => 'api'], function()
{
	// authentification
	Route::post('register', 'AuthenticateController@register');
	Route::post('login', 'AuthenticateController@login');
	Route::post('reset', 'AuthenticateController@restPass');
	Route::get('reset', 'AuthenticateController@restPass');

	// admin page
	Route::get('getUser', 'AdminController@getUser');
	Route::put('alterUser', 'AdminController@alterUser');
	Route::put('delUser', 'AdminController@delUser');
});

// data
Route::get('/hash', 'UserController@hash');

Route::get('/twitter', function () {
    return redirect('http://twitter.com/it_bios');
});
Route::get('/facebook', function () {
    return redirect('http://facebook.com/Bina-Informasi-Optima-Solusindo-141167359572632');
});