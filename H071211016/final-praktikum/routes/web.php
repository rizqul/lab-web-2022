<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\articleController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\subCategoryController;
use App\Http\Controllers\tagController;
use App\Http\Controllers\userListController;
use App\Http\Controllers\homePageController;
use App\Http\Controllers\articleListController;
use App\Http\Controllers\memberListController;
use App\Http\Controllers\memberDetailController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\publicArticleDetailController;



Route::group(['middleware' => ['auth', 'hakAkses:member, admin']], function(){

    Route::get('articles', [articleController::class , 'showArticles']);

    Route::get('/createArticle', [articleController::class , 'showCreateArticles']);

    Route::post('createArticle', [articleController::class , 'create']);

    Route::post('createCategory', [categoryController::class , 'create']);

    Route::get('articleDetail/{id}/{id2}', [articleController::class , 'showArticleDetail']);

    Route::post('editCategory/{id}', [categoryController::class, 'edit']);

    Route::get('category', [categoryController::class , 'showCategory']);

    Route::get('deleteCategory/{id}', [categoryController::class, 'delete']);

    Route::get('subCategory', [subCategoryController::class , 'showSubCategory']);

    Route::post('createSubCategory', [subCategoryController::class , 'create']);

    Route::get('tag', [TagController::class , 'showTag']);

    Route::post('createTag', [TagController::class , 'create']);

    Route::post('editSubCategory/{id}', [subCategoryController::class, 'edit']);

    Route::get('deleteSubCategory/{id}', [subCategoryController::class, 'delete']);

    Route::post('editTag/{id}', [tagController::class, 'edit']);

    Route::get('deleteTag/{id}', [tagController::class, 'delete']);

    Route::get('userList', [userListController::class , 'showUserList']);

    Route::get('articleEdit/{id}', [articleController::class, 'showArticleEdit']);

    Route::post('editArticle/{id}', [articleController::class, 'edit']);

    Route::get('profile/{id}', [profileController::class, 'showProfile']);

    Route::post('/editProfile/{id}', [profileController::class, 'editProfile']);

    Route::get('articleDelete/{id}', [articleController::class, 'deleteArticle']);

    Route::get('/deleteProfile/{id}', [profileController::class, 'deleteProfile']);

});

Route::get('', [homePageController::class , 'showHomePage']);
Route::get('articleList', [articleListController::class , 'showArticleList']);
Route::get('memberList', [memberListController::class , 'showMemberList']);
Route::get('memberDetail/{id}', [memberDetailController::class , 'showMemberDetail']);

Route::get('/login', [loginController::class , 'showLogin'])->name('login');
Route::post('loginProcess', [loginController::class , 'login']);
Route::get('/register', [registerController::class , 'showRegister'])->name('register');
Route::post('registerProcess', [registerController::class , 'register']);
Route::get('/logout', [loginController::class , 'logout']);

Route::get('publicArticleDetail/{id}', [publicArticleDetailController::class, 'showPublicArticleDetail']);