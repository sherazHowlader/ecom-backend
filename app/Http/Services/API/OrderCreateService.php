<?php

namespace App\Http\Services\API;

use App\Models\Order;

class OrderCreateService
{
    public static function create($request, $shipping, $payment)
    {
        return Order::create([
            'customer_id' => 1,
            'shipping_id' => $shipping->id,
            'payment_id'  => $payment->id,
            'subtotal'    => $request->subtotal,
            'total'       => $request->subtotal - ($request->subtotal * $request->discount / 100),
            'discount'    => $request->discount ?? null,
            'status'      => 'pending',
        ]);
    }
}
