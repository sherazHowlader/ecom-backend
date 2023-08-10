<?php

namespace App\Http\Services\API;

use App\Models\Shipping;

class ShippingCreateService
{
    public static function create($request)
    {
        return Shipping::create([
            'first_name'    => $request->order['shipping_first_name'],
            'last_name'     => $request->order['shipping_last_name'],
            'email'         => $request->order['shipping_email'],
            'phone_number'  => $request->order['shipping_phone_number'],
            'address'       => $request->order['shipping_address'],
            'city'          => $request->order['shipping_city'],
            'post_code'     => $request->order['shipping_post_code'],
            'country'       => $request->order['shipping_country'],
            'state'         => $request->order['shipping_state'],
        ]);
    }
}
