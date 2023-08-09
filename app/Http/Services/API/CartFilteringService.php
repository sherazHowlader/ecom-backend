<?php

namespace App\Http\Services\API;

use App\Models\ProductVariants;

class CartFilteringService
{
    public static function getCartProducts($carts)
    {
        $carts->transform(function ($cart) {
            $cart_data = $cart->toArray();

            $product_image = $cart_data['products']['image'];
            $cart_data['products']['image'] = asset($product_image);

            // add category_name attribute inside cart
            $cart_data['category_name'] = $cart_data['products']['categorie']['name'];

            $cart_data['name'] = $cart_data['products']['name'];
            $cart_data['slug'] = $cart_data['products']['slug'];
            $cart_data['image'] = asset($cart_data['products']['image']);

            $product_variant = ProductVariants::where('SKU', $cart->SKU)->first();
            $cart_data['regular_price'] = $product_variant->regular_price;
            $cart_data['discount_price'] = $product_variant->discount_price;
            $cart_data['variant'] = $product_variant->size;

            return collect($cart_data)
                ->only(['product_id', 'SKU', 'quantity', 'category_name', 'name', 'slug', 'image', 'regular_price', 'discount_price', 'variant'])
                ->toArray();
        });
    }
}
