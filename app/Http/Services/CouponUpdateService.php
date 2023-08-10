<?php

namespace App\Http\Services;

class CouponUpdateService
{
    public static function update($request, $coupon): void
    {
        $coupon->update([
            'name'      => $request->coupon_name,
            'discount'  => $request->discount,
        ]);
    }
}
