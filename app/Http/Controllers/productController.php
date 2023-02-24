<?php

namespace App\Http\Controllers;

use App\Models\ProductVariants;
use App\Models\Carts;
use App\Models\Categorie;
use App\Models\Coupon;
use App\Models\Product;

use App\Models\ProductImages;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function getAllProduct()
    {
        $products = Product::join('categories', 'categories.id', '=', 'products.categorie_id')
            ->select('products.*', 'categories.name as category_name')
            ->get();

        return $products;
    }

    public function getProductBySlug($slug)
    {
        $products = Product::join('categories', 'categories.id', '=' , 'products.categorie_id')
            ->select('products.*', 'categories.name as category_name')
            ->where('products.slug', $slug)
            ->first();

        return $products;
    }

    public function coupon(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        return $cpn = Coupon::where('name', $request->name)
            ->where('status', 1)
            ->first();
    }

    public function productImages($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return ProductImages::where('product_id', $product->id)->get();
    }

    public function productVariant($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return ProductVariants::where('product_id', $product->id)->orderBy('size')->get();
    }
}
