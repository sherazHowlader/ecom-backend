<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function booted(){
        static::creating(function($order){
            if(empty($order->invoice_id)){
                $order->invoice_id = mt_rand( 1000000000, 9999999999 );
            }
        });
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class);;
    }

    public function details(){
        return $this->hasMany(OrderDetails::class);;
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');;
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');;
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

    public function getHasDiscountAttribute()
    {
        return $this->discount ? $this->discount . '%' : 'N/A';
    }
}
