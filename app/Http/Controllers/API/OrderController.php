<?php

namespace App\Http\Controllers\API;

use App\Http\Services\API\CartClearService;
use App\Http\Services\API\OrderCreateService;
use App\Http\Services\API\OrderDetailsCreateService;
use App\Http\Services\API\PaymentCreateService;
use App\Http\Services\API\ShippingCreateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController
{
    public function placeOrder(Request $request): JsonResponse
    {
        $shipping   = ShippingCreateService::create($request);
        $payment    = PaymentCreateService::create($request);
        $order      = OrderCreateService::create($request, $shipping, $payment);
        foreach ($request->carts as $cart) {
            OrderDetailsCreateService::create($cart, $order);
        }
        CartClearService::clear();
        return response()->json(['status' => 'Order Places Success']);
    }
}
