<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PageController::class, 'homepage'])->name('page.homepage');

/*
 * AUTH ROUTES
 */
Route::group(['middleware' => ['guest']], function() {
    Route::get('login', [ModuleController::class, 'login'])->name('login.show');
    Route::post('login', [UserController::class, 'login'])->name('login');

    Route::get('register', [ModuleController::class, 'register'])->name('register.show');
    Route::post('register', [UserController::class, 'register'])->name('register');
});
/* - */

/* 
 * CMS ROUTES 
 */
Route::group(['middleware' => ['auth']], function() {

    Route::get('/panel/dashboard', [ModuleController::class, 'dashboard'])->name('page.dashboard');
    Route::get('/panel/articles', [ModuleController::class, 'articles'])->name('page.articles');
    Route::get('/panel/categories', [ModuleController::class, 'categories'])->name('page.categories');
    Route::get('/panel/tags', [ModuleController::class, 'tags'])->name('page.tags');
    
    // Users
    Route::get('/panel/users/delete/{id}',  [UserController::class, 'delete'])->name('user.delete');
    Route::get('/panel/users/new', [ModuleController::class, 'userNew'])->name('page.users.new');
    Route::get('/panel/users', [ModuleController::class, 'users'])->name('page.users');
    Route::get('/panel/users?f={filter}', [ModuleController::class, 'users'])->name('users.filter');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
/* - */






