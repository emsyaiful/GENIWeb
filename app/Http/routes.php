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

Route::get('/detailberita/{id}',  'UserController@detailBerita');

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

Route::get('/konfirmasi', function() {
	return view('pages/konfirmasi');
});

// api
Route::group(['prefix' => 'api'], function()
{
	// authentification
	Route::post('register', 'AuthenticateController@register');
	Route::post('login', 'AuthenticateController@login');

	Route::group(['middleware' => 'jwt.auth'], function(){
		Route::post('reset', 'AuthenticateController@restPass');
		Route::get('reset', 'AuthenticateController@restPass');

		// admin page
		Route::get('userLogged', 'AdminController@getLogged');
		Route::get('getUser', 'AdminController@getUser');
		Route::put('alterUser', 'AdminController@alterUser');
		Route::put('delUser', 'AdminController@delUser');

		Route::get('payment', 'AdminController@getPay');
		Route::put('payment', 'AdminController@confirmPay');

		Route::get('tagihan', 'AdminController@getTagihan');

		Route::get('riwayat', 'AdminController@getRiwayat');

		Route::get('pesan', 'AdminController@getPesan');
		Route::put('pesan', 'AdminController@delPesan');

		Route::get('berita', 'AdminController@getBerita');
		Route::post('berita', 'AdminController@pubBerita');
		Route::put('berita', 'AdminController@editBerita');
		Route::put('berita/{id}', 'AdminController@delBerita');

		Route::post('konfirmasi', 'AdminController@setConfirmasi');
	});
	Route::get('beritaView', 'UserController@beritaTerbaru');
});

// data
Route::get('/hash', 'UserController@hash');

Route::get('/twitter', function () {
    return redirect('http://twitter.com/it_bios');
});
Route::get('/facebook', function () {
    return redirect('http://facebook.com/Bina-Informasi-Optima-Solusindo-141167359572632');
});