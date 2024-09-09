<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drugstore>
 */
class DrugstoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'drug_name' => fake()->name(),
            'unit' => fake()->randomElement(['100 mg', '200 g', '100 g', '250 mg']),
            'quantity' => fake()->numberBetween(1, 100),
            'price' => fake()->numberBetween(1, 1000),
            'del_flag' => fake()->numberBetween(0, 1)
        ];
    }
}
