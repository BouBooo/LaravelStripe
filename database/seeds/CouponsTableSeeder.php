<?php

use App\Coupon;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'NEW2020',
            'type' => 'fixed',
            'value' => 30
        ]);

        Coupon::create([
            'code' => 'WINTER',
            'type' => 'percent',
            'percent_off' => 50
        ]);
    }
}
