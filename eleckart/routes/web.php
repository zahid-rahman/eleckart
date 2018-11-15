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

Route::get('/','FrontPageController@index')->name('homepage');

Auth::routes();

//normal views for users
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about','aboutController@index')->name('about');
Route::get('/contact','contactController@index')->name('contact');


//product
Route::get('/product details/{id}','productController@show')->name('product.product-detials');

//order
Route::get('/cart','cartController@store')->name('cart.add');
Route::get('/shopping cart/{id}','cartController@show')->name('cart');
Route::get('/order','orderController@store')->name('order.confirm');
Route::get('/delete cart','cartController@destroy')->name('delete.single.cart');
Route::get('/delete full cart','cartController@delete_all')->name('delete.cart');
Route::get('/order details/{id}','orderController@index')->name('order.detials');
Route::get('/update cart','cartController@update')->name('cart.update');
Route::get('/order delete/{id}','orderController@destroy')->name('order.delete');
Route::get('/customer order/{id}','orderController@show')->name('order.customer');
Route::get('/customer order info/{token}','orderController@orderInfo')->name('order.customer.info');



//categories
///Route::get('/','categoryController@store');
Route::get('/category/{name}','categoryController@show')->name('category.products');

//cart
//

/**
vendor registration
 **/

Route::get('/vendor/registration','vendorController@create')->name('vendor.register');
Route::post('/vendor','vendorController@store')->name('vendor.register.add');

/**
admin validation
 **/

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/admin/dashboard','adminController@index')->name('admin');
});




/**
vendor validation
 **/

Route::group(['middleware' => ['auth','vendor']], function () {
    Route::get('/vendor/dashboard/{name}','vendorDashboardController@index')->name('vendor.dashboard');
    Route::get('/vendor/products','vendorProductController@index')->name('vendor.products');
    Route::get('/vendor/brands','vendorBrandController@index')->name('vendor.brands');
    Route::get('/vendor/products/create product','vendorProductController@create')->name('vendor.product.create');
    Route::post('/vendor/add product','vendorProductController@store')->name('vendor.product.add');
    //Route::get('/vendor/product image/{id}','vendorProductController@showProductImageUploadPage')->name('vendor.product.image');
    Route::post('/vendor/upload image','vendorProductController@storeMultipleProductImage')->name('vendor.product.image.upload');
    Route::get('/vendor/delete product/{id}','vendorProductController@destroy')->name('vendor.product.delete');
    Route::get('/vendor/edit product/{id}','vendorProductController@edit')->name('vendor.product.edit');
    Route::post('/vendor/update product/{id}','vendorProductController@update')->name('vendor.product.update');
    
});




