<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Product;
//using faker to add randomo data in the database
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
        //adding 50 products in database in for loop for testing purpose
        for ($i=1; $i <= 50 ; $i++) {
            $product = new Product;
                $product->image = $faker->imageUrl(400, 300);
                //faker select random element from the array for product name
                $product->title = $faker->randomElement(['Shirt','Hat','Bracelet','Shoes','Trouser']);
                //faker select random price from 100.00 to 300.99
                $product->price = $faker->randomFloat(100, 200, 300);
                $product->description = $faker->text(50);
                //Fake select random category_id from (1:Men, 2:Women, 3:Kids 4:Teenagers)
                $product->category_id = $faker->randomElement([1,2,3,4]);
                $product->save();
        }
    }
}
