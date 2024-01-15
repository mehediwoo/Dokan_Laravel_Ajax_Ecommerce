<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ViewProductController;
use App\Http\Controllers\User\CategoryProductController;
use App\Http\Controllers\User\SubCategoryProduct;
use App\Http\Controllers\User\ChildCategoryProduct;
use App\Http\Controllers\User\BrandProductController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ShippingController;
use App\Http\Controllers\User\CheckoutController;

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
// Home route
Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/quick-view', [HomeController::class,'quick_view'])->name('quick.view');
// View  product
Route::get('/product/{slug}',[ViewProductController::class,'index'])->name('single.product');
Route::get('/category/{slug}',[CategoryProductController::class,'index'])->name('category.product');
Route::get('/subcategory/{slug}',[SubCategoryProduct::class,'index'])->name('sub.category.product');
Route::get('/child-category/{slug}',[ChildCategoryProduct::class,'index'])->name('child.category.product');
Route::get('/brand/{slug}',[BrandProductController::class,'index'])->name('brand.product');

// Customer Controller
Route::post('/register',[CustomerController::class,'register'])->name('customer.register');
Route::post('/login',[CustomerController::class,'login'])->name('customer.login');
Route::get('/logout',[CustomerController::class,'logOut'])->name('customer.logout');

// Cart Route
Route::post('/cart-store',[CartController::class,'store'])->name('cart.store')->middleware('customerAuth');
Route::get('/cart',[CartController::class,'view_cart'])->name('cart')->middleware('customerAuth');
Route::get('/get-cart-itam',[CartController::class,'get_cart_iteam'])->name('get.cart')->middleware('customerAuth');
Route::get('/cart-remove',[CartController::class,'remove_cart'])->name('cart.remove')->middleware('customerAuth');
Route::get('/cart-plus',[CartController::class,'plus_cart'])->name('cart.plus')->middleware('customerAuth');
Route::get('/cart-qty-minus',[CartController::class,'minus_cart'])->name('cart.minus')->middleware('customerAuth');
// Shipping Info
Route::get('/shipping',[ShippingController::class,'index'])->name('shipping')->middleware('customerAuth');
Route::post('/shipping-store',[ShippingController::class,'store'])->name('shipping.store')->middleware('customerAuth');
// Checkout
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout')->middleware('customerAuth');
Route::post('/order',[CheckoutController::class,'ConfirmOrder'])->name('confirm.order')->middleware('customerAuth');

