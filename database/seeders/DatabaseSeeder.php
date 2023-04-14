<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\CategorySeeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User dan Category
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);
        // Produk
        $product = array_values([
            'MANLY POLO COLARLESS',
            'House of Smith Jacket',
            'Jam tangan',
            'LEGO Batman',
            'MASKER DUCKBILL',
            'Jamu Cap Kereta',
            'Soft Case Motif',
            'TALI GANTUNGAN MOTIF',
            'Tatajoy 2.4Ghz',
            'SORTING PUZZLE',
            'Yo-Yo',
            'Celana Chinos',
            'Kaos Oversize Uniqlo',
            'Iphone XR ',
            'Baygon 1 pack grosir'
        ]);

        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 15; $i++) {
            DB::table('products')->insert([
                'id_products' => Str::random(3),
                'categories_id' => $faker->numberBetween(1, 5),
                'users_id' => $faker->numberBetween(1, 2),
                'name' => $faker->unique()->randomElement($product),
                'description' => $faker->paragraph,
                'price' => $faker->numberBetween(20000, 50000),
                'stock' => $faker->numberBetween(1, 10),
                'slug' => Str::random(10),
                'image' => $faker->randomElement(['dafault'])
            ]);
        }
    }
}
