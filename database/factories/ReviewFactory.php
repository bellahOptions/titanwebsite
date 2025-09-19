<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'property_id' => Property::factory(),
            'user_id' => User::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->paragraph(3),
            'approved' => $this->faker->boolean(80), // 80% chance of being approved
        ];
    }

    public function approved(): static
    {
        return $this->state(fn (array $attributes) => [
            'approved' => true,
        ]);
    }
}