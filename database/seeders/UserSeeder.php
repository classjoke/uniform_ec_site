<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            User::create([
                'name' => 'テストユーザー1',
                'email' => 'example1@example.com',
                'password' => 'password',
                'authority' => 0,
                'address' => '東京都渋谷区1-1-1',
                'login_id' => 'admin',
            ]);

            User::create([
                'name' => 'テストユーザー2',
                'email' => 'example2@example.com',
                'password' => 'password',
                'authority' => 1,
                'address' => '東京都渋谷区1-1-2',
                'login_id' => 'testUser',
            ]);

            User::create([
                'name' => 'テストユーザー3',
                'email' => 'example3@example.com',
                'password' => 'password',
                'authority' => 2,
                'address' => '東京都渋谷区1-1-3',
                'login_id' => 'guest',
            ]);
        }
    }
}
