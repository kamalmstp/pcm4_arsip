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
Route::get('/index', 'adminController@index')->name('index');
Route::get('/user', 'userController@index')->name('user');
Route::get('/user/edit', 'userController@edit')->name('useredit');
Route::get('/user/add', 'userController@add')->name('useradd');
Route::get('/nilaiaset', 'nilaiController@add')->name('nilai');
Route::get('/admin/tambah', 'tambahController@tambah')->name('tambah');
Route::get('/gudang/masuk', 'tambahController@masuk')->name('masuk');
Route::get('/request', 'requestController@request')->name('request');
Route::get('/kegiatan/request', 'requestController@requestbarang')->name('requestbarang');
Route::get('/kegiatan/perawatan', 'perawatanController@perawatan')->name('perawatan');
Route::get('/kegiatan/tambahperawatan', 'perawatanController@tambahperawatan')->name('tambahperawatan');
Route::get('/kegiatan/diambil', 'diambilController@diambil')->name('diambil');
Route::get('/admin/kerusakan', 'kerusakanController@kerusakan')->name('kerusakan');
Route::get('/admin/tambahkerusakan', 'kerusakanController@tambahkerusakan')->name('tambahkerusakan');
Route::get('/gudang/logstok', 'kartuStokController@log')->name('log');
