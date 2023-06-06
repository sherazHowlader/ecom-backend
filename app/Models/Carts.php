<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Carts extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
        // modified to specify the correct foreign key and local key for the relationship.
        // Assuming the Carts model has a foreign key named product_id referencing the id column of the Product model
    }

}
