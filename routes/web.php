<?php

use Illuminate\Support\Facades\Route;

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



// php artisan make:controller FrontendController //----> create controller

Route::get('/', 'FrontendController@home')->name('homepage');

Route::get('itemdetail/{item}', 'FrontendController@itemdetail')->name('itemdetail');

Route::get('cart', 'FrontendController@cart')->name('cart');

Route::post('checkout','FrontendController@checkout')->name('checkout');


// route group // middleware
// authentications

// Route::middleware('auth')->group(function () { 

	Route::get('dashboard', 'BackendController@dashboard')->name('dashboard');

	Route::resource('items', 'ItemController'); // resource ဆိုရင် @method ထည့်ပေးစရာမလိုဖူး

	Route::resource('brands', 'BrandController');

	Route::resource('categories', 'CategoryController');

	Route::resource('subcategories', 'SubcategoryController');

	Route::resource('orders','OrderController');

	

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
