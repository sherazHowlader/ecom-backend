<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function orders(){
        return $this->hasMany(Order::class);;
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' '. $this->last_name;
    }
}
