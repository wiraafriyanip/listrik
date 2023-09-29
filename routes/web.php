<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListrikController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\LoketController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\CutiController;
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
    return view('welcome');
});
Route::resource('listrik', ListrikController::class); 
Route::resource('pengunjung', PengunjungController::class); 
Route::resource('pelanggan', PelangganController::class); 
Route::resource('karyawan', KaryawanController::class); 
Route::resource('desa', DesaController::class); 
Route::resource('loket', LoketController::class); 
Route::resource('lembur', LemburController::class); 
Route::resource('transaksi', TransaksiController::class); 
Route::resource('tagihan', TagihanController::class); 
Route::resource('cuti', CutiController::class); 
