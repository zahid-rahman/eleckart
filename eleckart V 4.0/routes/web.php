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
//Route::get('/collections','collectionController@index')->name('product.collection');
Route::get('/search','collectionController@store');
Route::get('/collections','searchController@searchProduct')->name('search.product');
Route::get('/alert/{email}','FrontPageController@alert_message')->name('alert.customer');
Route::get('/pending alert/{email}','FrontPageController@pending_message')->name('pending.vendor');
Route::get('/collection/ sort','searchController@sortAll')->name('search.all.sort');
//Route::get('/categories/sort','searchController@sort_category')->name('search.cat.sort');
//Route::get('/collection/rating sort','searchController@sortProductRating')->name('search.rating.sort');
//Route::get('/collection/rating sort','searchController@sortProductRating')->name('search.rating.sort');

Route::get('/category/{name}','categoryController@show')->name('category.products');
Route::get('/category','categoryController@store');



// Route::get('/search','searchController@store');

/**
customer authentication with login and registration (built in)
 **/


Auth::routes();


//normal views for users

/**
normal pages like contact us and about us
 **/

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about','aboutController@index')->name('about');
Route::get('/contact','contactController@index')->name('contact');
Route::post('/contact admin','contactController@storeFeedbackMessage')->name('contact.user');

//http://localhost:8000/customer%20order/8
//Route::get('/customer_profile_setting/{id}', 'ProfileSettingController@index')->name('customer_profile_setting');
//Route::get('/customer_profile_setting/Update Phone/{id}', 'ProfileSettingController@updatePhone')->name('customer_update_phone');
//Route::get('/customer_profile_setting/Update Address/{id}', 'ProfileSettingController@updateAddress')->name('customer_update_address');
//Route::get('/customer_profile_setting/Update Password/{id}', 'ProfileSettingController@updatePassword')->name('customer_profile_password');




Route::post('/customer rating & reviews','ReviewRatingController@store')->name('review.rating');



//
//Route::group(['middleware' => ['auth','customerStatus']], function () {


    //product
    Route::get('/product details/{id}','productController@show')->name('product.product-detials');
    Route::post('/product counter/{id}','productController@store')->name('product.counter.add');


    Route::get('/customer_profile_setting/{id}', 'ProfileSettingController@index')->name('customer_profile_setting');
    Route::post('/customer_profile_setting/Update Phone/{id}', 'ProfileSettingController@updatePhone')->name('customer_update_phone');
    Route::post('/customer_profile_setting/Update Address/{id}', 'ProfileSettingController@updateAddress')->name('customer_update_address');
    Route::post('/customer_profile_setting/Update Password/{id}', 'ProfileSettingController@updatePassword')->name('customer_profile_password');

    //order
    Route::get('/cart','cartController@store')->name('cart.add');
    Route::get('/shopping cart/{id}','cartController@show')->name('cart');
    Route::get('/order','orderController@store')->name('order.confirm');
    Route::get('/delete cart','cartController@destroy')->name('delete.single.cart');
    Route::get('/delete full cart','cartController@delete_all')->name('delete.cart');
    Route::get('/order details/{id}','orderController@index')->name('order.detials');
    Route::post('/update cart','cartController@update')->name('cart.update');
    Route::get('/order delete/{id}','orderController@destroy')->name('order.delete');
    Route::get('/customer order/{id}','orderController@show')->name('order.customer');
    Route::get('/customer order info/{token}','orderController@orderInfo')->name('order.customer.info');
    Route::get('/customer online payment','orderController@onlinePayment')->name('order.online.payment');







//});

/**
customer product ordering process
 **/




//categories
///Route::get('/','categoryController@store');

/**
categorized product with price and cart button
 **/

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
    Route::get('/admin/claimed order','adminController@claimed_order')->name('admin.claimed.order');
    Route::get('/admin/claimed order edit/{token}','adminController@editClaimedOrder')->name('admin.claimed.order.edit');
    Route::post('/admin/order claimed/{token}','adminController@claimedOrder')->name('admin.order.claimed');

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

    Route::get('/admin/products','adminController@proudcts')->name('admin.product');
    Route::get('/admin/product/detials/{id}','adminController@editproudctsDetails')->name('admin.product.details.edit');
    Route::get('/admin/product visblity/{id}','adminController@editproudctsVisiblity')->name('admin.product.visiblity.edit');
    Route::post('/admin/product/online/{id}','adminController@updateProductOnline')->name('admin.product.online');
    Route::post('/admin/product/offline/{id}','adminController@updateProductOffline')->name('admin.product.offline');
    Route::get('/admin/product delete edit/{id}','adminController@editproudctsDelete')->name('admin.product.delete.edit');
    Route::post('/admin/product/delete/{id}','adminController@destroyProduct')->name('admin.product.delete');

    Route::get('/admin/customers','adminController@customer')->name('admin.customer');
    Route::get('/admin/customer ban edit/{email}','adminController@editCustomerAccountForBan')->name('admin.customer.ban.edit');
    Route::post('/admin/customer/ban/{email}','adminController@udpateCustomerBan')->name('admin.customer.ban');
    Route::post('/admin/customer/approve/{email}','adminController@udpateCustomerApprove')->name('admin.customer.approve');
    Route::get('/admin/customer info edit/{email}','adminController@editCustomerAccountInfo')->name('admin.customer.info.edit');
    Route::get('/admin/customer delete edit/{email}','adminController@editCustomerAccountForDelete')->name('admin.customer.delete.edit');
    Route::post('/admin/customer/delete/{email}','adminController@destroyCustomer')->name('admin.customer.delete');


    Route::get('/admin/feedback','adminController@feedback')->name('admin.feedback');

    Route::get('/search/vendor','adminController@show');
    Route::get('/search/shipping orders','adminController@showShippingOrder');
    Route::get('/search/delivered orders','adminController@showDeliveredOrder');
    Route::get('/search/claimed orders','adminController@showClaimedOrder');
    Route::get('/search/online product','adminController@showProduct');
    Route::get('/search/customers','adminController@showCustomer');





    

    //Route::post('/admin/customer/ban/{email}','adminController@udpateCustomerBan')->name('admin.customer.ban');



});


