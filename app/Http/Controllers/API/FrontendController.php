<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use App\Models\Product;

class FrontendController
{
    public function getCategories()
    {
        $categories = Category::with('subcategorie')->where('status', true)->get();
        return response()->json($categories);
    }

//    public function categoryWiseProduct($slug)
//    {
//        $categories = Category::with('products','products.categorie')->where('slug', $slug)->get();
//
//        $categories->transform(function ($category) {
//            $category->products->transform(function ($product) {
//                $product->image = url($product->image);
//                return $product;
//            });
//            return $category;
//        });
//
//        return response()->json($categories);
//    }

    public function categoryWiseProduct($slug)
    {
        $category = Category::where('slug', $slug)->where('status', true)->first();

        if ($category) {
            $products = Product::with('categorie', 'subcategorie', 'additionalImages')
                ->where('category_id', $category->id)
                ->where('status', true)
                ->get();

            $products->transform(function ($product) {
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

            return response()->json($products);
        } else {
            return response()->json(['error' => 'Category not found'], 404);
        }

    }
}
