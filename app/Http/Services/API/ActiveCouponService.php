<?php

namespace App\Http\Services\API;

use App\Models\Coupon;

class ActiveCouponService
{
    public static function getCoupon($request)
    {
        return Coupon::where('name', $request->name)
            ->where('status', true)
            ->first();
    }
}
