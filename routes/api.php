<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\API\FrontendController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Public Routes
Route::get('categories/',[FrontendController::class,'getCategories']);
Route::get('categorie/{slug}',[FrontendController::class,'categoryWiseProduct']);


Route::get('products/',[ProductController::class,'getAllProduct']);
Route::get('product/{slug}',[ProductController::class,'getProductBySlug']);
Route::get('product-images/{slug}',[ProductController::class,'productImages']);
Route::get('product-variant/{slug}',[ProductController::class,'productVariant']);
Route::post('coupon/',[ProductController::class,'coupon']);

Route::get('carts/',[\App\Http\Controllers\CartController::class,'getAllCarts']);
Route::post('add-cart-item/',[\App\Http\Controllers\CartController::class,'addCartItem']);
Route::get('cart-inc/{SKU}',[\App\Http\Controllers\CartController::class,'cartInc']);
Route::get('cart-dec/{SKU}',[\App\Http\Controllers\CartController::class,'cartDec']);
Route::delete('cart-item-remove/{SKU}',[\App\Http\Controllers\CartController::class,'removeCartItem']);


Route::post('place-order/',[OrderController::class,'placeOrder']);


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
//Route::get('/csrf-token', function (Request $request) {
//    return response()->json(['csrfToken' => csrf_token()]);
//});
