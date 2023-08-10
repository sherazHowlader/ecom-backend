<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    // use HasFactory;
    protected $guarded = ['id'];

    public function getProductPriceAttribute(){
        if($this->discount_price){
            return $this->discount_price;
        }else{
            return $this->regular_price;
        }
    }
}
