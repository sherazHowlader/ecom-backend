<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::updateOrCreate([
            'invoice_id'    => 123456,
            'customer_id'   => 1,
            'shipping_id'   => 1,
            'payment_type' => 'Bkash',
            'bkashNumber'   => '01723085220',
            'trxId' => '15wTsX69',
            'total' => 2600,
            'discount' => 10,
            'subtotal' => 2340,
        ]);

        OrderDetails::updateOrCreate([
            'order_id'      => 1,
            'product_id'    => 1,
            'product_price' => 2100,
            'product_qty'   => 1,
        ]);

        OrderDetails::updateOrCreate([
            'order_id'      => 1,
            'product_id'    => 3,
            'product_price' => 500,
            'product_qty'   => 3,
        ]);

        Shipping::updateOrCreate([
            'name'       => 'Shamim',
            'email'      => 'shamim42@gmail.com',
            'phone_number' => '01780309045',
            'address'      => 'shiromoni, khulna, khulna, 9100',
            'state'        => 'khulna',
            'postcode'     => 9100,
        ]);
    }
}
