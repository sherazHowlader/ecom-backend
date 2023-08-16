<?php

namespace App\Http\Controllers\API;

use App\Http\Services\API\ActiveProductService;
use App\Http\Services\API\ProductBySlugService;
use App\Http\Services\API\ProductFilteringService;
use App\Http\Services\API\ProductTransformService;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductVariants;
use Illuminate\Http\JsonResponse;

class ProductController
{
    public function getProducts(): JsonResponse
    {
        $products = ActiveProductService::getProducts();
        ProductTransformService::getProducts($products);
        return response()->json($products);
    }

    public function getProductBySlug($slug): JsonResponse
    {
        $product = ProductBySlugService::getProduct($slug);
        $products = ProductFilteringService::getProduct($product);
        return response()->json($products);
    }

    public function productImages($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return ProductImages::where('product_id', $product->id)->get();
    }

    public function productVariant($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return ProductVariants::where('product_id', $product->id)->orderBy('size')->get();
    }
}
