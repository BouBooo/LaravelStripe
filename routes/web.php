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

// Main pages
Route::get('/', 'HomeController@home')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

// Cart
Route::get('/cart', 'CardController@index')->name('cart.index');
Route::post('/cart', 'CardController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CardController@destroy')->name('cart.destroy');
Route::get('/cart/clear', 'CardController@clear')->name('cart.clear');
Route::post('/cart/save/{product}', 'CardController@saveForLater')->name('cart.later');

// Save for later
Route::delete('/save/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/save/later/{product}', 'SaveForLaterController@addToCart')->name('saveForLater.later');

// Checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/payement-success', 'CheckoutController@success')->name('checkout.success');

// Coupons
Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

// Orders
Route::get('/orders', 'OrderController@orders')->name('orders');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();



Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');
