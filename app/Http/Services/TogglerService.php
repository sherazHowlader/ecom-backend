<?php

namespace App\Http\Services;

class TogglerService
{
    public static function toggle($request, $model): void
    {
        $model->update([
            'status' => !($request->status == true),
        ]);
    }
}
