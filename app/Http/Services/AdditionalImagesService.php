<?php

namespace App\Http\Services;

use App\Models\ProductImages;

class AdditionalImagesService
{
    public static function deleted($id): void
    {
        $additionImage = ProductImages::findOrFail($id);

        if (file_exists($additionImage->image)) {
            unlink($additionImage->image);
        }
        $additionImage->delete();
    }
}
