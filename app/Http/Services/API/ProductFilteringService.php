<?php

namespace App\Http\Services\API;

use App\Models\ProductVariants;

class ProductFilteringService
{
    public static function getProduct($product): array
    {
        $product->image = url($product->image);
        $product['category_name'] = $product['categorie']['name'];
        $product['subcategory_name'] = $product['subcategorie']['name'];

        $product_variant = ProductVariants::where('SKU', $product->SKU)->first();
        $product['variant'] = $product_variant->size;

        $product['other_images'] = $product->additionalImages->pluck('image');
        $product['other_images']->transform(function ($image) {
            return asset($image);
        });

        return collect($product)
            ->except('category_id', 'subcategory_id', 'manufacture_id', 'created_at', 'updated_at', 'status', 'categorie', 'subcategorie', 'additional_images')
            ->toArray();
    }
}
