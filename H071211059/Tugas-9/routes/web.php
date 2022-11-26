<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;

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

Route::get('seller', [SellerController::class, 'index'])->name('seller');

Route::post('seller/storeEloq', [SellerController::class, 'saveProductUseEloquent'])->name('seller.storeEloq');
Route::post('seller/storeQue', [SellerController::class, 'saveProductUseQueryBuilder'])->name('seller.storeQue');

Route::post('seller/updateEloq', [SellerController::class, 'updateProductUseEloquent'])->name('seller.updateEloq');
Route::post('seller/updateQue', [SellerController::class, 'updateProductUseQueryBuilder'])->name('seller.updateQue');

Route::delete('seller/deleteEloq/{id}', [SellerController::class, 'deleteProductUseEloquent']);
Route::delete('seller/deleteQue/{id}', [SellerController::class, 'deleteProductUseQueryBuilder']);

Route::get('seller/{id}', [SellerController::class, 'getSeller'])->name('seller.getSeller');