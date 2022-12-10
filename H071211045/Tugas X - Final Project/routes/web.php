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

Route::get('/panel', function () {
    return view('module.dashboard');
});

Route::get('/login', function () {
    return view('module.login');
});

Route::get('/register', function () {
    return view('module.register');
});