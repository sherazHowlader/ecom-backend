<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('category.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('category/status/toggle', [CategoryController::class, 'statusToggle'])->name('category.status.toggle');
    Route::resource('category', CategoryController::class);

    Route::get('subcategory/status/toggle', [SubcategoryController::class, 'statusToggle'])->name('subcategory.status.toggle');
    Route::resource('subcategory', SubcategoryController::class);

    Route::get('product/status/toggle', [ProductController::class, 'statusToggle'])->name('product.status.toggle');
    Route::get('product/additional/image/delete/{id}', [ProductController::class, 'additionalImageDelete'])->name('product.additional.image.delete');
    Route::resource('product', ProductController::class);

    Route::get('coupon/status/toggle', [CouponController::class, 'statusToggle'])->name('coupon.status.toggle');
    Route::resource('coupon', CouponController::class);

    Route::get('order/complete/{id}', [OrderController::class, 'orderComplete'])->name('order.complete');
    Route::resource('order', OrderController::class);

    Route::resource('user', UserController::class);
});

Route::group(['middleware' => 'customer'], function () {
    Route::resource('customers', CustomerController::class);
    Route::get('check', [CustomerController::class, 'check'])->name('check');
});
Route::get('customer/login', [CustomerLoginController::class, 'loginForm'])->name('customer.login.form');
Route::post('customer/logged', [CustomerLoginController::class, 'login'])->name('customer.login');

Route::fallback(function () {
    return view('errors.404');
});
