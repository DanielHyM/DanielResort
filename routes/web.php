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

Route::resource('/admin/users', 'AdminUserManagementController');
Route::resource('/admin/housings', 'AdminHousingManagementController');
Route::resource('/admin/bookings', 'AdminBookingManagementController');
Route::resource('/admin', 'AdminController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
