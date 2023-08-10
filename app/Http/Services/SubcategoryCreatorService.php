<?php

namespace App\Http\Services;

use App\Models\Subcategory;
use Illuminate\Support\Str;

class SubcategoryCreatorService
{
    public static function create($request): void
    {
        Subcategory::create([
            'category_id' => $request->category_id,
            'name'        => $request->subcategory_name,
            'slug'        => Str::slug($request->subcategory_name),
        ]);
    }
}
