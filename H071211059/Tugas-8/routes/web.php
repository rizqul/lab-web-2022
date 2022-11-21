<?php

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

Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('index');
Route::post('store', [\App\Http\Controllers\ProductController::class, 'store'])->name('store');
Route::post('update', [\App\Http\Controllers\ProductController::class, 'update'])->name('update');
Route::get('delete/{id}', [\App\Http\Controllers\ProductController::class, 'delete'])->name('delete');
