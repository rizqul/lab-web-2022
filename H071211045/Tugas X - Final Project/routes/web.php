<?php

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
 * CMS ROUTES 
 */
Route::group(['middleware' => ['auth']], function() {
    Route::get('/panel/dashboard', [PageController::class, 'dashboard'])->name('page.dashboard');
    Route::get('/panel/articles', [PageController::class, 'articles'])->name('page.articles');
    Route::get('/panel/categories', [PageController::class, 'categories'])->name('page.categories');
    Route::get('/panel/tags', [PageController::class, 'tags'])->name('page.tags');
    
    // Users
    Route::get('panel/users', [PageController::class, 'users'])->name('page.users');
    Route::get('panel/users/new', [PageController::class, 'userNew'])->name('page.users.new');
    Route::post('panel/users/delete/',  [UserController::class, 'delete'])->name('user.delete');
    Route::get('/panel/users?f={filter}', [PageController::class, 'users'])->name('users.filter');

    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});
/* - */

/*
 * AUTH ROUTES
 */
Route::group(['middleware' => ['guest']], function() {
    Route::get('login', [PageController::class, 'login'])->name('login.show');
    Route::post('login', [UserController::class, 'login'])->name('login');

    Route::get('register', [PageController::class, 'register'])->name('register.show');
    Route::post('register', [UserController::class, 'register'])->name('register');
});
/* - */




