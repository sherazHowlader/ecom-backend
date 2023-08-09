<?php

namespace App\Http\Controllers\API;

use App\Http\Services\API\ActiveCouponService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CouponController
{
    public function coupon(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required'
        ]);
        $coupon = ActiveCouponService::getCoupon($request);
        return response()->json($coupon);
    }
}
