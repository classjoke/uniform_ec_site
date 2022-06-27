<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Uniform;

class UniformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Uniform::create([
            'name' => 'ユニフォームA',
            'price' => 1000,
            'stock' => 10,
            'image_path' => "pic1.png",
        ]);

        Uniform::create([
            'name' => 'ユニフォームB',
            'price' => 2000,
            'stock' => 10,
            'image_path' => "pic2.png",
        ]);

        Uniform::create([
            'name' => 'ユニフォームC',
            'price' => 3000,
            'stock' => 10,
            'image_path' => "pic3.png",
        ]);

        Uniform::create([
            'name' => 'ユニフォームD',
            'price' => 3000,
            'stock' => 10,
            'image_path' => "pic4.png",
        ]);

        Uniform::create([
            'name' => 'ユニフォームE',
            'price' => 3000,
            'stock' => 10,
            'image_path' => "pic5.png",
        ]);
    }
}
