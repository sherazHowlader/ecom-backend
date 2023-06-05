<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Coupon;
use App\Models\Product;

use Illuminate\Http\Request;

class cartController extends Controller
{
    private $sku, $ProVariant, $RegPrice, $DisPrice;

    public function getAllCarts()
    {
        $carts = Carts::with('products.categorie')->get();

        $carts->transform(function ($cart) {
            $cart->products->image = url($cart->products->image);

            $cart->products->category_name = $cart->products->categorie->name;
            unset($cart->products->categorie);

            $cart = collect($cart)
            ->except(['user_id', 'created_at', 'updated_at'])
            ->toArray();

            $cart['products'] = collect($cart['products'])
            ->only(['id','name','slug','SKU','image','category_name','regular_price','discount_price'])
            ->toArray();

            return $cart;
        });

        return response()->json($carts);
    }

    public function addCartItem(Request $request)
    {
        $this->sku          = $request->variant ? $request->variant['SKU'] : $request->product['SKU'];
        $this->ProVariant   = $request->variant ? $request->variant['size'] : "Default";
        $this->RegPrice     = $request->variant ? $request->variant['regular_price'] : $request->product['regular_price'];
        $this->DisPrice     = $request->variant ? $request->variant['discount_price'] : $request->product['discount_price'];

        $product = Product::where('id', $request->product['id'])->first();

        // Cart a jodi already itme thake tahole increment korbe
        // R na thakle item create korbe
        $checkCartItem = Carts::where('SKU', $this->sku)->first();

        if ($checkCartItem) {
            Carts::where('SKU', $this->sku)
                ->increment('quantity', $request->qty);
        } else {
            return Carts::create([
                'user_id'           => md5($_SERVER['REMOTE_ADDR']),
                'product_id'        => $product->id,
                'product_variant'   => $this->ProVariant,
                'name'              => $product['name'],
                'regular_price'     => $this->RegPrice,
                'discount_price'    => $this->DisPrice ? $this->DisPrice : "",
                'quantity'          => $request->qty,
                'SKU'               => $this->sku,
            ]);
        }
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
