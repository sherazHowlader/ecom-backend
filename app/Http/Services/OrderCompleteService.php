<?php

namespace App\Http\Services;

use App\Models\Order;

class OrderCompleteService
{
    public static function completed($id): void
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'complete'
        ]);
    }
}
