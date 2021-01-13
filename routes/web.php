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

    Route::group(['prefix'=>'user', 'middleware' => ['permission:user']], function(){

        Route::group(['prefix'=>'housings', 'as'=>'user.'], function(){
            Route::post('/listHousings', 'UserController@listHousings')->name('listHousings');

        });

        Route::group(['prefix'=>'home', 'as'=>'user.'], function(){
            Route::get('', 'UserController@index')->name('home');

        });

    });








});


