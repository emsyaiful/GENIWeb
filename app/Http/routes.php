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

Route::get('/index', function () {
	Blade::setEscapedContentTags('[[', ']]');
    Blade::setContentTags('[[[', ']]]');
    return view('pages/home');
});

Route::post('/contactus', 'UserController@contactUs');

Route::get('/detailberita', function(){
	return view('pages/portfolio');
});

Route::get('/faq', function(){
	return view('pages/faq');
});

Route::get('/cobacoba', function(){
	return view('admin/login');
});

// api
Route::group(['prefix' => 'api'], function()
{
	Route::post('register', 'AuthenticateController@register');
	Route::post('login', 'AuthenticateController@login');
	Route::post('reset', 'AuthenticateController@restPass');
	Route::get('reset', 'AuthenticateController@restPass');
});

// data
Route::get('/hash', 'UserController@hash');

Route::get('/twitter', function () {
    return redirect('http://twitter.com/it_bios');
});
Route::get('/facebook', function () {
    return redirect('http://facebook.com/Bina-Informasi-Optima-Solusindo-141167359572632');
});