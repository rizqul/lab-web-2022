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


// NGATUR ARAH URL

Route::get('/', function () {
    return view('welcome');
});
Route::get('/datamahasiswa', [MahasiswaController::class, 'index']);            //menjalankan function index
Route::get('/datamahasiswa/add', [MahasiswaController::class, 'add']);          //menjalankan function add untuk manggil modal

Route::post('/datamahasiswa/add', [MahasiswaController::class, 'submit']);
//menjalankan function submit untuk dimasukkan ke database
Route::get('/datamahasiswa/delete/{id}', [MahasiswaController::class, 'delete']);
//DELETE DATA

Route::get('/datamahasiswa/edit/{id}', [MahasiswaController::class, 'edit']);       //UPDATE DATA
Route::post('/datamahasiswa/update/{id}', [MahasiswaController::class, 'update']);  //UPDATE DATA


Route::get('/datamahasiswa', function () {

    // MEMUNCULKAN DATA (READ DATA)

    return view('datamahasiswa', [
        'data' => DB::table('mahasiswas')->orderBy('updated_at','desc')->paginate(25)   //ini terurut dr data yg terbaru (order by)
        //Ini PAGINATION nyambung ke view
    ]);
});