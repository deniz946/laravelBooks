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


Route::get('/lara/public', 'BooksController@index');

Route::resource('lara/public/books', 'BooksController');

Route::group(['prefix' => 'admin', "middleware" => 'auth'], function(){

	Route::get('/', 'AdminController@index');

	//ROLES ROUTES
	Route::resource('roles', 'RolesController');

	//PERMISSIONS ROUTES
	Route::resource('permissions', 'PermissionsController');

	//USERS ROUTES
	Route::resource('users', 'UsersController');
	Route::get('/users/profile', 'UsersController@profile');
});

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function(){
	
	Route::get('profile', ['uses' => 'UsersController@profile',
		'as' => 'users.profile']);
});


Route::auth();

