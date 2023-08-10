<?php

namespace App\Http\Services\API;


use App\Models\Product;

class CategoryProductsService
{
    public static function getProducts($category): \Illuminate\Database\Eloquent\Collection|array
    {
        return Product::with('categorie', 'subcategorie', 'additionalImages')
            ->where('category_id', $category->id)
            ->where('status', true)
            ->get();
    }
}
