<?php

namespace App\Http\Services\API;

use App\Models\Carts;

class CartClearService
{
    public static function clear(): void
    {
        Carts::where('user_id', md5($_SERVER['REMOTE_ADDR']))->delete();
    }
}
