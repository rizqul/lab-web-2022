<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'homepage'])->name('page.homepage');
Route::get('home', [PageController::class, 'homepage'])->name('page.homepage');

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
    Route::get('/panel', [ModuleController::class, 'dashboard'])->name('page.dashboard');
    Route::get('panel/dashboard', [ModuleController::class, 'dashboard'])->name('page.dashboard');
    Route::get('panel/articles', [ModuleController::class, 'articles'])->name('page.articles');
    Route::get('panel/categories', [ModuleController::class, 'categories'])->name('page.categories');
    Route::get('panel/tags', [ModuleController::class, 'tags'])->name('page.tags');
    
    // Users
    Route::get('panel/users', [ModuleController::class, 'users'])->name('page.users');
    Route::post('panel/users', [ModuleController::class, 'usersFilter'])->name('page.users.filter');
    Route::get('panel/users/edit/{id}',  [ModuleController::class, 'userEdit'])->name('user.delete');
        // TODO: Tambah route untuk update user setelah edit (sesuikan saja ces)
    Route::get('panel/users/delete/{id}',  [UserController::class, 'delete'])->name('user.delete');
    Route::get('panel/users/new', [ModuleController::class, 'userNew'])->name('page.users.new');

    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});
/* - */






