<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SellerPermissionController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\PermissionController;
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

Route::resource('/', MainController::class);
// Route::get('/', 'MainController@index');

Route::controller(ProductController::class)->group(function () {
    Route::post('/store-product-eloquent', 'storeProductEloquent');
    Route::post('/store-product-query', 'storeProductQuery');
    Route::get('/edit-product/{id}', 'editProduct');
    Route::post('/update-product-eloquent/{id}', 'updateProductEloquent');
    Route::post('/update-product-query/{id}', 'updateProductQuery');
    Route::get('/delete-product/{id}', 'deleteProduct');
});

Route::controller(PermissionController::class)->group(function () {
    Route::post('/store-permission-eloquent', 'storePermissionEloquent');
    Route::post('/store-permission-query', 'storePermissionQuery');
    Route::get('/edit-permission/{id}', 'editPermission');
    Route::post('/update-permission-eloquent/{id}', 'updatePermissionEloquent');
    Route::post('/update-permission-query/{id}', 'updatePermissionQuery');
    Route::get('/delete-permission/{id}', 'deletePermission');
});

Route::controller(CategoryController::class)->group(function () {
    Route::post('/store-category-eloquent', 'storeCategoryEloquent');
    Route::post('/store-category-query', 'storeCategoryQuery');
    Route::get('/edit-category/{id}', 'editCategory');
    Route::post('/update-category-eloquent/{id}', 'updateCategoryEloquent');
    Route::post('/update-category-query/{id}', 'updateCategoryQuery');
    Route::get('/delete-category/{id}', 'deleteCategory');
});

Route::controller(SellerController::class)->group(function () {
    Route::post('/store-seller-eloquent', 'storeSellerEloquent');
    Route::post('/store-seller-query', 'storeSellerQuery');
    Route::get('/edit-seller/{id}', 'editSeller');
    Route::post('/update-seller-eloquent/{id}', 'updateSellerEloquent');
    Route::post('/update-seller-query/{id}', 'updateSellerQuery');
    Route::get('/delete-seller/{id}', 'deleteSeller');
});

Route::controller(SellerPermissionController::class)->group(function () {
    Route::post('/store-seller-permission-eloquent', 'storeSellerPermsEloquent');
    Route::post('/store-seller-permission-query', 'storeSellerPermsQuery');
    Route::get('/edit-seller-permission/{id}', 'editSellerPerms');
    Route::post('/update-seller-permission-eloquent/{id}', 'updateSellerPermsEloquent');
    Route::post('/update-seller-permission-query/{id}', 'updateSellerPermsQuery');
    Route::get('/delete-seller-permission/{id}', 'deleteSellerPerms');
});
