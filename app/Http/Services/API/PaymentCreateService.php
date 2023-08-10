<?php

namespace App\Http\Services\API;

use App\Models\Payment;

class PaymentCreateService
{
    public static function create($request)
    {
        return Payment::create([
            'method' => $request->payment_method ?? 'Hand Cash',
            'trx_id' => $request->trx_id,
            'status' => $request->status ?? 'pending',
            'paid_at' => now(),
        ]);
    }
}
