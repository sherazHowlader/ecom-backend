<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::updateOrCreate([
            'name' => 'Mobile Phones',
            'slug' => 'mobile-phones',
        ]);

        Category::updateOrCreate([
            'name' => 'Watches',
            'slug' => 'watches',
        ]);

        Category::updateOrCreate([
            'name' => 'Bluetooth Speaker',
            'slug' => 'bluetooth-speaker',
        ]);

        Category::updateOrCreate([
            'name' => 'Camera',
            'slug' => 'camera',
        ]);
    }
}
