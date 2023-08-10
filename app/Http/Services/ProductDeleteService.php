<?php

namespace App\Http\Services;

use App\Models\ProductImages;

class ProductDeleteService
{
    public static function delete($product)
    {
        if (file_exists($product->image)) {
            unlink($product->image);
            ProductImages::unlinkImages($product->id);
        }
        $product->delete();
    }
}