/**
vendor validation
 **/

Route::group(['middleware' => ['auth','vendor']], function () {


    Route::group(['middleware' =>['auth','vendorStatus'] ], function () {
        Route::get('/vendor/dashboard/{name}','vendorDashboardController@index')->name('vendor.dashboard');
        Route::get('/vendor/products','vendorProductController@index')->name('vendor.products');

        Route::get('/vendor/profile/{id}','vendorProfileSettingController@index')->name('vendor.profile.setting');
        Route::post('/vendor/password/{id}','vendorProfileSettingController@updatePassword')->name('vendor.password.update');
        Route::post('/vendor/address/{id}','vendorProfileSettingController@updateAddress')->name('vendor.update.address');
        Route::post('/vendor/phone/{id}','vendorProfileSettingController@updatePhoneNumber')->name('vendor.update.phone');
        Route::post('/vendor/company name/{id}','vendorProfileSettingController@updateCompanyName')->name('vendor.update.company_name');


        Route::get('/vendor/products/create product','vendorProductController@create')->name('vendor.product.create');
        Route::get('/vendor/products/upload images/{id}','vendorProductController@editUploadImages')->name('vendor.product.upload.edit');
        Route::post('/vendor/add product','vendorProductController@store')->name('vendor.product.add');
        Route::get('/vendor/product images/{id}','vendorProductController@showProductImageUploadPage')->name('vendor.product.image');
        Route::post('/vendor/upload image','vendorProductController@storeMultipleProductImage')->name('vendor.product.image.upload');
        Route::get('/vendor/delete product/{id}','vendorProductController@destroy')->name('vendor.product.delete');
        Route::get('/vendor/edit product/{id}','vendorProductController@edit')->name('vendor.product.edit');
        Route::post('/vendor/update products/{id}','vendorProductController@update')->name('vendor.product.update');
        Route::post('/vendor/update product images/{id}','vendorProductController@updateProductMainImage')->name('vendor.product.image.update');
        Route::get('/vendor/set discount/{id}','vendorProductController@editSetDiscount')->name('vendor.discount.set');
        Route::post('/vendor/discount/{id}','vendorProductController@storeDiscount')->name('vendor.discount');
        Route::get('/vendor/edit/product/{id}','vendorProductController@editVendorProduct')->name('vendor.view.product');
        Route::get('/search/products','vendorProductController@showProducts');


    });


//    Route::get('/vendor/dashboard/{name}','vendorDashboardController@index')->name('vendor.dashboard');
//    Route::get('/vendor/products','vendorProductController@index')->name('vendor.products');
//    Route::get('/vendor/brands','vendorBrandController@index')->name('vendor.brands');
//    Route::get('/vendor/products/create product','vendorProductController@create')->name('vendor.product.create');
//    Route::get('/vendor/products/upload images/{id}','vendorProductController@editUploadImages')->name('vendor.product.upload.edit');
//    Route::post('/vendor/add product','vendorProductController@store')->name('vendor.product.add');
//    Route::get('/vendor/product images/{id}','vendorProductController@showProductImageUploadPage')->name('vendor.product.image');
//    Route::post('/vendor/upload image','vendorProductController@storeMultipleProductImage')->name('vendor.product.image.upload');
//    Route::get('/vendor/delete product/{id}','vendorProductController@destroy')->name('vendor.product.delete');
//    Route::get('/vendor/edit product/{id}','vendorProductController@edit')->name('vendor.product.edit');
//    Route::post('/vendor/update product/{id}','vendorProductController@update')->name('vendor.product.update');
//    Route::post('/vendor/update product images/{id}','vendorProductController@updateProductMainImage')->name('vendor.product.image.update');
//    Route::get('/vendor/set discount/{id}','vendorProductController@editSetDiscount')->name('vendor.discount.set');
//    Route::post('/vendor/discount/{id}','vendorProductController@storeDiscount')->name('vendor.discount');
//    Route::get('/vendor/edit/product/{id}','vendorProductController@editVendorProduct')->name('vendor.view.product');






});




