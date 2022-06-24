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
            'image_path' => null,
        ]);

        Uniform::create([
            'name' => 'ユニフォームB',
            'price' => 2000,
            'stock' => 10,
            'image_path' => null,
        ]);

        Uniform::create([
            'name' => 'ユニフォームC',
            'price' => 3000,
            'stock' => 10,
            'image_path' => null,
        ]);
    }
}
