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
Route::get('/panel/dashboard', [PageController::class, 'dashboard'])->name('page.dashboard')->middleware('auth');
Route::get('/panel/articles', [PageController::class, 'articles'])->name('page.articles')->middleware('auth');
Route::get('/panel/categories', [PageController::class, 'categories'])->name('page.categories')->middleware('auth');
Route::get('/panel/tags', [PageController::class, 'tags'])->name('page.tags')->middleware('auth');
Route::get('/panel/users', [PageController::class, 'users'])->name('page.users')->middleware('auth');
/* - */

Route::group(['middleware' => ['guest']], function() {
    Route::get('login', [PageController::class, 'login'])->name('login.show');
    Route::post('login', [UserController::class, 'login'])->name('login');

    Route::get('register', [PageController::class, 'register'])->name('register.show');
    Route::post('register', [UserController::class, 'register'])->name('register');
});

Route::get('logout', [UserController::class, 'logout'])->name('logout');

