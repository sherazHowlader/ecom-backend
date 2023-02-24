<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    // use HasFactory;
    protected $guarded = ['id'];

    // public function category(){
    //     return $this->belongsTo(Categorie::class);;
    // }

    public function products(){
        return $this->hasMany(Product::class);;
    }
}
