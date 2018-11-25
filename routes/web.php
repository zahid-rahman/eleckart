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

/**
front view of website
 **/
Route::get('/','FrontPageController@index')->name('homepage');

/**
customer authentication with login and registration (built in)
 **/
Auth::routes();

//normal views for users

/**
normal pages like contact us and about us
 **/

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about','aboutController@index')->name('about');
Route::get('/contact','contactController@index')->name('contact');


//product
Route::get('/product details/{id}','productController@show')->name('product.product-detials');

/**
customer product ordering process
 **/

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

/**
categorized product with price and cart button
 **/
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

    Route::get('/admin/vendor','adminController@vendor')->name('admin.vendor');
    Route::get('/admin/vendor ban/{email}','adminController@editVendorAccount')->name('admin.vendor.edit');
    Route::get('/admin/vendor delete/{email}','adminController@editVendorAccountForDelete')->name('admin.vendor.delete.edit');
    Route::get('/admin/vendor account/{email}','adminController@editVendorAccountShow')->name('admin.vendor.account.edit');
    Route::post('/admin/vendor/ban/{email}','adminController@vendorBan')->name('admin.vendor.ban');
    // Route::get('/admin/vendor/pending/{email}','adminController@vendorPending')->name('admin.vendor.pending');
    Route::post('/admin/vendor/approve/{email}','adminController@vendorApprove')->name('admin.vendor.approve');
    Route::post('/admin/vendor/delete/{email}','adminController@destroy')->name('admin.vendor.delete');

    Route::get('/admin/order','adminController@order')->name('admin.order');
    Route::get('/admin/order info/{token}','adminController@editOrderDetails')->name('admin.order.edit');
    Route::get('/admin/order delivered','adminController@editOrderDeliverDetails')->name('admin.orderdeliver');
    Route::get('/admin/order confimration edit/{token}','adminController@editOrdeConfirmation')->name('admin.order.confirm.edit');
    Route::post('/admin/order deliver confimration/{token}','adminController@deliverOrder')->name('admin.order.delivired');
    Route::get('/admin/order shipping edit/{token}','adminController@editOrderShipping')->name('admin.order.shipping.edit');
    Route::post('/admin/order shipping/{token}','adminController@shippingOrder')->name('admin.order.shipping');
    Route::get('/admin/order delete edit/{token}','adminController@editOrderDelete')->name('admin.order.delete.edit');
    Route::post('/admin/order/delete/{token}','adminController@destroyOrder')->name('admin.order.delete');



    Route::get('/admin/brands','adminController@brands')->name('admin.brands');
    Route::post('/admin/brands/add','adminController@storeBrands')->name('admin.brands.store');
    Route::get('/admin/brands update edit/{id}','adminController@editbrandsUpdate')->name('admin.brands.update.edit');
    Route::post('/admin/brands/update/{id}','adminController@updateBrands')->name('admin.brands.update');
    Route::post('/admin/brands/delete/{id}','adminController@destroyBrands')->name('admin.brands.delete');
    Route::get('/admin/brands delete edit/{id}','adminController@editBrandsDelete')->name('admin.brands.delete.edit');




    Route::get('/admin/categories','adminController@categories')->name('admin.categories');
    Route::post('/admin/categories/add','adminController@storeCategories')->name('admin.categories.store');
    Route::get('/admin/categories update edit/{id}','adminController@editcategoriesUpdate')->name('admin.categories.update.edit');
    Route::post('/admin/categories/update/{id}','adminController@updateCategories')->name('admin.categories.update');
    Route::post('/admin/categories/delete/{id}','adminController@destroyCategories')->name('admin.categories.delete');
    Route::get('/admin/categories delete edit/{id}','adminController@editCategoriesDelete')->name('admin.categories.delete.edit');





  

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
    Route::get('/vendor/product images/{id}','vendorProductController@showProductImageUploadPage')->name('vendor.product.image');
    Route::post('/vendor/upload image','vendorProductController@storeMultipleProductImage')->name('vendor.product.image.upload');
    Route::get('/vendor/delete product/{id}','vendorProductController@destroy')->name('vendor.product.delete');
    Route::get('/vendor/edit product/{id}','vendorProductController@edit')->name('vendor.product.edit');
    Route::post('/vendor/update product/{id}','vendorProductController@update')->name('vendor.product.update');
    Route::post('/vendor/update product images/{id}','vendorProductController@updateProductMainImage')->name('vendor.product.image.update');
   
    
});




