<?php

use App\Http\Controllers\mapsController;
use App\Http\Controllers\pendaftaranController;
use App\Http\Controllers\simtaruController;
use App\Http\Controllers\tanggapanController;
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

// Route::get('/', function () {
//     return view('Main.Page.maps');
// });

// Route::resource('/crud', App\Http\Controllers\CrudController::class);
Route::get('/', [simtaruController::class, 'index']);
Route::get('/regulasi', [simtaruController::class, 'regulasiIndex']);
Route::get('/publikasi', [simtaruController::class, 'publikasiIndex']);

Route::get('/regulasi-uu', [simtaruController::class, 'regulasiUU']);
Route::get('/regulasi-kepres', [simtaruController::class, 'regulasiKepres']);

Route::get('/regulasi-perda', [simtaruController::class, 'regulasiPerda']);
Route::get('/regulasi-pergub', [simtaruController::class, 'regulasiPergub']);
Route::get('/regulasi-permen', [simtaruController::class, 'regulasiPermen']);
Route::get('/regulasi-perpes', [simtaruController::class, 'regulasiPerpes']);
Route::get('/regulasi-pp', [simtaruController::class, 'regulasiPP']);

Route::get('/tata-ruang', [simtaruController::class, 'mapsIndex']);
Route::get('/tata-ruang/detail', [simtaruController::class, 'mapsDetail']);

Route::get('/pendaftaran', [simtaruController::class, 'pendaftaranIndex'])->name('pendaftaran');
Route::post('/pendaftaran', [simtaruController::class, 'pendaftaranStore']);
Route::post('/getKabupaten', [simtaruController::class, 'getKabupaten'])->name('getKabupaten');

Route::post('/getKecamatan', [simtaruController::class, 'getKecamatan'])->name('getKecamatan');

Route::get('/tanggapan', [simtaruController::class, 'tanggapanIndex']);
Route::post('/tanggapan', [simtaruController::class, 'tanggapanStore']);
