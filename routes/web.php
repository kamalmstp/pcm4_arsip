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



// Auth::routes();

Route::group(['middleware' => ['admin']], function () {
  
  Route::get('/', 'dashboardController@index')->name('dashboard');
  Route::get('/index', 'adminController@index')->name('index');
  Route::get('/nilaiaset', 'nilaiController@add')->name('nilai');
  Route::get('/admin/tambah', 'tambahController@tambah')->name('tambah');
  Route::get('/admin/edit/{id}', 'tambahController@edit')->name('aset.edit');
  Route::post('/admin/edit/save', 'tambahController@saveEdit')->name('aset.edit.save');
  Route::get('/gudang/masuk', 'tambahController@masuk')->name('masuk');
  Route::get('/gudang/setujui/{id}', 'tambahController@gudang_setujui')->name('gudang.setujui');
  Route::get('/kegiatan/perawatan', 'perawatanController@perawatan')->name('perawatan');
  Route::get('/kegiatan/tambahperawatan', 'perawatanController@tambahperawatan')->name('tambahperawatan');
  Route::get('/admin/kerusakan', 'kerusakanController@kerusakan')->name('kerusakan');
  Route::get('/admin/tambahkerusakan', 'kerusakanController@tambahkerusakan')->name('tambahkerusakan');
  Route::get('/gudang/logstok', 'kartuStokController@log')->name('log');

  // user
  Route::get('/user', 'userController@index')->name('user');
  Route::get('/user/add', 'userController@add')->name('useradd');
  Route::post('/user/save', 'userController@save')->name('user.save');
  Route::get('/user/edit/{id}', 'userController@edit')->name('useredit');
  Route::post('/user/edit/save', 'userController@saveEdit')->name('useredit.save');
  Route::get('/user/delete/{id}', 'userController@delete')->name('user.delete');

  // bidang
  Route::get('/bidang', 'bidangController@index')->name('bidang.list');
  Route::get('/bidang/add', 'bidangController@add')->name('bidang.add');
  Route::post('/bidang/save', 'bidangController@save')->name('bidang.save');
  Route::get('/bidang/edit/{id}', 'bidangController@edit')->name('bidang.edit');
  Route::post('/bidang/edit/save', 'bidangController@saveEdit')->name('bidang.edit.save');
  Route::get('/bidang/delete/{id}', 'bidangController@delete')->name('bidang.delete');

  // gudang
  Route::get('/gudang', 'gudangController@index')->name('gudang.list');
  Route::get('/gudang/add', 'gudangController@add')->name('gudang.add');
  Route::post('/gudang/save', 'gudangController@save')->name('gudang.save');
  Route::get('/gudang/edit/{id}', 'gudangController@edit')->name('gudang.edit');
  Route::post('/gudang/edit/save', 'gudangController@saveEdit')->name('gudang.edit.save');
  Route::get('/gudang/delete/{id}', 'gudangController@delete')->name('gudang.delete');

  // jenis
  Route::get('/jenis', 'jenisController@index')->name('jenis.list');
  Route::get('/jenis/add', 'jenisController@add')->name('jenis.add');
  Route::post('/jenis/save', 'jenisController@save')->name('jenis.save');
  Route::get('/jenis/edit/{id}', 'jenisController@edit')->name('jenis.edit');
  Route::post('/jenis/edit/save', 'jenisController@saveEdit')->name('jenis.edit.save');
  Route::get('/jenis/delete/{id}', 'jenisController@delete')->name('jenis.delete');

  // kegiatan
  Route::get('/kegiatan', 'kegiatanController@index')->name('kegiatan.list');
  Route::get('/kegiatan/add', 'kegiatanController@add')->name('kegiatan.add');
  Route::post('/kegiatan/save', 'kegiatanController@save')->name('kegiatan.save');
  Route::get('/kegiatan/edit/{id}', 'kegiatanController@edit')->name('kegiatan.edit');
  Route::post('/kegiatan/edit/save', 'kegiatanController@saveEdit')->name('kegiatan.edit.save');
  Route::get('/kegiatan/delete/{id}', 'kegiatanController@delete')->name('kegiatan.delete');

  // asset
  Route::post('/admin/tambah/save', 'tambahController@save')->name('tambah.save');


  // perawatan
  Route::post('/perawatan/tambahperawatan/save', 'perawatanController@save')->name('perawatan.save');
  Route::get('/perawatan/edit/{id}', 'perawatanController@edit')->name('perawatan.edit');
  Route::post('/perawatan/edit/save', 'perawatanController@saveEdit')->name('perawatan.edit.save');
  Route::get('/perawatan/delete/{id}', 'perawatanController@delete')->name('perawatan.delete');

  // kerusakan
  Route::post('/admin/tambahkerusakan/save', 'kerusakanController@save')->name('kerusakan.save');
  Route::get('/admin/kerusakan/edit/{id}', 'kerusakanController@edit')->name('kerusakan.edit');
  Route::post('/admin/kerusakan/edit/save', 'kerusakanController@saveEdit')->name('kerusakan.edit.save');
  Route::get('/admin/kerusakan/delete/{id}', 'kerusakanController@delete')->name('kerusakan.delete');

  // request
  Route::get('/request', 'requestController@request')->name('request');
  Route::get('/kegiatan/request', 'requestController@requestbarang')->name('requestbarang');
  Route::get('/kegiatan/request/lihat/{id}', 'requestController@lihat')->name('requestbarang.lihat');
  Route::get('/kegiatan/request/edit/{id}', 'requestController@edit')->name('requestbarang.edit');
  Route::post('/kegiatan/request/save', 'requestController@save')->name('requestbarang.save');
  Route::get('/kegiatan/request/delete/{id}', 'requestController@delete')->name('requestbarang.delete');
  Route::post('/kegiatan/request/edit/save', 'requestController@saveEdit')->name('requestbarang.saveEdit');
  Route::get('/kegiatan/diambil', 'diambilController@diambil')->name('diambil');
  Route::get('/kegiatan/diambil/delete/{id}', 'diambilController@delete')->name('diambil.delete');
  Route::post('/logout', 'loginController@proccess_logout')->name('proccess_logout');
  
});

Route::group(['middleware' => ['web']], function () {
  // auth
  Route::get('/login', 'loginController@index')->name('login');
  Route::post('/login', 'loginController@proccess_login')->name('proccess_login');
});