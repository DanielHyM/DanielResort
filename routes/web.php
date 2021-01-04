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



    });








});


