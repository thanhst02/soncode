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
Route::group(['prefix' => '/account', 'as' => 'account.'] ,function(){
	Route::post('/login', 'AccountController@login')->name('login');
	Route::get('/signup', 'AccountController@signUp')->name('signup');
	Route::post('/signup', 'AccountController@signUpPost')->name('signup-post');
	Route::get('/logout', 'AccountController@logout')->name('logout');
});

/*
| frontend Route 
*/
Route::group(['middleware' => [] , 'as' => 'frontend.'], function (){
	Route::get('/', 'Frontend\IndexController@index')->name('index');
	Route::get('/single/{id}', 'Frontend\SingleController@index')->name('single');
	Route::get('/product', 'Frontend\ProductController@index')->name('product');
	Route::get('/search', 'Frontend\IndexController@search')->name('search');
	Route::get('/category/{id}', 'Frontend\IndexController@categoryFilder')->name('category-filder');
	Route::get('/country/{id}', 'Frontend\IndexController@countryFilder')->name('country-filder');
	Route::get('/maker/{id}', 'Frontend\IndexController@makerFilder')->name('maker-filder');
	Route::get('/add-cart', 'Frontend\CartController@addCart')->name('add-cart');
	Route::get('/delete-cart', 'Frontend\CartController@deleteCart')->name('delete-cart');
	Route::get('/clear-cart', 'Frontend\CartController@clearCart')->name('clear-cart');
	Route::get('/about', 'Frontend\AboutController@index')->name('about');
	Route::get('/comtact', 'Frontend\ContactController@index')->name('comtact');
	Route::get('/FAQ', 'Frontend\FAQController@index')->name('faq');
	Route::group(['prefix' => '/personal', 'as' => 'personal.'], function(){
		Route::get('/index' , 'Frontend\PersonalController@index')->name('index');
	});
});

/*
| backend Route 
*/
Route::group(['prefix' => '/dashboard', 'middleware' => ['auth'] , 'as' => 'backend.'], function (){
	Route::get('/', 'Backend\IndexController@index')->name('index');
	Route::group(['prefix' => '/category', 'as' => 'category.'], function(){
		Route::get('/index' , 'Backend\CategoryController@index')->name('index');
		Route::get('/create' , 'Backend\CategoryController@create')->name('create');
		Route::post('/store' , 'Backend\CategoryController@store')->name('store');
		Route::get('/edit/{id}' , 'Backend\CategoryController@edit')->name('edit');
		Route::patch('/edit/{id}' , 'Backend\CategoryController@update')->name('update');
		Route::get('/delete/{id}' , 'Backend\CategoryController@destroy')->name('destroy');
	});
	Route::group(['prefix' => '/country', 'as' => 'country.'], function(){
		Route::get('/index' , 'Backend\CountryController@index')->name('index');
		Route::get('/create' , 'Backend\CountryController@create')->name('create');
		Route::post('/store' , 'Backend\CountryController@store')->name('store');
		Route::get('/edit/{id}' , 'Backend\CountryController@edit')->name('edit');
		Route::patch('/edit/{id}' , 'Backend\CountryController@edit')->name('update');
		Route::get('/delete/{id}' , 'Backend\CountryController@destroy')->name('destroy');
	});
	Route::group(['prefix' => '/maker', 'as' => 'maker.'], function(){
		Route::get('/index' , 'Backend\MakerController@index')->name('index');
		Route::get('/create' , 'Backend\MakerController@create')->name('create');
		Route::post('/store' , 'Backend\MakerController@store')->name('store');
		Route::get('/edit/{id}' , 'Backend\MakerController@edit')->name('edit');
		Route::patch('/edit/{id}' , 'Backend\MakerController@edit')->name('update');
		Route::get('/delete/{id}' , 'Backend\MakerController@destroy')->name('destroy');
	});
	Route::group(['prefix' => '/product-management', 'as' => 'product.'], function(){
		Route::get('/index' , 'Backend\ProductTypeController@index')->name('index');
		Route::get('/create' , 'Backend\ProductTypeController@create')->name('add');
		Route::post('/store' , 'Backend\ProductTypeController@store')->name('insert');
		Route::get('/edit/{id}' , 'Backend\ProductTypeController@edit')->name('edit');
		Route::patch('/upadte/{id}' , 'Backend\ProductTypeController@update')->name('update');
		Route::get('/delete/{id}' , 'Backend\ProductTypeController@destroy')->name('destroy');
	});
	Route::group(['prefix' => '/user', 'as' => 'user.'], function(){
		Route::get('/index' , 'Backend\UserController@index')->name('index');
		Route::get('/create' , 'Backend\UserController@create')->name('create');
		Route::post('/store' , 'Backend\UserController@store')->name('store');
		Route::get('/edit/{id}' , 'Backend\UserController@edit')->name('edit');
		Route::patch('/edit/{id}' , 'Backend\UserController@edit')->name('update');
		Route::get('/delete/{id}' , 'Backend\UserController@destroy')->name('destroy');
	});
});
