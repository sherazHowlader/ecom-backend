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
        // Categorie
        Categorie::updateOrCreate([
            'name' => 'Phones',
            'slug' => 'phones',
        ]);

        Categorie::updateOrCreate([
            'name' => 'Watches',
            'slug' => 'watches',
        ]);

        Categorie::updateOrCreate([
            'name' => 'Speaker',
            'slug' => 'speaker',
        ]);

        Categorie::updateOrCreate([
            'name' => 'Camera',
            'slug' => 'camera',
        ]);


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
            'categorie_id' => '2',
            'name' => 'Xiaomi Mi Band 5',
            'slug' => 'mi-band',
            'SKU' => '259407923_BD-1213130033',
            'image' => 'product-1.jpg',
            'regular_price' => '2100',
            'discount_price' => '2000',
            'SKU' => '229711895_BD-1173279422',
            'short_description' => 'Xiaomi Mi Band 5 short_description short_description',
            'description' => 'Vegetables are parts of plants that are consumed by humans or other animals as food.',
            'status' => true,
        ]);

        Product::updateOrCreate([
            'categorie_id' => '3',
            'name' => 'Big Power Sound Speaker',
            'slug' => 'box',
            'SKU' => '259407923_BD-1213130033',
            'image' => 'product-2.jpg',
            'regular_price' => '250',
            'SKU' => '229711895_BD-1173279424',
            'short_description' => 'Big Power Sound Speaker short_description short_description',
            'description' => 'Pokio is the first real money native mobile poker app.',
            'status' => true,
        ]);

        Product::updateOrCreate([
            'categorie_id' => '4',
            'name' => 'WiFi Security Camera',
            'slug' => 'camera',
            'SKU' => '259407923_BD-1213130033',
            'image' => 'product-3.jpg',
            'regular_price' => '500',
            'discount_price' => '400',
            'SKU' => '229711895_BD-1173279425',
            'short_description' => 'WiFi Security Camera short_description short_description',
            'description' => 'A hamburger, or simply burger, is a food consisting of fillings—usually a patty of ground meat, typically beef—placed inside a sliced bun or bread roll.',
            'status' => true,
        ]);

        Product::updateOrCreate([
            'categorie_id' => '1',
            'name' => 'iphone 6x plus',
            'slug' => 'iphone',
            'SKU' => '259407923_BD-1213130033',
            'image' => 'product-4.jpg',
            'regular_price' => '420',
            'SKU' => '229711895_BD-1173279426',
            'short_description' => 'iphone 6x plus short_description short_description',
            'description' => 'A frog mug (also known as a toad mug, surprise mug or ague mug) is a type of ceramic vessel mainly used for drinking beer or similar alcoholic beverages.',
            'status' => true,
        ]);
    }
}
