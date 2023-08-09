<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\OrderCompleteService;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::withCount('details')->get();
        return view('order.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        return view('order.details', compact('order'));
    }

    public function orderComplete($id): RedirectResponse
    {
        OrderCompleteService::completed($id);
        return redirect()->back();
    }
}
