<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionSellerController;
use App\Http\Controllers\ProductController;
use App\Models\PermissionSeller;

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

    Route::delete('category/deleteEloq/{id}', 'deleteCategoryUseEloquent');
    Route::delete('category/deleteQue/{id}', 'deleteCategoryUseQueryBuilder');
});

Route::controller(PermissionController::class)->group(function () {
    Route::get('permission', 'index')->name('permission.index');

    Route::get('permission/{id}', 'getPermission')->name('permission.getPermission');

    Route::post('permission/storeEloq', 'savePermissionUseEloquent')->name('permission.storeEloq');
    Route::post('permission/storeQue', 'savePermissionUseQueryBuilder')->name('permission.storeQue');

    Route::post('permission/updateEloq', 'updatePermissionUseEloquent')->name('permission.updateEloq');
    Route::post('permission/updateQue', 'updatePermissionUseQueryBuilder')->name('permission.updateQue');

    Route::delete('permission/deleteEloq/{id}', 'deletePermissionUseEloquent');
    Route::delete('permission/deleteQue/{id}', 'deletePermissionUseQueryBuilder');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('product', 'index')->name('product.index');

    Route::get('product/{id}', 'getProduct')->name('product.getProduct');

    Route::post('product/storeEloq', 'saveProductUseEloquent')->name('product.storeEloq');
    Route::post('product/storeQue', 'saveProductUseQueryBuilder')->name('product.storeQue');

    Route::post('product/updateEloq', 'updateProductUseEloquent')->name('product.updateEloq');
    Route::post('product/updateQue', 'updateProductUseQueryBuilder')->name('product.updateQue');

    Route::delete('product/deleteEloq/{id}', 'deleteProductUseEloquent');
    Route::delete('product/deleteQue/{id}', 'deleteProductUseQueryBuilder');
});

Route::controller(PermissionSellerController::class)->group(function () {
    Route::get('permissionseller', 'index')->name('permissionseller.index');

    Route::get('permissionseller/{id}', 'getPermissionSeller')->name('permissionseller.getPermissionSeller');

    Route::post('permissionseller/storeEloq', 'savePermissionSellerUseEloquent')->name('permissionseller.storeEloq');
    Route::post('permissionseller/storeQue', 'savePermissionSellerUseQueryBuilder')->name('permissionseller.storeQue');

    Route::post('permissionseller/updateEloq', 'updatePermissionSellerUseEloquent')->name('permissionseller.updateEloq');
    Route::post('permissionseller/updateQue', 'updatePermissionSellerUseQueryBuilder')->name('permissionseller.updateQue');

    Route::delete('permissionseller/deleteEloq/{id}', 'deletePermissionSellerUseEloquent');
    Route::delete('permissionseller/deleteQue/{id}', 'deletePermissionSellerUseQueryBuilder');
});