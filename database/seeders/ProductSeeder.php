<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
        for ($i=1; $i <= 50 ; $i++) {
            $product = new Product;
                $product->image = $faker->imageUrl(400, 300);
                $product->title = $faker->randomElement(['Shirt','Hat','Bracelet','Shoes','Trouser']);
                $product->price = $faker->randomFloat(100, 200, 300);
                $product->description = $faker->text(50);
                $product->category_id = $faker->randomElement([1,2,3]);
                $product->save();
        }
    }
}
