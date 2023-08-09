<?php

namespace App\Http\Services;

use Illuminate\Support\Str;

class ProductUpdateService
{
    public static function update($request, $product, $image): void
    {
        $product->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'SKU' => $request->sku,
            'image' => $image,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'regular_price' => $request->regular_price,
            'discount_price' => $request->discount_price,
        ]);
    }
}
