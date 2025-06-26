<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->sentence,
            'description' => fake()->paragraph,
            'start_time'=> fake()->dateTimeBetween('-1 month',now()),
            'end_time'=> fake()->dateTimeBetween('+1 month', '+3 months'),
        ];
    }
}
