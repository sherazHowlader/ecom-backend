<?php

namespace App\Http\Controllers\API;

use App\Models\Carts;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Shipping;
use Illuminate\Http\Request;

class OrderController
{
    public function placeOrder(Request $request)
    {
        $shipping = Shipping::create([
            'first_name' => $request->order['shipping_first_name'],
            'last_name' => $request->order['shipping_last_name'],
            'email' => $request->order['shipping_email'],
            'phone_number' => $request->order['shipping_phone_number'],
            'address' => $request->order['shipping_address'],
            'city' => $request->order['shipping_city'],
            'post_code' => $request->order['shipping_post_code'],
            'country' => $request->order['shipping_country'],
            'state' => $request->order['shipping_state'],
        ]);

        $payment = Payment::create([
            'method' => $request->payment_method ?? 'Hand Cash',
            'trx_id' => $request->trx_id,
            'status' => $request->status ?? 'pending',
            'paid_at' => now(),
        ]);

        $order = Order::create([
            'customer_id' => 1,
            'shipping_id' => $shipping->id,
            'payment_id' => $payment->id,
            'subtotal' => $request->subtotal,
            'total' => $request->subtotal - ($request->subtotal * $request->discount / 100), //subtotal - (subtotal * discount / 100)
            'discount' => $request->discount ?? null,
            'status' => 'pending',
        ]);

        foreach ($request->carts as $cart) {
            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $cart['product_id'],
                'SKU' => $cart['SKU'],
                'quantity' => $cart['quantity'],
            ]);
        }

        Carts::where('user_id', md5($_SERVER['REMOTE_ADDR']))->delete();
        return response()->json(['status' => 'Order Places Success']);
    }
}
