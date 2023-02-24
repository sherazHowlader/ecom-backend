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

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);;
    }
}
