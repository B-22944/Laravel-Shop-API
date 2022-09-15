<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'image' => 'image.jpg',
                'title' => $this->faker->randomElement(['Shirt','Hat','Bracelet','Shoes','Trouser']),
                'price' => $this->faker->randomFloat(100, 200, 300),
                'description' => $this->faker->text(50),
                'category_id' => $this->faker->randomElement([1,2,3,4])
        ];
    }
}
