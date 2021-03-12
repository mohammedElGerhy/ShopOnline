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
Route::group(['prefix' => LaravelLocalization::setLocale()], function(){
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
   // Route::get('/', 'HomeController@index')->name('front.home');
Route::group(['middleware' => 'auth:web'], function () {
  //  Route::get('/', 'ProfileControll@index')->name('front.home');
    Route::any('logout', 'ProfileControll@logout')->name('logout');
   // Route::get('/callback/{service}', 'SocialController@callback');
});

    Route::get('/', 'ProfileControll@index')->name('front.home');
    Route::get('item/{id}', 'ProfileControll@getitem')->name('front.itemshow');
    ########### Route shopping cart #####################
    Route::get('/add-to-cart/{product}', 'ProfileControll@add')->name('front.add')->middleware('auth');
    Route::get('/cart', 'ProfileControll@showCart')->name('front.show')->middleware('auth');
    Route::get('/cart/destroy/{itemId}', 'ProfileControll@destroy')->name('front.destroy')->middleware('auth');
    Route::get('/cart/update/{itemId}', 'ProfileControll@update')->name('front.update')->middleware('auth');

    ########### Route shopping cart #####################
   // Route::get('/redirect/facebook', 'SocialController@redirect');
    ########### Route Register Socialite #####################
    Route::get('/redirect/facebook', 'SocialController@redirect');

    Route::get('/ShopOnline/login/callback/facebook', 'SocialController@callback');
########### Route login Socialite #####################
    Route::get('/redirectLogon/google', 'SocialController@redirectToGoogle')->name('login.google');

    Route::get('/callback/googel', 'SocialController@handleGoogleCallback');

});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
