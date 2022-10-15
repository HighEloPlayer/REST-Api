<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1 ; $i <= 10 ; $i++)
        {Product::create([
            'title' => $faker->catchPhrase,
            'description'  => $faker->sentence(8),
            'currency'     => $faker->word(3), 
            'price'     => $faker->randomNumber,
            'brand'   => $faker->catchPhrase,
            'category'=> $faker->randomElement(["Books", "Clothing", "Devices", "Style", "Sports","Artworks"]),
            'image'   => $faker->url
        ]);
        }
    }
}