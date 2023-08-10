<?php

namespace App\Http\Services\API;

class ProductTransformService
{
    public static function getProducts($products)
    {
        return $products->transform(function ($product) {
            $product->image = url($product->image); // Generate full URL for the main image

            $product->category_name = $product->categorie->name; // Add the category name to the product object
            unset($product->categorie); // Remove the "categorie" relation from the response

            $product->subcategory_name = $product->subcategorie->name; // Add the subcategory name to the product object
            unset($product->subcategorie); // Remove the "subcategorie" relation from the response

            $additionalImages = $product->additionalImages->pluck('image')->map(function ($image) {
                return url($image); // Generate full URL for each additional image
            });

            $product->otherImages = $additionalImages; // Replace additionalImages with the URLs
            unset($product->additionalImages); // Remove the "subcategorie" relation from the response

            unset($product->created_at); // Remove the "created_at" field from the response
            unset($product->updated_at); // Remove the "updated_at" field from the response
            unset($product->category_id); // Remove the "category_id" field from the response
            unset($product->subcategory_id); // Remove the "subcategory_id" field from the response
            unset($product->status); // Remove the "status" field from the response

            return $product;
        });
    }
}
