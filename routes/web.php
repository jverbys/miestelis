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

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
	'namespace' => 'Admin',
	'middleware' => 'admin',
	'prefix' => 'admin',
	'as' => 'admin.',
	], function () {
		Route::group([
			'prefix' => 'articles',
			'as' => 'articles.'
		], function () {
			Route::resource('categories', 'ArticleCategoryController')->except('show');
			Route::patch('{article}/image/{image}', 'ArticleMainImageController@update')->name('image.update');
		});
		Route::resource('articles', 'ArticleController');
});
