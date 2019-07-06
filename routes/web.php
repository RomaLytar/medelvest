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
//
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'SiteController@index')->name('front.home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/dashboard', 'Admin\DashboardController');
Route::resource('admin/color', 'Admin\ColorController');
Route::resource('admin/facade', 'Admin\FacadeController');
Route::resource('admin/dimension', 'Admin\DimensionController');
Route::resource('admin/slidingdoors', 'Admin\SlidingdoorsController');