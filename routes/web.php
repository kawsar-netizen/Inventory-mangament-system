<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('backend.pages.login');
});

Route::group(['middleware' => 'auth'], function () {

    //dashboard route here
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    //branch route here
    Route::resource('/branch', 'App\Http\Controllers\Admin\BranchController');

    //item category route here
    Route::resource('/item-category', 'App\Http\Controllers\Admin\ItemCategoryController');

    //product category route here
    Route::resource('/product-category', 'App\Http\Controllers\Admin\ProductCategoryController');

    //product category route here
    Route::resource('/product-entry', 'App\Http\Controllers\Admin\ProductEntryController');
});
