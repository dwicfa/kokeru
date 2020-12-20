<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuktiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\CSController;
use App\Http\Controllers\ManagerController;
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

Route::get('/', function () {
  $laporan = App\Models\Laporan::where('tanggal',date('y-m-d'))
                      ->orderBy('id')
                      ->Paginate(12);
  return view("welcome")->with('laporan',$laporan);
                
    
});


// Route::get('/dashboard', [App\Http\Controllers\CSController::class, 'index'])->name('home');
Auth::routes();

// Route::get('/dashboard', 'App\Http\Controllers\CSController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
  Route::get('{cs}', ['as' => 'cs.index', 'uses' => 'App\Http\Controllers\CSController@index']);
  Route::get('dashboard/upload/{id_laporan}','App\Http\Controllers\CSController@getLaporan');
});

Route::get('manager/login', 'App\Http\Controllers\Auth\ManagerAuthController@getLogin')->name('manager.login');
Route::post('manager/login', 'App\Http\Controllers\Auth\ManagerAuthController@postLogin');
Route::middleware('auth:manager')->group(function(){
  Route::get('manager/dashboard/bukti/{id_laporan}','App\Http\Controllers\ManagerController@getLaporan');
  Route::get('manager/ruangan/edit/{id}','App\Http\Controllers\ManagerController@getRuangan');
  Route::get('manager/dataCS/tambah/','App\Http\Controllers\CSController@tambahCS');
  Route::get('manager/dataCS/edit/{id}','App\Http\Controllers\CSController@getCS');
  Route::get('manager/ruangan/tambah/','App\Http\Controllers\ManagerController@tambahRuangan');
  Route::get('manager/laporan/cari','App\Http\Controllers\ManagerController@pilihTanggal');
  Route::get('manager/laporan/excel/{tanggal}/{status}','App\Http\Controllers\ManagerController@exportExcel');
  Route::get('manager/laporan/pdf/{tanggal}/{status}','App\Http\Controllers\ManagerController@exportPdf');
  Route::get('manager/{manager}', ['as' => 'manager.index', 'uses' => 'App\Http\Controllers\ManagerController@index']);
  Route::resource('ruangan',RuanganController::class);
  Route::resource('cs',CSController::class);
  Route::put('manager/{manager}','App\Http\Controllers\ManagerController@update');
  // Route::resource('manager',ManagerController::class);
  });

Route::resource('bukti',BuktiController::class);

Route::get('view/export',function () {
  return view("managers.exportView",['laporan'=>App\Models\Laporan::all(),'tanggal'=>date("Y-m-d h:i:s")]);
                
    
});
