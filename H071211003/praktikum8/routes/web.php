<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\DB;

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

Route::get('/mahasiswa', function () {
    return view('index', [
        'mahasiswas' => DB::table('mahasiswas')->paginate(10)
    ]);
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');


Route::get('/insertdata', [MahasiswaController::class, 'insertdata'])->name('insertdata');
Route::post('/tambahdata', [MahasiswaController::class, 'TambahData'])->name('tambahdata');

Route::get('/edit/{id}', [MahasiswaController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [MahasiswaController::class, 'update'])->name('update');

Route::get('/delete/{id}', [MahasiswaController::class, 'delete'])->name('delete');
// class Mahasiswa extends Model
// {
//     use HasFactory;
// }

