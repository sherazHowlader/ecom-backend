<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('order.details', compact('order'));
    }

    public function orderComplete($id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'complete'
        ]);
        return redirect()->back();
    }

//    ======================API=============================
    public function placeOrder(Request $request)
    {
       $customer =  Customer::create([
            'user_id'       => auth()->id(),
            'first_name'    => $request->customer_first_name,
            'last_name'     => $request->customer_last_name,
            'email'         => $request->customer_email,
            'phone_number'  => $request->customer_phone_number,
            'address'       => $request->customer_address,
            'city'          => $request->customer_city,
            'post_code'     => $request->customer_post_code,
            'country'       => $request->customer_country,
            'state'         => $request->customer_state,
        ]);

        $shipping = Shipping::create([
            'first_name'    => $request->customer_first_name,
            'last_name'     => $request->customer_last_name,
            'email'         => $request->customer_email,
            'phone_number'  => $request->customer_phone_number,
            'address'       => $request->customer_address,
            'city'          => $request->customer_city,
            'post_code'     => $request->customer_post_code,
            'country'       => $request->customer_country,
            'state'         => $request->customer_state,
        ]);

        Order::create([
            'invoice_id'    => time(),
            'customer_id'   => $customer->id,
            'shipping_id'   => $shipping->id,
            'payment_type'  => 'Direct',
            'bkashNumber'   => '01712345678',
            'trxId'         => '125GyT5',
            'total'         => 1,
            'subtotal'      => 1,
            'discount'      => 0,
        ]);

        return response()->json(['status' => 'Order Places Success']);
    }

}



