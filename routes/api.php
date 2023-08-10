<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CouponController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

//Public Routes
Route::get('categories/', [CategoryController::class, 'getCategories']);
Route::get('categorie/{slug}', [CategoryController::class, 'categoryWiseProduct']);

Route::get('products/', [ProductController::class, 'getAllProduct']);
Route::get('product/{slug}', [ProductController::class, 'getProductBySlug']);
Route::get('product-images/{slug}', [ProductController::class, 'productImages']);
Route::get('product-variant/{slug}', [ProductController::class, 'productVariant']);
Route::post('coupon/', [CouponController::class, 'coupon']);

Route::get('carts/', [CartController::class, 'getAllCarts']);
Route::post('add-cart-item/', [CartController::class, 'addCartItem']);
Route::get('cart-inc/{SKU}', [CartController::class, 'cartInc']);
Route::get('cart-dec/{SKU}', [CartController::class, 'cartDec']);
Route::delete('cart-item-remove/{SKU}', [CartController::class, 'removeCartItem']);

Route::post('place-order/', [OrderController::class, 'placeOrder']);

Route::controller(AuthController::class)->group(function () {
    Route::post('login/', 'login');
    Route::post('register/', 'register');
    Route::get('mytoken/', [AuthController::class, 'mytoken']);
});

//Protected Routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::delete('logout/', [AuthController::class, 'logout']);
});

Route::get('/csrf-token', function () {
    return response()->json([
        'token' => csrf_token()
    ]);
});
