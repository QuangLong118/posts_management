<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\UserCatalogueController;
use App\Http\Controllers\Backend\PostCatalogueController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('login');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::group(['middleware' => ['admin','locale']], function(){
    // User
    Route::group(['prefix' => 'user/user'],function(){
        Route::get('index', [UserController::class, 'index'])->name('user.user.index');
        Route::get('create', [UserController::class, 'create'])->name('user.user.create');
        Route::post('store', [UserController::class, 'store'])->name('user.user.store');
        Route::get('{id}/edit', [UserController::class, 'edit'])->where(['id'=>'[0-9]+'])->name('user.user.edit');
        Route::post('{id}/update', [UserController::class, 'update'])->where(['id'=>'[0-9]+'])->name('user.user.update');
        Route::get('{id}/delete', [UserController::class, 'delete'])->where(['id'=>'[0-9]+'])->name('user.user.delete');
        Route::delete('{id}/destroy', [UserController::class, 'destroy'])->where(['id'=>'[0-9]+'])->name('user.user.destroy');
        Route::get('permission', [UserCatalogueController::class, 'permission'])->name('user.user.permission');
    });
    //UserCatalogue
    Route::group(['prefix' => 'user/catalogue'],function(){
        Route::get('index', [UserCatalogueController::class, 'index'])->name('user.catalogue.index');
        Route::get('create', [UserCatalogueController::class, 'create'])->name('user.catalogue.create');
        Route::post('store', [UserCatalogueController::class, 'store'])->name('user.catalogue.store');
        Route::get('{id}/edit', [UserCatalogueController::class, 'edit'])->where(['id'=>'[0-9]+'])->name('user.catalogue.edit');
        Route::post('{id}/update', [UserCatalogueController::class, 'update'])->where(['id'=>'[0-9]+'])->name('user.catalogue.update');
        Route::get('{id}/delete', [UserCatalogueController::class, 'delete'])->where(['id'=>'[0-9]+'])->name('user.catalogue.delete');
        Route::delete('{id}/destroy', [UserCatalogueController::class, 'destroy'])->where(['id'=>'[0-9]+'])->name('user.catalogue.destroy');
        Route::get('permission', [UserCatalogueController::class, 'permission'])->name('user.catalogue.permission');
        Route::post('updatePermission', [UserCatalogueController::class, 'updatePermission'])->name('user.catalogue.updatePermission');
    });

    //Permission
    Route::group(['prefix' => 'user/permission'],function(){
        Route::get('index', [PermissionController::class, 'index'])->name('user.permission.index');
        Route::get('create', [PermissionController::class, 'create'])->name('user.permission.create');
        Route::post('store', [PermissionController::class, 'store'])->name('user.permission.store');
        Route::get('{id}/edit', [PermissionController::class, 'edit'])->where(['id'=>'[0-9]+'])->name('user.permission.edit');
        Route::post('{id}/update', [PermissionController::class, 'update'])->where(['id'=>'[0-9]+'])->name('user.permission.update');
        Route::get('{id}/delete', [PermissionController::class, 'delete'])->where(['id'=>'[0-9]+'])->name('user.permission.delete');
        Route::delete('{id}/destroy', [PermissionController::class, 'destroy'])->where(['id'=>'[0-9]+'])->name('user.permission.destroy');
    });

    // Language
    Route::group(['prefix' => 'language'],function(){
        Route::get('index', [LanguageController::class, 'index'])->name('language.index');
        Route::get('create', [LanguageController::class, 'create'])->name('language.create');
        Route::post('store', [LanguageController::class, 'store'])->name('language.store');
        Route::get('{id}/edit', [LanguageController::class, 'edit'])->where(['id'=>'[0-9]+'])->name('language.edit');
        Route::post('{id}/update', [LanguageController::class, 'update'])->where(['id'=>'[0-9]+'])->name('language.update');
        Route::get('{id}/switch', [LanguageController::class, 'swicthBackendLanguage'])->where(['id' => '[0-9]+'])->name('language.switch');
        Route::get('{id}/delete', [LanguageController::class, 'delete'])->where(['id'=>'[0-9]+'])->name('language.delete');
        Route::delete('{id}/destroy', [LanguageController::class, 'destroy'])->where(['id'=>'[0-9]+'])->name('language.destroy');
        Route::get('{id}/{languageID}/{model}/translate', [LanguageController::class, 'translate'])->where(['id'=>'[0-9]+','languageID'=>'[0-9]+'])->name('language.translate');
        Route::post('storeTranslate', [LanguageController::class, 'storeTranslate'])->name('language.storeTranslate');
    });

    // PostCatalogue
    Route::group(['prefix' => 'post/catalogue'],function(){
        Route::get('index', [PostCatalogueController::class, 'index'])->name('post.catalogue.index');
        Route::get('create', [PostCatalogueController::class, 'create'])->name('post.catalogue.create');
        Route::post('store', [PostCatalogueController::class, 'store'])->name('post.catalogue.store');
        Route::get('{id}/edit', [PostCatalogueController::class, 'edit'])->where(['id'=>'[0-9]+'])->name('post.catalogue.edit');
        Route::post('{id}/update', [PostCatalogueController::class, 'update'])->where(['id'=>'[0-9]+'])->name('post.catalogue.update');
        Route::get('{id}/delete', [PostCatalogueController::class, 'delete'])->where(['id'=>'[0-9]+'])->name('post.catalogue.delete');
        Route::delete('{id}/destroy', [PostCatalogueController::class, 'destroy'])->where(['id'=>'[0-9]+'])->name('post.catalogue.destroy');
    });

    // Post
    Route::group(['prefix' => 'post/post'],function(){
        Route::get('index', [PostController::class, 'index'])->name('post.post.index');
        Route::get('create', [PostController::class, 'create'])->name('post.post.create');
        Route::post('store', [PostController::class, 'store'])->name('post.post.store');
        Route::get('{id}/edit', [PostController::class, 'edit'])->where(['id'=>'[0-9]+'])->name('post.post.edit');
        Route::post('{id}/update', [PostController::class, 'update'])->where(['id'=>'[0-9]+'])->name('post.post.update');
        Route::get('{id}/delete', [PostController::class, 'delete'])->where(['id'=>'[0-9]+'])->name('post.post.delete');
        Route::delete('{id}/destroy', [PostController::class, 'destroy'])->where(['id'=>'[0-9]+'])->name('post.post.destroy');
    });

    // Dashboard
    Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

    // AJAX
    Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.getLocation');
    Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.changeStatus');
    Route::post('ajax/dashboard/changeStatusAll', [AjaxDashboardController::class, 'changeStatusAll'])->name('ajax.dashboard.changeStatusAll');

});