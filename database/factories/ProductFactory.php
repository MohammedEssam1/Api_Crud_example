<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'picture'=>fake()->imageUrl(),
            'availability'=>fake()->randomElement(['available', 'unavailable']),
            'price'=>fake()->numberBetween(100,1000),
            'category_id'=>Category::inRandomOrder()->first()->id
        ];
    }
}
