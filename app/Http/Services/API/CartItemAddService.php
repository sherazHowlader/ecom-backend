<?php

namespace App\Http\Services\API;

use App\Models\Carts;

class CartItemAddService
{
    public static function add($request, $product)
    {
        return Carts::create([
            'user_id'       => md5($_SERVER['REMOTE_ADDR']),
            'product_id'    => $product->id,
            'SKU'           => $request->product['SKU'],
            'quantity'      => $request->quantity ?? 1,
        ]);
    }
}
