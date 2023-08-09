<?php

namespace App\Http\Services\API;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ActiveProductService
{
    public static function getProducts(): Collection
    {
        return Product::with('categorie', 'subcategorie', 'additionalImages')
            ->where('status', true)
            ->get();
    }
}
