<?php

namespace App\Http\Services;

use App\Models\Coupon;

class CouponCreateService
{
    public static function create($request): void
    {
        Coupon::create([
            'name'     => $request->coupon_name,
            'discount' => $request->discount,
        ]);
    }
}
