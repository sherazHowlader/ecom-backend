<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::updateOrCreate([
            'category_id' => 1,
            'name' => 'Nokia',
            'slug' => 'nokia',
        ]);

        Subcategory::updateOrCreate([
            'category_id' => 1,
            'name' => 'Iphone',
            'slug' => 'iphone',
        ]);

        Subcategory::updateOrCreate([
            'category_id' => 1,
            'name' => 'Xiaomi',
            'slug' => 'siaomi',
        ]);

        Subcategory::updateOrCreate([
            'category_id' => 3,
            'name' => 'Mini Speaker',
            'slug' => 'mini-mini',
        ]);

        Subcategory::updateOrCreate([
            'category_id' => 4,
            'name' => 'Pocket Camera',
            'slug' => 'pocket-camera',
        ]);
    }
}
