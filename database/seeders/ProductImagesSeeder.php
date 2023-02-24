<?php

namespace Database\Seeders;

use App\Models\ProductImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImages::updateOrCreate([
            'product_id' => 1,
            'image'      => '/frontend/images/product-details/01.jpg',
        ]);

        ProductImages::updateOrCreate([
            'product_id' => 1,
            'image'      => '/frontend/images/product-details/02.jpg',
        ]);

        ProductImages::updateOrCreate([
            'product_id' => 1,
            'image'      => '/frontend/images/product-details/03.jpg',
        ]);

        ProductImages::updateOrCreate([
            'product_id' => 1,
            'image'      => '/frontend/images/product-details/04.jpg',
        ]);

        ProductImages::updateOrCreate([
            'product_id' => 1,
            'image'      => '/frontend/images/product-details/05.jpg',
        ]);


        ProductImages::updateOrCreate([
            'product_id' => 4,
            'image'      => '/frontend/images/product-details/06.jpg',
        ]);
        ProductImages::updateOrCreate([
            'product_id' => 4,
            'image'      => '/frontend/images/product-details/07.jpg',
        ]);
        ProductImages::updateOrCreate([
            'product_id' => 4,
            'image'      => '/frontend/images/product-details/08.jpg',
        ]);

        ProductImages::updateOrCreate([
            'product_id' => 3,
            'image'      => '/frontend/images/product-details/09.jpg',
        ]);
        ProductImages::updateOrCreate([
            'product_id' => 3,
            'image'      => '/frontend/images/product-details/10.jpg',
        ]);
    }
}
