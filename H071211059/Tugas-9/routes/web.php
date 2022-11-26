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

Route::get('/', function () {
    return view('welcome');
});

Route::get('seller', [\App\Http\Controllers\SellerController::class, 'index'])->name('seller');
Route::post('seller/store', [\App\Http\Controllers\SellerController::class, 'saveProductUseEloquent'])->name('seller.storeEloq');
Route::post('seller/store', [\App\Http\Controllers\SellerController::class, 'saveProductUseQueryBuilder'])->name('seller.storeQue');