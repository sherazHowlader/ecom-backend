<?php

namespace App\Http\Services\API;

use App\Models\OrderDetails;

class OrderDetailsCreateService
{
    public static function create($cart, $order): void
    {
        OrderDetails::create([
            'order_id'      => $order->id,
            'product_id'    => $cart['product_id'],
            'SKU'           => $cart['SKU'],
            'quantity'      => $cart['quantity'],
        ]);
    }
}
