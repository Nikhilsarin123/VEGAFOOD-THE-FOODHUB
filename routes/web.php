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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/cart', function () {
    return view('user.cart');
});


Route::get('/res', function () {
    return view('user.restaurant_info');
});

Route::get('info', function () {
    return view('user.info');
});
Route::get('payment', function () {
    return view('user.payment');
});
Route::get('/main',['middleware' => 'auth:admin', function () {
    return view('main_admin.admin');
}]);
Route::get('/adddish', ['middleware' => 'auth:admin', function () {
    return view('main_admin.adddish');
}]);
Route::get('/addrest',['middleware' => 'auth:admin' , function () {
    return view('main_admin.addrestdish');
}]);
Route::get('/logout', function () {
    return view('layouts.app');
});

Route::get('/dish_cart/{id}', 'DishController@cart_info');

Route::get('/restaurant_info/{id}', 'restaurantController@restaurant_info');
Route::get('/dish_info/{id}', 'DishController@dish_info');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::patch('/cart/{id}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');

Route::post('/checkout', 'StripePaymentController@postCheckout')->name('checkout');



Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');


Route::post('/couponet', 'CouponController@apply')->name('coupon.apply');

Route::delete('/coupon_delete', 'CouponController@destroyer');

Auth::routes();

Route::resource('coupon','CouponController');

Route::resource('restaurant','RestaurantController');
Route::resource('dish','DishController');
Route::resource('order','OrderController');
Route::group(['namespace' => 'Admin'],function()
{
	Route::get('admin-login','Auth\LoginController@showLoginForm')->name('admin.login');
	Route::Post('admin-login','Auth\LoginController@login');

});
Route::get('dishshow','DishController@dishshow');
Route::get('/home', 'HomeController@index')->name('home');