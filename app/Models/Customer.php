<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' '. $this->last_name;
    }
}
