<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Uniform;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::Create([
            'user_id' => 1,
            'quantity' => 1,
            'payment_status' => 0,
            'shipping_status' => 0,
            'order_date' => date('Y-m-d'),
            'remarks_column' => 'ユーザー1 がユニフォームAを1枚購入',
            'uniform_id' => 1,
        ]);

        Order::Create([
            'user_id' => 2,
            'quantity' => 2,
            'payment_status' => 0,
            'shipping_status' => 0,
            'order_date' => date('Y-m-d'),
            'remarks_column' => 'ユーザー2 がユニフォームBを2枚購入',
            'uniform_id' => 2,
        ]);

        Order::Create([
            'user_id' => 3,
            'quantity' => 3,
            'payment_status' => 0,
            'shipping_status' => 0,
            'order_date' => date('Y-m-d'),
            'remarks_column' => 'ユーザー3 がユニフォームCを3枚購入',
            'uniform_id' => 3,
        ]);

        Order::Create([
            'user_id' => 1,
            'quantity' => 1,
            'payment_status' => 0,
            'shipping_status' => 0,
            'order_date' => date('Y-m-d'),
            'remarks_column' => 'ユーザー1 がユニフォームCを1枚購入',
            'uniform_id' => 3,
        ]);
    }
}
