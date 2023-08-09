<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Services\AdditionalImagesService;
use App\Http\Services\ImageHandlerService;
use App\Http\Services\ProductDeleteService;
use App\Http\Services\ProductStoreService;
use App\Http\Services\ProductUpdateService;
use App\Http\Services\TogglerService;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Subcategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $products = Product::all();
        return view('product.form', compact('categories', 'subcategories', 'products'));
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = ProductStoreService::store($request);
        if (isset($request->additional_image)) {
            ProductImages::addImages($product->id, $request->additional_image);
        }
        toast('Product added success', 'success');
        return redirect()->route('product.index');
    }

    public function edit(Product $product): View
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('product.edit', compact('categories', 'subcategories', 'product'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $image = ImageHandlerService::handleImage($request, $product->image);
        ProductUpdateService::update($request, $product, $image);

        if (isset($request->additional_image)) {
            ProductImages::addImages($product->id, $request->additional_image);
        }
        toast('Product update success', 'success');
        return redirect()->route('product.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        ProductDeleteService::delete($product);
        toast('Product delete success', 'success');
        return redirect()->route('product.index');
    }

    public function statusToggle(Request $request): JsonResponse
    {
        $product = Product::findOrFail($request->product);
        TogglerService::toggle($request, $product);
        toast('Product status change success', 'success');
        return response()->json($product);
    }

    public function additionalImageDelete($id): JsonResponse
    {
        AdditionalImagesService::deleted($id);
        toast('Product additional image delete success', 'success');
        return response()->json(['status', 200]);
    }
}
