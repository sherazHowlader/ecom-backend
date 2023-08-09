<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use HasFactory;
    protected $guarded = ['id'];

    public static function getImage($request): string
    {
        $image = $request->file('image');
        $imageExtension = uniqid().'.'.$image->getClientOriginalExtension();
        $uploadPath = 'images/product-images/';
        $image->move($uploadPath,$imageExtension);

        return $uploadPath.$imageExtension;
    }

    public function categorie(){
        return $this->belongsTo(Category::class,'category_id');;
    }

    public function subcategorie(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');;
    }

    public function manufacture(){
        return $this->belongsTo(Manufacture::class);;
    }

    public function additionalImages(){
        return $this->hasMany(ProductImages::class,'product_id');;
    }

    public function getDisplayStatusAttribute(): string
    {
        $status = $this->status;

        return match ($status) {
            0 => "<p class='badge badge-danger rounded-pill m-0'>Deactive</p>",
            default => "<p class='badge badge-info rounded-pill m-0'>Active</p>",
        };
    }
}
