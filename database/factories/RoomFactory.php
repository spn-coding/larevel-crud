<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_name' => fake()->bothify('Rm-###'),
            'room_status' => fake()->randomElement(['Active','Lock',"Available"]),
            'number' => fake()->numberBetween(1, 100),
            'room_price' => fake()->numberBetween(1, 1000),
            'del_flag' => fake()->numberBetween(0, 1)
        ];
    }
}
