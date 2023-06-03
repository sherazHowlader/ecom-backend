<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','name','slug','status'];

    public function categorie()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getDisplayStatusAttribute()
    {
        $status = $this->status;

        return match ($status) {
            0 => "<p class='badge badge-danger rounded-pill m-0'>Deactive</p>",
            default => "<p class='badge badge-info rounded-pill m-0'>Active</p>",
        };
    }
}
