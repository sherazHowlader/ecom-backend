<?php

namespace App\Http\Controllers\API;

use App\Http\Services\API\CategoryProductsService;
use App\Http\Services\API\ProductTransformService;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController
{
    public function getCategories(): JsonResponse
    {
        $categories = Category::with('subcategorie')->where('status', true)->get();
        return response()->json($categories);
    }

    public function categoryWiseProduct($slug): JsonResponse
    {
        $category = Category::where('slug', $slug)->where('status', true)->first();

        if ($category) {
            $products = CategoryProductsService::getProducts($category);
            ProductTransformService::getProducts($products);
            return response()->json($products);
        } else {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }
}
