<?php

namespace Database\Seeders;

use App\Models\ProductVariants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductVariantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductVariants::updateOrCreate([
            'product_id'    => 1,
            'size'          => '5100 mAh',
            'regular_price'  => '5100',
            'discount_price' => '5000',
            'SKU' => '229711895_BD-1173279420',
        ]);

        ProductVariants::updateOrCreate([
            'product_id'    => 1,
            'size'          => '6100 mAh',
            'regular_price' => '6100',
            'discount_price' => '6000',
            'SKU' => '229711895_BD-1173279421',
        ]);

        ProductVariants::updateOrCreate([
            'product_id'    => 1,
            'size'          => '2100 mAh',
            'regular_price'  => '2100',
            'discount_price' => '2000',
            'SKU' => '229711895_BD-1173279422',
        ]);

        ProductVariants::updateOrCreate([
            'product_id'    => 1,
            'size'          => '8000 mAh',
            'regular_price' => '8000',
            'SKU' => '229711895_BD-1173279423',
        ]);

        ProductVariants::updateOrCreate([
            'product_id'    => 2,
            'size'          => '2000 mAh',
            'regular_price' => '2000',
            'discount_price' => '2100',
            'SKU' => '229711895_BD-1173279424',
        ]);
    }
}
