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

Route::get('/home','HomeController@Index');
Route::get('/product', function () {
    return view('Client.product');
});
Route::get('/news', function () {
    return view('Client.news');
});
Route::get('/contact', function () {
    return view('Client.contact');
});

Route::get('/register', function () {
    return view('Client.register');
});

Route::get('/login', function () {
    return view('Client.login');
});

Route::post('confirmlogin','HomeController@confirmlogin')->name('confirmlogin');
Route::post('confirmregister','HomeController@registerconfirm')->name('confirmregister');

Route::get('logout','HomeController@logout')->name('logout');
Route::get('ordersInCustomer/{id}','Admin\OrderController@ordersInCustomer')->name('ordersInCustomer');
/*------------------*/
Route::prefix('admin')->group(function () {
    Route::resource('brand','Admin\BrandController');
    Route::resource('category','Admin\CategoryController');
    Route::resource('customer','Admin\CustomerController');
    Route::resource('product','Admin\ProductController');
    Route::resource('order','Admin\OrderController');
    Route::get('productsInBrand/{id}','Admin\ProductController@productsInBrand')->name('productsInBrand');
    Route::get('productsInCate/{id}','Admin\ProductController@productsInCate')->name('productsInCate');
});

Route::group(['prefix'=>'cart'],function (){
    Route::get('add/{id}','CartController@getAddCart');
    Route::get('show','CartController@getShowCart')->name('show');
    Route::get('delete/{id}','CartController@getDeleteCart');
    Route::get('update','CartController@getUpdateCart');
    Route::post('thanhToanCart','CartController@thanhToanCart');

});
