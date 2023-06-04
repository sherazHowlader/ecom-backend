<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    // use HasFactory;
    protected $guarded = ['id'];

    public static function getImage($image)
    {
        $imageExtension = uniqid() . '.' . $image->getClientOriginalExtension();
        $uploadPath = 'images/product-other-images/';
        $image->move($uploadPath, $imageExtension);

        return $uploadPath . $imageExtension;
    }

    public static function addImages($product_id, $additional_image)
    {
        foreach ($additional_image as $image) {
            self::create([
                'product_id' => $product_id,
                'image'      => self::getImage($image),
            ]);
        }
    }

    public static function unlinkImages($id)
    {
        $additionalImage = ProductImages::where('product_id', $id)->get();
        foreach ($additionalImage as $image)
        {
            if (file_exists($image->image))
            {
                unlink($image->image);
            }
        }
    }
}
