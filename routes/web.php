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

Route::group(['middleware' => 'prevent-back-history'],function(){
	Auth::routes();
    Route::get('/login/admin', [App\Http\Controllers\Auth\LoginAdminController::class, 'showLoginForm']);
    Route::post('/login/admin', [App\Http\Controllers\Auth\LoginAdminController::class, 'login'])->name('login.admin');
	Route::get('/logout/admin', [App\Http\Controllers\Auth\LoginAdminController::class, 'logout'])->name('logout.admin');

    Route::get('/password/request/admin', [App\Http\Controllers\Auth\ForgotAdminPasswordController::class], 'showLinkRequestForm')->name('password.request.admin');
    Route::post('/password/email/admin', [App\Http\Controllers\Auth\ForgotAdminPasswordController::class], 'sendResetLinkEmail')->name('password.email.admin');
    Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class], 'registerAdmin')->name('register.admin');
    
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Category
    Route::get('/category', [App\Http\Controllers\ComicController::class, 'viewCategory'])->name('category');
    Route::post('/create-category', [App\Http\Controllers\ComicController::class, 'createCategory'])->name('create-category');

    // Comics
    Route::get('/comic', [App\Http\Controllers\ComicController::class, 'viewComic'])->name('comic');
    Route::post('/create-comic', [App\Http\Controllers\ComicController::class, 'createComic'])->name('create-comic');
});


