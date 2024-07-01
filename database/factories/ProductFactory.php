<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

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
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'stock' => fake()->numberBetween(0, 100),
            'sold' => fake()->numberBetween(0, 50),
            'price' => fake()->randomFloat(2, 10, 1000),
            'id_user' => User::pluck('id')->random(),
            'id_category' => Category::pluck('id')->random(),
        ];
    }
}
