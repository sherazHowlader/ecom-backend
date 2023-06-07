<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function shipping(){
        return $this->belongsTo(Shipping::class);;
    }

    public function orders(){
        return $this->hasMany(OrderDetails::class);;
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');;
    }

    public function getDisplayStatusAttribute(): string
    {
        $status = $this->status;

        return match ($status) {
            'complete' => "<p class='badge badge-success rounded-pill m-0'>Complete</p>",
            'process'  => "<p class='badge badge-info rounded-pill m-0'>Process</p>",
            'cancel'  => "<p class='badge badge-danger rounded-pill m-0'>Cancel</p>",
            default    => "<p class='badge badge-warning rounded-pill m-0'>Pending</p>",
        };
    }
}
