<?php

namespace App\Http\Services\API;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductBySlugService
{
    public static function getProduct($slug): Model
    {
        return Product::with('categorie', 'subcategorie', 'additionalImages')
            ->where('slug', $slug)
            ->first();
    }
}
