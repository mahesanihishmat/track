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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/verify/token/{token}', 'Auth\VerificationController@verify')->name('auth.verify'); 
 
Route::get('/verify/resend', 'Auth\VerificationController@resend')->name('auth.verify.resend');
 

 
// Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
// Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/backend/home', 'Backend\HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles','RoleController');
    Route::prefix('backend')->name('backend.')->group(function () {
    	 Route::resource('users','Backend\UserController');
  //   	Route::resource('users', 'UserController', [
		//     'as' => 'users'
		// ]);

	});
    Route::resource('products','ProductController');
});

