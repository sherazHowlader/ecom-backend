<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'name'          => 'Md Sheraz Howlader',
            'email'         => 'mdshiraj72@gmail.com',
            'phone_number'  => '01728692643',
            'address'       => '168/3,1/A,Shipahibag, Rampura, Dhaka',
            'password'      => Hash::make('Password')
        ]);
    }
}
