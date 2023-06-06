<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getDisplayStatusAttribute(): string
    {
        $status = $this->status;

        return match ($status) {
            0 => "<p class='badge badge-danger rounded-pill m-0'>Deactive</p>",
            default => "<p class='badge badge-info rounded-pill m-0'>Active</p>",
        };
    }
}
