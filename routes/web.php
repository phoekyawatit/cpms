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


Auth::routes();
// admin routes
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['web', 'auth']], function () {
    Route::get('/','AdminController@index');
    Route::resource('users','UserController');
    Route::resource('customers','CustomerController');
    Route::resource('bookings','BookingController');
    Route::resource('services','ServiceController');
});

// frontend routes 
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/','FrontendController@index');
    Route::post('/book-car-parking','FrontendController@book');
});
