<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
}



