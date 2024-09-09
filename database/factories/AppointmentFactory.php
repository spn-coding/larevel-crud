<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'doctor_name' => fake()->name(),
            'room_no' => fake()->bothify('Rm-###'),
            'date' => fake()->date(),
            'time' => fake()->time(),
            'del_flag' => fake()->numberBetween(0, 1)
        ];
    }
}
