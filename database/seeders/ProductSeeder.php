<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Coupon;
use App\Models\Manufacture;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Manufactures
        Manufacture::updateOrCreate([
            'name' => 'Ma Babar Doa',
            'slug' => 'ma-babar-doa',
        ]);

        Manufacture::updateOrCreate([
            'name' => 'Chasi Alam',
            'slug' => 'chasi-alam',
        ]);

        // Coupon
        Coupon::updateOrCreate([
            'name' => '2022',
            'discount' => '10',
            'status' => true,
        ]);

        Coupon::updateOrCreate([
            'name' => 'new-member',
            'discount' => '2',
            'status' => true,
        ]);

        // Product
        Product::updateOrCreate([
            'category_id' => 1,
            'subcategory_id' => 3,
            'name' => 'Xiaomi Mi Band 5',
            'slug' => 'mi-band',
            'SKU' => '259407923_BD-1213130031',
            'regular_price' => '2100',
            'discount_price' => '2000',
            'short_description' => 'Xiaomi Mi Band 5 short_description short_description',
            'long_description' => 'Vegetables are parts of plants that are consumed by humans or other animals as food.',
            'status' => true,
        ]);

        Product::updateOrCreate([
            'category_id' => 3,
            'subcategory_id' => 4,
            'name' => 'Big Power Sound Speaker',
            'slug' => 'box',
            'SKU' => '259407923_BD-1213130032',
            'regular_price' => '250',
            'short_description' => 'Big Power Sound Speaker short_description short_description',
            'long_description' => 'Pokio is the first real money native mobile poker app.',
            'status' => true,
        ]);

        Product::updateOrCreate([
            'category_id' => 4,
            'subcategory_id' => 5,
            'name' => 'WiFi Security Camera',
            'slug' => 'camera',
            'SKU' => '259407923_BD-1213130033',
            'regular_price' => '500',
            'discount_price' => '400',
            'short_description' => 'WiFi Security Camera short_description short_description',
            'long_description' => 'A hamburger, or simply burger, is a food consisting of fillings—usually a patty of ground meat, typically beef—placed inside a sliced bun or bread roll.',
            'status' => true,
        ]);

        Product::updateOrCreate([
            'category_id' => 1,
            'subcategory_id' => 2,
            'name' => 'iphone 6x plus',
            'slug' => 'iphone',
            'SKU' => '259407923_BD-1213130034',
            'regular_price' => '420',
            'short_description' => 'iphone 6x plus short_description short_description',
            'long_description' => 'A frog mug (also known as a toad mug, surprise mug or ague mug) is a type of ceramic vessel mainly used for drinking beer or similar alcoholic beverages.',
            'status' => true,
        ]);
    }
}
