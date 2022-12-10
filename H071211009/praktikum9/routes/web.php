<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\sellerPermissionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;      //panggil database

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

Route :: get('/', function () {
    return view('welcome');
});

Route :: get ('/seller', [SellerController::class, 'index']);
Route :: post ('/seller/add', [SellerController::class, 'store']);
Route :: get ('/seller/add', [SellerController::class, 'add']);
Route :: post ('/seller/update/{id}', [SellerController::class, 'update']);
Route :: get ('/seller/delete/{id}', [SellerController::class, 'delete']);

Route :: get ('/permission', [PermissionController::class, 'index']);
Route :: get ('/permission', function() {
    return view ('permission', [
        'data' => DB::table('permissions')->orderBy('updated_at', 'desc')->paginate(10)
    ]);
});

Route :: post ('/permission/add', [PermissionController::class, 'store']);
Route :: get ('/permission/add', [PermissionController::class, 'add']);
Route :: get ('/permission/edit/{id}', [PermissionController::class, 'edit']);
Route :: post ('/permission/update/{id}', [PermissionController::class, 'update']);
Route :: get ('/permission/delete/{id}', [PermissionController::class, 'delete']);


Route :: get ('/product', [ProductController::class, 'index']);
Route :: post ('/product/add', [ProductController::class, 'store']);
Route :: get ('/product/add', [ProductController::class, 'add']); 
Route :: post ('/product/update/{id}', [ProductController::class, 'update']);
Route :: get ('/product/delete/{id}', [ProductController::class, 'delete']);


Route :: get ('/category', [CategoryController::class, 'index']);
Route :: get ('/category', function(){
    return view ('category', [
        'data' => DB::table ('categories')->orderBy('updated_at', 'desc')->paginate(10)
    ]);
});
Route :: post ('/category/add', [CategoryController::class, 'store']);
Route :: get ('/category/add', [CategoryController::class, 'add']);
// Route :: match (['get', 'post'], '/category/edit{id}', [CategoryController::class, 'edit']);
Route :: post('/category/update/{id}', [CategoryController::class, 'update']);
Route :: get ('/category/delete/{id}', [CategoryController::class, 'delete']);

Route :: post ('/seller_permission/add', [SellerPermissionController::class, 'store']);
Route :: get ('/seller_permission/add' , [SellerPermissionController::class, 'add']);
// Route :: get ('/seller_permission/edit/{id}', [SellerPermissionController::class, 'edit']);
Route :: post ('/seller_permission/update/{id}', [SellerPermissionController::class, 'update']);
Route :: get ('/seller_permission/delete/{id}', [SellerPermissionController::class, 'delete']);
Route :: get ('/seller_permission', [SellerPermissionController::class, 'index']);
// Route :: get ('/seller_permission', function() {
//     return view ('seller_permission', [
//         'data' => DB::table('sellerpermissions')->orderBy('updated_at', 'desc')->paginate(10)
//     ]);
// });