<?php

namespace App\Http\Services\API;

use App\Models\Carts;

class CartIncrementService
{
    public static function inc($request)
    {
        Carts::where('SKU', $request->product['SKU'])->increment('quantity', $request->quantity ?? 1);
    }
}
