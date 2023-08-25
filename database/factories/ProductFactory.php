<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'prod_code' => fake()->numberBetween(1111111,9999999).fake()->numberBetween(111111,999999),
            'prod_name' => fake()->name(),
            'prod_setor' => fake()->numberBetween(1,4),
            'prod_price' => fake()->numberBetween(2.5,30)
        ];
    }
}
