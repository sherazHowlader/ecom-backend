<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
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

Route::group(['middleware'=>['auth']],function(){
    Route::get('category/status/toggle',[CategoryController::class,'statusToggle'])->name('category.status.toggle');
    Route::resource('category',CategoryController::class);

    Route::get('subcategory/status/toggle',[SubcategoryController::class,'statusToggle'])->name('subcategory.status.toggle');
    Route::resource('subcategory',SubcategoryController::class);

    Route::get('product/status/toggle',[ProductController::class,'statusToggle'])->name('product.status.toggle');
    Route::get('product/additional/image/delete/{id}',[ProductController::class,'additionalImageDelete'])->name('product.additional.image.delete');
    Route::resource('product',ProductController::class);
});
