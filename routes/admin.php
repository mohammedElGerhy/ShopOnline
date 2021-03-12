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

Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/' , 'DashboardController@index')->name('admin.dashboard');
    Route::any('logout', 'LoginController@logout')->name('admin.logout');

/////////////////// route admin ////////////////////////////////
    Route::group(['prefix' => 'administers' ], function (){
    Route::get('/', 'AdminsControll@index')->name('admin.admins');
    Route::get('create', 'AdminsControll@create')->name('admin.admins.create');
    Route::post('store', 'AdminsControll@store')->name('admin.admins.store');
    Route::get('edit/{id}', 'AdminsControll@edit')->name('admin.admins.edit');
    Route::post('update/{id}', 'AdminsControll@update')->name('admin.admins.update');
    Route::get('destroy/{id}', 'AdminsControll@destroy')->name('admin.admins.destroy');
});
/////////////////// route admin ////////////////////////////////
/////////////////// route maincategory ////////////////////////////////
    Route::group(['prefix' => 'maincategory' ], function (){
        Route::get('/', 'MainCategoryControll@index')->name('admin.maincategorys');
        Route::get('create', 'MainCategoryControll@create')->name('admin.maincategorys.create');
        Route::post('store', 'MainCategoryControll@store')->name('admin.maincategorys.store');
        Route::get('edit/{id}', 'MainCategoryControll@edit')->name('admin.maincategorys.edit');
        Route::post('update/{id}', 'MainCategoryControll@update')->name('admin.maincategorys.update');
        Route::get('destroy/{id}', 'MainCategoryControll@destroy')->name('admin.maincategorys.destroy');
        Route::get('status/{id}', 'MainCategoryControll@status')->name('admin.maincategorys.status');
    });
/////////////////// route maincategory ////////////////////////////////
/////////////////// route sup category ////////////////////////////////
    Route::group(['prefix' => 'supcategory' ], function (){
        Route::get('/', 'SupcategoryControll@index')->name('admin.supcategorys');
        Route::get('create', 'SupcategoryControll@create')->name('admin.supcategorys.create');
        Route::post('store', 'SupcategoryControll@store')->name('admin.supcategorys.store');
        Route::get('edit/{id}', 'SupcategoryControll@edit')->name('admin.supcategorys.edit');
        Route::post('update/{id}', 'SupcategoryControll@update')->name('admin.supcategorys.update');
        Route::get('destroy/{id}', 'SupcategoryControll@destroy')->name('admin.supcategorys.destroy');
        Route::get('status/{id}', 'SupcategoryControll@status')->name('admin.supcategorys.status');
    });
/////////////////// route sup category ////////////////////////////////
/////////////////// route sup category ////////////////////////////////
    Route::group(['prefix' => 'item' ], function (){
        Route::get('/', 'ItemController@index')->name('admin.items');
        Route::get('create', 'ItemController@create')->name('admin.items.create');
        Route::post('store', 'ItemController@store')->name('admin.items.store');
        Route::get('edit/{id}', 'ItemController@edit')->name('admin.items.edit');
        Route::post('update/{id}', 'ItemController@update')->name('admin.items.update');
        Route::get('destroy/{id}', 'ItemController@destroy')->name('admin.items.destroy');
        Route::get('status/{id}', 'ItemController@status')->name('admin.items.status');
    });
/////////////////// route sup category ////////////////////////////////
/////////////////// route sup category ////////////////////////////////
    Route::group(['prefix' => 'offer' ], function (){
        Route::get('/', 'OffersControll@index')->name('admin.offers');
        Route::get('create', 'OffersControll@create')->name('admin.offers.create');
        Route::post('store', 'OffersControll@store')->name('admin.offers.store');
        Route::get('edit/{id}', 'OffersControll@edit')->name('admin.offers.edit');
        Route::post('update/{id}', 'OffersControll@update')->name('admin.offers.update');
        Route::get('destroy/{id}', 'OffersControll@destroy')->name('admin.offers.destroy');
        Route::get('status/{id}', 'OffersControll@status')->name('admin.offers.status');
    });
/////////////////// route sup category ////////////////////////////////

});
Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', 'LoginController@getlogin')->name('get.admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');
});
