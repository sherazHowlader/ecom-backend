<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Coupon;
use App\Models\Product;

use Illuminate\Http\Request;

class CartController extends Controller
{
    private $sku, $ProVariant, $RegPrice, $DisPrice;

    public function getAllCarts()
    {
        $carts = Carts::with('products.categorie')->get();

        $carts->transform(function ($cart) {
            $cartData = $cart->toArray();

            $relativeImagePath = $cartData['products']['image'];
            $cartData['products']['image'] = asset($relativeImagePath);

            $cartData['category_name'] = $cartData['products']['categorie']['name'];

            unset($cartData['products']['categorie']);
            $cartData = array_merge($cartData, $cartData['products']);
            unset($cartData['products']);
            unset($cartData['category_id']);
            unset($cartData['subcategory_id']);
            unset($cartData['status']);
            unset($cartData['created_at']);
            unset($cartData['updated_at']);
            unset($cartData['user_id']);
            unset($cartData['product_id']);
            unset($cartData['id']);
            unset($cartData['short_description']);
            unset($cartData['description']);

            return $cartData;
        });

        return response()->json($carts);
    }

    public function addCartItem(Request $request)
    {
//        return response()->json(['status', $request->all()]);

        $product = Product::findOrFail($request->product_id);

        // Cart a jodi already item thake tahole increment korbe
        // R na thakle item create korbe
        $checkCartItem = Carts::where('SKU', $product->SKU)->first();

        if ($checkCartItem) {
            Carts::where('SKU', $product->SKU)
                ->increment('quantity', $request->quantity ?? 1);
        } else {
            return Carts::create([
                'user_id'           => md5($_SERVER['REMOTE_ADDR']),
                'product_id'        => $product->id,
                'product_variant'   => $request->product_variant ?? 'Default',
                'name'              => $product->name,
                'regular_price'     => $product->regular_price,
                'discount_price'    => $product->discount_price ?? '',
                'quantity'          => $request->quantity ?? 1,
                'SKU'               => $product->SKU,
            ]);
        }

        return response()->json(['status', $product]);
    }

    public function cartInc($SKU)
    {
        Carts::where('SKU', $SKU)
            ->increment('quantity', 1);
    }

    public function cartDec($SKU)
    {
        Carts::where('SKU', $SKU)
            ->decrement('quantity', 1);
    }

    public function removeCartItem($SKU)
    {
        Carts::where('SKU', $SKU)->delete();
    }
}
