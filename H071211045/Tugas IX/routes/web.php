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

// $index = ['/', '/products', '/categories', '/sellers', '/permissions', '/seller-permissions'];

// foreach ($index as $route) {
//     return Route::resource($route, MainController::class);
// }

// Route::get('/products', function () {
//     return view('index');
// });

Route::get('/', [MainController::class, 'index']);
Route::get('/products', [MainController::class, 'index']);
Route::get('/categories', [MainController::class, 'index']);
Route::get('/sellers', [MainController::class, 'index']);
Route::get('/permissions', [MainController::class, 'index']);
Route::get('/seller-permissions', [MainController::class, 'index']);

Route::post('/view-products', [MainController::class, 'postView']);
Route::post('/view-categories', [MainController::class, 'postView']);
Route::post('/view-sellers', [MainController::class, 'postView']);
Route::post('/view-permissions', [MainController::class, 'postView']);
Route::post('/view-seller-permissions', [MainController::class, 'postView']);

Route::post('/store-product-eloquent', [ProductController::class, 'storeProductEloquent']);
Route::post('/store-product-query', [ProductController::class, 'storeProductQuery']);
Route::get('/edit-product/{id}', [ProductController::class, 'editProduct']);
Route::post('/update-product-eloquent/{id}', [ProductController::class, 'updateProductEloquent']);
Route::post('/update-product-query/{id}', [ProductController::class, 'updateProductQuery']);
Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct']);

Route::post('/store-permission-eloquent', [PermissionController::class, 'storePermissionEloquent']);
Route::post('/store-permission-query', [PermissionController::class, 'storePermissionQuery']);
Route::get('/edit-permission/{id}', [PermissionController::class, 'editPermission']);
Route::post('/update-permission-eloquent/{id}', [PermissionController::class, 'updatePermissionEloquent']);
Route::post('/update-permission-query/{id}', [PermissionController::class, 'updatePermissionQuery']);
Route::get('/delete-permission/{id}', [PermissionController::class, 'deletePermission']);

Route::post('/store-category-eloquent', [CategoryController::class, 'storeCategoryEloquent']);
Route::post('/store-category-query', [CategoryController::class, 'storeCategoryQuery']);
Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory']);
Route::post('/update-category-eloquent/{id}', [CategoryController::class, 'updateCategoryEloquent']);
Route::post('/update-category-query/{id}', [CategoryController::class, 'updateCategoryQuery']);
Route::get('/delete-category/{id}', [CategoryController::class, 'deleteCategory']);

Route::post('/store-seller-eloquent', [SellerController::class, 'storeSellerEloquent']);
Route::post('/store-seller-query', [SellerController::class, 'storeSellerQuery']);
Route::get('/edit-seller/{id}', [SellerController::class, 'editSeller']);
Route::post('/update-seller-eloquent/{id}', [SellerController::class, 'updateSellerEloquent']);
Route::post('/update-seller-query/{id}', [SellerController::class, 'updateSellerQuery']);
Route::get('/delete-seller/{id}', [SellerController::class, 'deleteSeller']);

Route::post('/store-seller-permission-eloquent', [SellerPermissionController::class, 'storeSellerPermsEloquent']);
Route::post('/store-seller-permission-query', [SellerPermissionController::class, 'storeSellerPermsQuery']);
Route::get('/edit-seller-permission/{id}', [SellerPermissionController::class, 'editSellerPerms']);
Route::post('/update-seller-permission-eloquent/{id}', [SellerPermissionController::class, 'updateSellerPermsEloquent']);
Route::post('/update-seller-permission-query/{id}', [SellerPermissionController::class, 'updateSellerPermsQuery']);
Route::get('/delete-seller-permission/{id}', [SellerPermissionController::class, 'deleteSellerPerms']);
