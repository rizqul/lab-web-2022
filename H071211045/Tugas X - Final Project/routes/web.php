<?php

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

Route::get('/', function () {
    return view('page.homepage');
});

/* 
 * CMS ROUTES 
 */

Route::get('/panel/dashboard', function () {
    return view('module.dashboard');
});

Route::get('/panel/articles', function () {
    return view('module.articles')->with('articles', 'active');
});

Route::get('/panel/categories', function () {
    return view('module.categories');
});

Route::get('/panel/tags', function () {
    return view('module.tags');
});

Route::get('/panel/users', function () {
    return view('module.users');
});

/* - */

Route::get('/login', function () {
    return view('module.login');
});

Route::get('/register', function () {
    return view('module.register');
});
