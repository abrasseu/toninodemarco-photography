<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
	// Home
	Route::get('', 'PagesController@index')->name('home');

	// Links
	// Route::get('links', 'PagesController@links')->name('links');

	//Contact
	Route::get('contact', 'ContactController@getMessage')->name('contact');
	Route::post('contact', 'ContactController@postMessage');

	// Portfolio
	Route::get('portfolio/{id?}', 'PagesController@portfolio')->where('id', '[0-9]+')->name('portfolio');

	//About me
	Route::get('about', 'PagesController@about')->name('about');

	// Mentions légales
	Route::get('mentions-legales', 'PagesController@mentionsLegales')->name('mentions-legales');
/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
	Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
	{
		Route::get('', 'PagesController@showAdmin')->name('admin.index');

		// Slides select
		Route::get('slides/select', 'SlidesController@select')->name('slides.select');
		Route::post('slides/updateAll', 'SlidesController@updateAll')->name('slides.updateAll');

		Route::get('folders/{folder}/select', 'InFolderController@select')->name('folders.select');
		Route::post('folders/{folder}/updateAll', 'InFolderController@updateAll')->name('folders.updateAll');

		Route::resource('links', 'LinksController');
		Route::resource('links', 'LinksController');
		Route::resource('photos', 'PhotosController');
		Route::resource('slides', 'SlidesController');
		Route::resource('folders', 'FoldersController');

		// FIXME method_field('METH')

		// Destroy via link
		Route::get('links/{link}/destroy', 'LinksController@destroy')->name('links.destroy');
		Route::get('folders/{folder}/destroy', 'FoldersController@destroy')->name('folders.destroy');
		Route::get('slides/{slide}/destroy', 'SlidesController@destroy')->name('slides.destroy');

		Route::get('photos/{photo}/destroy', 'PhotosController@destroy')->name('photos.destroy');
		Route::get('photos/{photo}/destroy/{force?}', 'PhotosController@destroy')->name('photos.destroy.force');

		Route::get('folders/{folder}/add', 'InFolderController@add')->name('folders.add');
		Route::put('folders/{folder}/add', 'InFolderController@attach')->name('folders.attach');
		Route::get('folders/{folder}/photos/{photo}', 'InFolderController@detach')->name('folders.detach');

		// Console
		Route::group(['prefix' => 'console'], function()
		{
			Route::get('', 'AdminConsoleController@index')->name('console.index');
			Route::get('{command}/{force?}', 'AdminConsoleController@command')->name('console.command');
		});

/*			RESOURCES ROUTES

GET|HEAD		| admin/links                  | links.index          | App\Http\Controllers\LinksController@index
GET|HEAD		| admin/links/create           | links.create         | App\Http\Controllers\LinksController@create
PUT|PATCH		| admin/links/{link}           | links.update         | App\Http\Controllers\LinksController@update
DELETE			| admin/links/{link}           | links.destroy        | App\Http\Controllers\LinksController@destroy
GET|HEAD		| admin/links/{link}           | links.show           | App\Http\Controllers\LinksController@show 
GET|HEAD		| admin/links/{link}/edit      | links.edit           | App\Http\Controllers\LinksController@edit 
*/

		// Route::any('hash', 'PagesController@hash');

	});		// Fin Admin


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

	// Authentication Routes...
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');

	// Registration Routes...
	// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	// Route::post('register', 'Auth\RegisterController@register');
	// TODO : Block register

	// Password Reset Routes...
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset');


