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
//


//vendor
Route::get('/vendor/dashboard','vendorDashboardController@index')->name('vendor.dashboard');
Route::get('/vendor/registration','vendorController@create')->name('vendor.register');
Route::get('/vendor/products','vendorProductController@index')->name('vendor.products');
Route::get('/vendor/brands','vendorBrandController@index')->name('vendor.brands');
Route::get('/vendor/products/create product','vendorProductController@create')->name('vendor.product.create');

//order
Route::get('/cart','cartController@store')->name('cart.add');
Route::get('/shopping cart/{id}','cartController@show')->name('cart');
Route::get('/order','orderController@store')->name('order.confirm');
Route::get('/delete cart','cartController@destroy')->name('delete.single.cart');
Route::get('/delete full cart','cartController@delete_all')->name('delete.cart');
Route::get('/order details/{id}','orderController@index')->name('order.detials');
Route::get('/update cart','cartController@update')->name('cart.update');

