<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\CurrencyController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Admin" middleware group. Make something great!
|
*/

Route::prefix('admin/')->group(function(){
    // Dashboard
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    // Category Route
    Route::resource('category',CategoryController::class);
    // ajax category route
    Route::get('get/category',[CategoryController::class,'getCate'])->name('getCategory');
    Route::post('delete/category',[CategoryController::class,'deleteCate'])->name('deleteCategory');
    Route::post('category-update',[CategoryController::class,'updateCategory'])->name('updateCategory');
    Route::get('category-status',[CategoryController::class,'CategoryStatus'])->name('CategoryStatus');

    // Sub Category Routes
    Route::resource('sub-category',SubCategoryController::class);
    // Ajax sub category
    Route::get('get/sub-category',[SubCategoryController::class,'getSubCategory'])->name('getSubCategory');
    Route::post('delete/sub-category',[SubCategoryController::class,'deleteSubCategory'])->name('deleteSubCategory');
    Route::post('sub-category-update',[SubCategoryController::class,'UpdateSubCat'])->name('UpdateSubCat');
    Route::get('sub-category-status',[SubCategoryController::class,'SubCatStatus'])->name('SubCategoryStatus');

    // Child Category
    Route::get('child-category',[ChildCategoryController::class,'index'])->name('child.index');

    // Child Category ajax
    Route::post('child-category/insert',[ChildCategoryController::class,'store'])->name('childCat.store');
    Route::get('get/child-category',[ChildCategoryController::class,'getChildCategory'])->name('childCat.get');
    Route::post('delete/child-category',[ChildCategoryController::class,'destroy'])->name('childCat.delete');
    Route::post('update/child-category',[ChildCategoryController::class,'update'])->name('childCat.update');
    Route::get('child-category-status',[ChildCategoryController::class,'status'])->name('childCat.status');

    // Brand route
    Route::get('brand',[BrandController::class,'index'])->name('brand.index');
    Route::post('brand/store',[BrandController::class,'store'])->name('brand.store');
    Route::get('brand/get',[BrandController::class,'getBrand'])->name('brand.get');
    Route::post('brand/delete',[BrandController::class,'deleteBrand'])->name('brand.delete');
    Route::post('brand/update',[BrandController::class,'updateBrand'])->name('brand.update');
    Route::get('brand/status',[BrandController::class,'statusBrand'])->name('brand.status');

    // Product routes
    Route::get('product',[ProductController::class,'index'])->name('product.index');
    Route::post('product/store',[ProductController::class,'store'])->name('pro.store');
    Route::get('product/delete',[ProductController::class,'destroy'])->name('pro.delete');
    Route::get('get-product',[ProductController::class,'show'])->name('product.show');
    Route::get('get-subcategory',[ProductController::class,'getSubCategory'])->name('getSubCat');
    Route::get('get-child-category',[ProductController::class,'getChildCategory'])->name('getChildCat');
    Route::post('product/update',[ProductController::class,'update'])->name('pro.update');
    Route::get('product/status',[ProductController::class,'status'])->name('pro.status');

    // Order managment
    Route::get('order',[OrderController::class,'order'])->name('order');
    Route::get('pending-order',[OrderController::class,'pending_order'])->name('pending.order');
    Route::get('order-filter',[OrderController::class,'order_filter'])->name('order.filter');

    // Dynamic page
    Route::get('page',[PageController::class,'index'])->name('page.index');
    Route::post('page/store',[PageController::class,'store'])->name('page.store');
    Route::get('page/get',[PageController::class,'getPage'])->name('page.get');
    Route::post('page/update',[PageController::class,'update'])->name('page.update');
    Route::post('page/delete',[PageController::class,'destroy'])->name('page.delete');
    Route::get('page/status',[PageController::class,'status'])->name('page.status');

    // Settings Modiul
        // Footer
    Route::get('setting',[FooterController::class,'index'])->name('footer.index');
    Route::post('setting/footer-update',[FooterController::class,'FooterUpdate'])->name('footer.update');
    Route::post('setting/social',[FooterController::class,'social'])->name('social.update');
    Route::post('setting/banner',[FooterController::class,'banner'])->name('banner.update');
        //currency
    Route::get('setting/currency',[CurrencyController::class,'index'])->name('currency.index');
    Route::get('setting/currency/get',[CurrencyController::class,'getCurrency'])->name('currency.get');
    Route::post('setting/currency-store',[CurrencyController::class,'store'])->name('currency.store');
    Route::post('setting/currency-delete',[CurrencyController::class,'destroy'])->name('currency.delete');
    Route::post('setting/currency-update',[CurrencyController::class,'update'])->name('currency.update');

});
