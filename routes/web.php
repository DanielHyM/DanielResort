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

Route::get('/', 'Controller@welcomeView')->name('/');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function(){

    Route::group(['prefix'=>'admin', 'middleware' => ['permission:admin']], function(){


        Route::resource('/housings', 'AdminHousingManagementController');
        Route::resource('/bookings', 'AdminBookingManagementController');
        Route::resource('', 'AdminController');

        Route::group(['prefix'=>'users', 'as'=>'users.'], function(){
            Route::post('/listUsers', 'AdminUserManagementController@listUsers')->name('listUsers');

        });

        Route::resource('/users', 'AdminUserManagementController');

        Route::group(['prefix'=>'housings', 'as'=>'housings.'], function(){
            Route::post('/listHousings', 'AdminHousingManagementController@listHousings')->name('listHousings');

        });

        Route::group(['prefix'=>'bookings', 'as'=>'bookings.'], function(){
            Route::post('/listBookings', 'AdminBookingManagementController@listBookings')->name('listBookings');

        });


    });

    Route::group(['prefix'=>'user' , 'as' => 'user.' , 'middleware' => ['permission:user']], function(){

        Route::group(['prefix'=>'housings', 'as'=>'housing.'], function(){
            Route::get('/listHousings', 'UserController@index')->name('list');

        });

        Route::group(['prefix'=>'home'], function(){
            Route::get('', 'UserController@index')->name('home');


        });


        Route::group(['prefix'=>'bookings', 'as'=>'booking.'], function(){

            Route::post('/create/{housing}', 'UserController@createBooking')->name('create');
            Route::post('/store/{housing}', 'AdminBookingManagementController@store')->name('store');
            Route::post('/list', 'UserController@listing')->name('list');
            Route::post('/list/myBookings', 'UserController@listBookings')->name('listBookings');

        });

    });








});


