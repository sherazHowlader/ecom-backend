<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Public Routes
Route::get('products/',[\App\Http\Controllers\productController::class,'getAllProduct']);
Route::get('product/{slug}',[\App\Http\Controllers\productController::class,'getProductBySlug']);

Route::get('product-images/{slug}',[\App\Http\Controllers\productController::class,'productImages']);
Route::get('product-variant/{slug}',[\App\Http\Controllers\productController::class,'productVariant']);



Route::post('coupon/',[\App\Http\Controllers\productController::class,'coupon']);

Route::get('carts/',[\App\Http\Controllers\cartController::class,'getAllCarts']);
Route::post('add-cart-item/',[\App\Http\Controllers\cartController::class,'addCartItem']);
Route::get('cart-inc/{SKU}',[\App\Http\Controllers\cartController::class,'cartInc']);
Route::get('cart-dec/{SKU}',[\App\Http\Controllers\cartController::class,'cartDec']);
Route::delete('cart-item-remove/{SKU}',[\App\Http\Controllers\cartController::class,'removeCartItem']);

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
        'csrfToken' => csrf_token()
    ]);
});
