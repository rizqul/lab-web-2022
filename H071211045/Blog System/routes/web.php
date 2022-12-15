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


/*
 * FRONT-END ROUTES
 */
Route::get('/', [PageController::class, 'homepage'])->name('page.homepage');
Route::get('home', function () {
    return redirect()->route('page.homepage');
});

Route::get('member/{username}', [PageController::class, 'member'])->name('page.member');
/* - */

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
    Route::get('panel', function () {
        return redirect()->route('page.dashboard');
    });
    
    Route::get('panel/dashboard', [ModuleController::class, 'dashboard'])->name('page.dashboard');

    // Articles
    Route::get('panel/articles', [ModuleController::class, 'articles'])->name('page.articles');
    Route::get('panel/articles/edit/{id}',  [ModuleController::class, 'articleEdit'])->name('page.articles.edit');
    Route::get('panel/articles/delete/{id}',  [ModuleController::class, 'articleDelete'])->name('article.delete');
    Route::post('panel/articles/store', [ModuleController::class, 'articleStore'])->name('articles.store');

    // Categories
    Route::get('panel/categories', [ModuleController::class, 'categories'])->name('page.categories');
    Route::get('panel/categories/edit/{id}',  [ModuleController::class, 'categoryEdit'])->name('page.categories.edit');
    Route::get('panel/categories/delete/{id}',  [ModuleController::class, 'categoryDelete'])->name('category.delete');
    Route::post('panel/categories/store', [ModuleController::class, 'categoryStore'])->name('categories.store');
    
    // Tags
    Route::get('panel/tags', [ModuleController::class, 'tags'])->name('page.tags');
    Route::get('panel/tags/edit/{id}',  [ModuleController::class, 'tagEdit'])->name('page.tags.edit');
    Route::get('panel/tags/delete/{id}',  [ModuleController::class, 'tagDelete'])->name('tag.delete');
    Route::post('panel/tags/store', [ModuleController::class, 'tagStore'])->name('tags.store');
    
    // Users
    Route::get('panel/users', [ModuleController::class, 'users'])->name('page.users');
    Route::get('panel/users/edit/{id}',  [ModuleController::class, 'userEdit'])->name('page.users.edit');
    Route::post('panel/users/edit/',  [UserController::class, 'update'])->name('page.users.update');
    Route::get('panel/users/delete/{id}',  [UserController::class, 'delete'])->name('user.delete');
    Route::get('panel/users/new', [ModuleController::class, 'userNew'])->name('page.users.new');
    Route::post('panel/users/store', [ModuleController::class, 'userStore'])->name('page.users.store');

    // Auth
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});
/* - */






