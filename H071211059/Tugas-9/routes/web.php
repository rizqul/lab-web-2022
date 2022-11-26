<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\CategoryController;

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

Route::controller(SellerController::class)->group(function () {
    Route::get('seller', 'index')->name('seller');
    Route::post('seller/storeEloq', 'saveSellerUseEloquent')->name('seller.storeEloq');
    Route::post('seller/storeQue', 'saveSellerUseQueryBuilder')->name('seller.storeQue');

    Route::post('seller/updateEloq', 'updateSellerUseEloquent')->name('seller.updateEloq');
    Route::post('seller/updateQue', 'updateSellerUseQueryBuilder')->name('seller.updateQue');

    Route::delete('seller/deleteEloq/{id}', 'deleteSellerUseEloquent');
    Route::delete('seller/deleteQue/{id}', 'deleteSellerUseQueryBuilder');

    Route::get('seller/{id}', 'getSeller')->name('seller.getSeller');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('category', 'index')->name('category.index');

    Route::get('category/{id}', 'getCategory')->name('category.getCategory');

    Route::post('category/storeEloq', 'saveCategoryUseEloquent')->name('category.storeEloq');
    Route::post('category/storeQue', 'saveCategoryUseQueryBuilder')->name('category.storeQue');

    Route::post('category/updateEloq', 'updateCategoryUseEloquent')->name('category.updateEloq');
    Route::post('category/updateQue', 'updateCategoryUseQueryBuilder')->name('category.updateQue');
});