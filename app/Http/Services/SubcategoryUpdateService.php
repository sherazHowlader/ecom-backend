<?php

namespace App\Http\Services;

use Illuminate\Support\Str;

class SubcategoryUpdateService
{
    public static function update($request, $subcategory)
    {
        $subcategory->update([
            'category_id'   => $request->category_id,
            'name'          => $request->category_name,
            'slug'          => Str::slug($request->category_name),
        ]);
    }
}
