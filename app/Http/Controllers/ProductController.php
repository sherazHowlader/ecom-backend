<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\ProductVariants;
use App\Models\Carts;
use App\Models\Categorie;
use App\Models\Coupon;
use App\Models\Product;

use App\Models\ProductImages;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Categorie::all();
        $subcategories = Subcategory::all();
        $products = Product::all();
        return view('product.form' , compact('categories','subcategories','products'));
    }

    public function store(StoreProductRequest $request)
    {
        Product::create([
            'category_id'     => $request->category_id,
            'subcategory_id'  => $request->subcategory_id,
            'name'         => $request->name,
            'slug'         => Str::slug($request->name),
            'SKU'          => $request->sku,
            'image'        => Product::getImage($request),
            'short_description'     => $request->short_description,
            'description'           => $request->description,
            'regular_price'         => $request->regular_price,
            'discount_price'        => $request->discount_price,
        ]);

        toast('Subcategory added success','success');
        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        $categories = Categorie::all();
        $subcategories = Subcategory::all();
        return view('product.edit', compact('categories','subcategories','product'));
    }

    public function destroy(Product $product)
    {
        if (file_exists($product->image))
        {
            unlink($product->image);
        }
        $product->delete();

        toast('Product delete success','success');
        return redirect()->route('product.index');
    }

    public function statusToggle(Request $request)
    {
        $product = Product::findOrFail($request->product);

        $product->update([
            'status' => $request->status == true ? false : true,
        ]);
        toast('Product status change success','success');
        return response()->json($product);
    }







//===========================API Start==========================================
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
