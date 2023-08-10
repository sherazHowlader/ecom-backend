<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Return_;

class ProductStoreService
{
    public static function store($request)
    {
        Return Product::create([
            'category_id'     => $request->category_id,
            'subcategory_id'  => $request->subcategory_id,
            'name'         => $request->name,
            'slug'         => Str::slug($request->name),
            'SKU'          => $request->sku,
            'image'        => Product::getImage($request),
            'short_description'     => $request->short_description,
            'long_description'      => $request->long_description,
            'regular_price'         => $request->regular_price,
            'discount_price'        => $request->discount_price,
        ]);
    }
}
