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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','FrontPageController@index');

Auth::routes();

//normal views for users
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about','aboutController@index')->name('about');
Route::get('/contact','contactController@index')->name('contact');


//product
Route::get('/product details/{id}','productController@show')->name('product.product-detials');

//categories
///Route::get('/','categoryController@store');
Route::get('/category/{name}','categoryController@show')->name('category.products');

//cart
Route::get('/cart','cartController@index')->name('cart');


//vendor
Route::get('/vendor/dashboard','vendorDashboardController@index')->name('vendor.dashboard');
Route::get('/vendor/registration','vendorController@create')->name('vendor.register');
Route::get('/vendor/products','vendorProductController@index')->name('vendor.products');
Route::get('/vendor/brands','vendorBrandController@index')->name('vendor.brands');
Route::get('/vendor/products/create product','vendorProductController@create')->name('vendor.product.create');
