<?php

use App\Http\Controllers\BookController;
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

Route::resource('/', BookController::class);

// Route::get('/create', [BookController::class, 'create'])->name('create');

Route::post('/store', [BookController::class, 'store'])->name('store');

Route::post('/edit', [BookController::class, 'edit'])->name('edit');

Route::post('/delete', [BookController::class, 'delete'])->name('delete');
