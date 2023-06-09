<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\ProductVariants;
use App\Models\Carts;
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
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $products = Product::all();
        return view('product.form' , compact('categories','subcategories','products'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
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

        // Add additional image
        if (isset($request->additional_image)){
            ProductImages::addImages($product->id, $request->additional_image);
        }

        toast('Product added success','success');
        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('product.edit', compact('categories','subcategories','product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->file('image')) {
            file_exists($product->image) && unlink($product->image);
            $image = Product::getImage($request);
        } else {
            $image = $product->image;
        }

        $product->update([
            'category_id'     => $request->category_id,
            'subcategory_id'  => $request->subcategory_id,
            'name'         => $request->name,
            'slug'         => Str::slug($request->name),
            'SKU'          => $request->sku,
            'image'        => $image,
            'short_description'     => $request->short_description,
            'description'           => $request->description,
            'regular_price'         => $request->regular_price,
            'discount_price'        => $request->discount_price,
        ]);

        // Add additional image
        if (isset($request->additional_image)){
            ProductImages::addImages($product->id, $request->additional_image);
        }

        toast('Product update success','success');
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        if (file_exists($product->image))
        {
            unlink($product->image);
            ProductImages::unlinkImages($product->id);
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

    public function additionalImageDelete($id)
    {
        $additionImage = ProductImages::findOrFail($id);

        if (file_exists($additionImage->image))
        {
            unlink($additionImage->image);
        }
        $additionImage->delete();

        toast('Product additional image delete success','success');
        return response()->json($additionImage);
    }





//===========================API Start==========================================
    public function getAllProduct()
    {
        $products = Product::with('categorie', 'subcategorie', 'additionalImages')
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
    }

    public function getProductBySlug($slug)
    {
        $products = Product::with('categorie', 'subcategorie', 'additionalImages')
            ->where('slug', $slug)
            ->first();

        $products->image = url($products->image);
        $products->category_name = $products->categorie->name;
        $products->subcategory_name = $products->subcategorie->name;

        unset($products->categorie); // Remove the "categorie" relation from the response

        unset($products->subcategorie); // Remove the "subcategorie" relation from the response

        $additionalImages = $products->additionalImages->pluck('image')->map(function ($image) {
            return url($image); // Generate full URL for each additional image
        });

        $products->otherImages = $additionalImages; // Replace additionalImages with the URLs
        unset($products->additionalImages); // Remove the "subcategorie" relation from the response

        unset($products->created_at); // Remove the "created_at" field from the response
        unset($products->updated_at); // Remove the "updated_at" field from the response
        unset($products->category_id); // Remove the "category_id" field from the response
        unset($products->subcategory_id); // Remove the "subcategory_id" field from the response
        unset($products->status); // Remove the "status" field from the response

        return response()->json($products);
    }

    public function coupon(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        return $cpn = Coupon::where('name', $request->name)
            ->where('status', true)
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
