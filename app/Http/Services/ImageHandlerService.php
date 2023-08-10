<?php

namespace App\Http\Services;

use App\Models\Product;

class ImageHandlerService
{
    public static function handleImage($request, $existingImage = null)
    {
        if ($request->file('image')) {
            if ($existingImage && file_exists($existingImage)) {
                unlink($existingImage);
            }
            return Product::getImage($request);
        }
        return $existingImage;
    }
}
