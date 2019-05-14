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





Route::group(['middleware' =>['auth','admin']],function () {
	Route::namespace('Admin')->prefix('dashboard')->group(function () {
		Route::get('/', 'AdminController@index')->name('dash');

///////////////////////////////////category\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
		Route::prefix('category')->group(function () {
			Route::get('/', 'CategoryController@index')->name('c.index');
			Route::get('/{id}', 'CategoryController@edit')->name('c.edit');
			Route::post('/store', 'CategoryController@store')->name('c.store');
			Route::put('/{id}', 'CategoryController@store')->name('c.update');
			Route::delete('/{id}', 'CategoryController@destroy')->name('c.destroy');
		});

///////////////////////////////////product\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
		Route::prefix('product')->group(function () {
			Route::get('/', 'ProductController@index')->name('p.index');
			Route::get('/create', 'ProductController@create')->name('p.create');
			Route::get('/{id}', 'ProductController@edit')->name('p.edit');
			Route::post('/store', 'ProductController@store')->name('p.store');
			Route::put('/{id}', 'ProductController@store')->name('p.update');
			Route::delete('/{id}', 'ProductController@destroy')->name('p.destroy');
			Route::get('/duplicate/{id}', 'ProductController@duplicate')->name('p.dup');

		});
///////////////////////////////////publication\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
		Route::prefix('publication')->group(function () {
			Route::get('/', 'PublicationController@index')->name('pub.index');
			Route::get('/create', 'PublicationController@create')->name('pub.create');
			Route::get('/{id}', 'PublicationController@edit')->name('pub.edit');
			Route::post('/store', 'PublicationController@store')->name('pub.store');
			Route::put('/{id}', 'PublicationController@store')->name('pub.update');
			Route::delete('/{id}', 'PublicationController@destroy')->name('pub.destroy');
			Route::get('/duplicate/{id}', 'PublicationController@duplicate')->name('pub.dup');

		});


	});

///////////////////////////////////order\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
		Route::get('/dashboard/order', 'OrderController@index')->name('o.index');
		Route::post('/order/store', 'OrderController@store')->name('o.store');
		Route::get('/dashboard/order/{id}', 'OrderController@show')->name('o.show');
		Route::delete('/dashboard/order/{id}', 'OrderController@destroy')->name('o.destroy');

});
	Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'FrontController@main')->name('main');
Route::get('/product', 'FrontController@product')->name('product');
Route::get('/{slug}', 'FrontController@index')->name('index');
Route::get('/publication/{slug}', 'FrontController@publication')->name('pub');


