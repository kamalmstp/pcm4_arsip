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



Auth::routes();


Route::get('/', 'dashboardController@index')->name('dashboard');
Route::get('/admin', 'adminController@index')->name('admin');
Route::get('/user', 'userController@index')->name('user');
Route::get('/user/edit', 'userController@edit')->name('useredit');
Route::get('/user/add', 'userController@add')->name('useradd');
