<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    public function definition(): array
    {
        $propertyTypes = ['house', 'apartment', 'condo', 'villa'];
        $cities = ['New York', 'Los Angeles', 'Chicago', 'Miami', 'Dallas', 'Seattle', 'Boston', 'San Francisco'];
        
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraphs(3, true),
            'price' => $this->faker->numberBetween(100000, 2000000),
            'location' => $this->faker->randomElement($cities) . ', ' . $this->faker->state(),
            'address' => $this->faker->streetAddress(),
            'latitude' => $this->faker->latitude(25, 49),
            'longitude' => $this->faker->longitude(-125, -67),
            'type' => $this->faker->randomElement($propertyTypes),
            'bedrooms' => $this->faker->numberBetween(1, 6),
            'bathrooms' => $this->faker->randomFloat(1, 1, 5),
            'area' => $this->faker->numberBetween(800, 5000),
            'images' => json_encode(['properties/property-' . $this->faker->numberBetween(1, 10) . '.jpg']),
            'featured' => $this->faker->boolean(30), // 30% chance of being featured
            'status' => true,
            'user_id' => User::factory(),
            'images' => json_encode(['https://picsum.photos/800/600?property=' . $this->faker->numberBetween(1, 100)]),
        ];
    }

    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'featured' => true,
        ]);
    }

    public function house(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'house',
        ]);
    }

    public function apartment(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'apartment',
        ]);
    }
}