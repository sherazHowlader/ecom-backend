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
    return view('welcome');
});

//Route::get('/{any}', function () {
//    return view('welcome');
//})->where('any', '.*');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('category/status/toggle',[CategoryController::class,'statusToggle'])->name('category.status.toggle');
Route::resource('category',CategoryController::class);

Route::get('subcategory/status/toggle',[SubcategoryController::class,'statusToggle'])->name('subcategory.status.toggle');
Route::resource('subcategory',SubcategoryController::class);

Route::get('product/status/toggle',[ProductController::class,'statusToggle'])->name('product.status.toggle');
Route::resource('product',ProductController::class);
