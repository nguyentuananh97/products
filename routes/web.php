<?php
use App\Gallary;
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
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');



Auth::routes();

// Route::get('/', function () {
//    return view('products.cart');
// });

// Route::middleware('auth')->group(function(){
    
    Route::get('gallery', 'GallaryController@index');
    Route::get('index', 'ProductDetailController@index_products');
    Route::get('product/{id}', 'ProductDetailController@product_products');

    Route::get('list', 'ProductDetailController@list_products');
    Route::get('list/size/{id}','ProductDetailController@find_to_size');
    Route::get('list/color/{id}','ProductDetailController@find_to_color');
    Route::get('list/search/{info}','ProductDetailController@search');
    Route::get('list/price/{min}/{max}','ProductDetailController@find_to_price');
    Route::get('list/category/{id}','ProductDetailController@find_to_cate');

    Route::post('products/addtocart','ProductController@addToCart');
    Route::post('list/size/products/addtocart','ProductController@addToCart');
    Route::post('list/color/products/addtocart','ProductController@addToCart');
    Route::post('list/search/products/addtocart','ProductController@addToCart');

    Route::post('products/editcart/{rowId}','ProductController@editCart');
    Route::post('list/size/products/editcart/{rowId}','ProductController@editCart');
    Route::post('list/color/products/editcart/{rowId}','ProductController@editCart');
    Route::post('list/search/products/editcart/{rowId}','ProductController@editCart');

    Route::get('products/deletecart/{rowId}','ProductController@deleteCart');
    Route::post('list/size/products/editcart/{rowId}','ProductController@deleteCart');
    Route::get('list/color/products/deletecart/{rowId}','ProductController@deleteCart');
    Route::get('list/search/products/deletecart/{rowId}','ProductController@deleteCart');

    Route::get('list/size/products/{product_id}','ProductController@show');
    Route::get('list/color/products/{product_id}','ProductController@show');
    Route::get('list/search/products/{product_id}','ProductController@show');
    Route::resource('products','ProductController');

    Route::get('productDetails/find/{product_id}','ProductDetailController@findProduct');
    Route::get('list/size/productDetails/find/{product_id}','ProductDetailController@findProduct');
    Route::get('list/color/productDetails/find/{product_id}','ProductDetailController@findProduct');
    Route::get('list/search/productDetails/find/{product_id}','ProductDetailController@findProduct');

    Route::get('productDetails/findByColor/{product_id}/{color}','ProductDetailController@findByColor');
    Route::get('list/size/productDetails/findByColor/{product_id}/{color}','ProductDetailController@findByColor');
    Route::get('list/color/productDetails/findByColor/{product_id}/{color}','ProductDetailController@findByColor');
    Route::get('list/search/productDetails/findByColor/{product_id}/{color}','ProductDetailController@findByColor');

    Route::resource('productDetails','ProductDetailController');
    Route::resource('orders','OrderController');
// });
Route::prefix('admin')->group(function(){

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');

    // Registration Routes...
    Route::get('register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Admin\RegisterController@register')->name('admin.postRegister');

    // Password Reset Routes...
    Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('password/reset', 'Admin\ResetPasswordController@reset');

    Route::middleware('admin.auth')->group(function(){
	
	    Route::get('/dashboard', 'HomeController@index')->name('home');

        Route::get('products/list', 'ProductController@getList')->name('products.list');
        Route::post('products/update/{id}', 'ProductController@update');
        Route::resource('products','ProductController');

        Route::get('productDetails/list', 'ProductDetailController@getList')->name('productDetails.list');
        Route::get('productDetails/list1/{product_id}', 'ProductDetailController@list');
        Route::post('productDetails/update/{id}', 'ProductDetailController@update');
        // Route::post('productDetails/created', 'ProductDetailController@create');
        Route::post('productDetails/imaged', 'ProductDetailController@imageStore');
        Route::resource('productDetails','ProductDetailController');


        Route::get('colors/list','ColorController@getList')->name('colors.list');
        Route::resource('colors','ColorController');

        Route::get('sizes/list','SizeController@getList')->name('sizes.list');
        Route::resource('sizes','SizeController');

        Route::get('gallaries','GallaryController@create');
        Route::post('gallaries','GallaryController@store');

        Route::get('orders/list', 'OrderController@getList')->name('orders.list');
        Route::resource('orders','OrderController');
	});
	
});
