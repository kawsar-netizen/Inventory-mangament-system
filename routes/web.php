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

    //user route here
    Route::resource('/user', 'App\Http\Controllers\Admin\UserController');

    //branch route here
    Route::resource('/branch', 'App\Http\Controllers\Admin\BranchController');

    //item category route here
    Route::resource('/item-category', 'App\Http\Controllers\Admin\ItemCategoryController');

    //product category route here
    Route::resource('/product-category', 'App\Http\Controllers\Admin\ProductCategoryController');

    Route::post('/valuation',[App\Http\Controllers\Admin\ProductCategoryController::class, 'productCategoryValuation'])->name('productCategoryValuation');

    //product entry route here
    Route::resource('/product-entry', 'App\Http\Controllers\Admin\ProductEntryController');
    Route::post('/product-category-dropdown',[App\Http\Controllers\Admin\ProductEntryController::class, 'productCategoryDropdown'])->name('productCategoryDropdown');


    //product requisition route here
    Route::resource('/product-requisition', 'App\Http\Controllers\Admin\ProductRequisitionController');
    Route::post('/product-entry-dropdown',[App\Http\Controllers\Admin\ProductRequisitionController::class, 'productEntryDropdown'])->name('productEntryDropdown');
    Route::post('/product-entry-brand-dropdown',[App\Http\Controllers\Admin\ProductRequisitionController::class, 'productEntryBrandDropdown'])->name('productEntryBrandDropdown');

    Route::post('/product-requisition/review/modal', [App\Http\Controllers\Admin\ProductRequisitionController::class, 'requisitionReviewModal'])->name('requisition_review_modal');

    Route::post('/product-requisition/reviewAcceptedByManager', [App\Http\Controllers\Admin\ProductRequisitionController::class, 'requisitionReviewAcceptedByBranchManager'])->name('requisition_accepted_by_branch_manager');


     Route::post('/product-requisition/reviewDeclinedByManager', [App\Http\Controllers\Admin\ProductRequisitionController::class, 'requisitionReviewDeclinedByBranchManager'])->name('requisition_declined_by_branch_manager');

});
