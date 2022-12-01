<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tambahMahasiswaController;
use App\Http\Controllers\editDataMahasiswaController;
use App\Http\Controllers\hapusDataMahasiswaController;
use App\Http\Controllers\mahasiswaController;




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

Route::get('/index', [mahasiswaController::class, 'index']);

Route::post('tambahMahasiswa', [tambahMahasiswaController::class, 'tambahMahasiswa']);

Route::post('editDataMahasiswa/{NIM}', [editDataMahasiswaController::class, 'editDataMahasiswa']);

Route::get('hapusDataMahasiswa/{NIM}', [hapusDataMahasiswaController::class, 'hapusDataMahasiswa']);