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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'DashboardController@index');

Route::resource('/admin/dashboard', 'DashboardController');
Route::resource('/admin/absensi', 'AbsensiController');
Route::resource('/admin/laporan', 'LaporanAbsensiController');
// Route::resource('/admin/hasil', 'HasilController');


Route::resource('/admin/user', 'UsersController');

Route::resource('/admin/Hadmin', 'HubAdminController');

Route::resource('/admin/pengguna', 'PenggunaController');
Route::get('/pengguna/search','PenggunaController@search');

Route::put('/peserta/sertifikat/{id}', 'PesertaController@sertifikat');


Route::put('/upload/peserta/{id}', 'ProfileController@fotopeserta');
Route::put('/upload/pegawai/{id}', 'ProfileController@fotopegawai');

Route::put('/user/update/{id}', 'ProfileController@update');
// Route::get('/admin/hasil/detail', 'HasilController@detail');
// Route::get('/admin/laporanAbsensi/detail', 'LaporanAbsensiController@detail');

Route::get('/admin/hasil/download/{id}','hasilController@download');
Route::get('/admin/foto/download/{id}','PersetujuanController@download');
Route::get('/admin/sertifikat/download/{id}','PesertaController@downloadSertifikat');


Route::get('/admin/laporan/cetak_pdf/{id}', 'LaporanAbsensiController@cetak_pdf');


// Route::resource('/admin/pendataan', 'PendataanController');
// Route::get('/pendataan/tambah/{id}','PendataanController@tambah');
// Route::post('/pendataan/store','PendataanController@store');
// Route::get('/pendataan/ubah/{id}','PendataanController@ubah');
// Route::post('/pendataan/update','PendataanController@update');
Route::get('/peserta/search','PesertaController@search');

Route::get('/admin/laporan/{id}/search','LaporanAbsensiController@search');

Route::resource('/admin/peserta', 'PesertaController');
Route::resource('/admin/persetujuan', 'PersetujuanController');

Route::resource('/admin/hasil', 'HasilController');
Route::get('/hasil/search', 'HasilController@search');
Route::get('/laporan/search', 'LaporanAbsensiController@cari');

Route::resource('/admin/upload', 'UploadController');

Route::resource('/admin/profile', 'ProfileController');


Route::get('register', 'RegisterController@getResgister');
Route::get('login', 'LoginController@getLogin')->name('login');
Route::post('postLogin', 'LoginController@postLogin');
Route::post('postRegister', 'RegisterController@postRegister');

Route::get('logout', 'LoginController@logout')->name('logout');
// Route::get('/logout', 'LoginController@logout');
// Route::get('logout', [
//  'as' => 'logout', 'uses' => 'LoginController@logout'
//  ]);
// Route::get('/logout', function()
// {
//   Auth::logout();
//   $request->Session()->flush();
//   return redirect('/');
// Auth::logout(); // logout user
//         Session::flush();
//         Redirect::back();
//         return Redirect::to('/'); //redirect back to login
// });


Route::get('/kirimemail','MalasngodingController@index');

// Route::get('pageAksesKhusus', function(){
  // return view('pageAksesKhusus');
// });

Route::get('delete', 'AdminController@delete');
Route::get('update', 'AdminController@update');

// Auth::routes();
