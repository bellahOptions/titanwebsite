<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogDisplay>
 */
class BlogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'excerpt' => $this->faker->paragraph(2),
            'content' => $this->faker->paragraphs(5, true),
            'slug' => $this->faker->unique()->slug,
            'author_id' => 1, // assuming admin user ID = 1
            'status' => 'publish',
            'featured_image' => 'https://source.unsplash.com/800x600/?real-estate,' . uniqid(),
            'additional_images' => json_encode([
                'https://source.unsplash.com/600x400/?house,' . uniqid(),
                'https://source.unsplash.com/600x400/?apartment,' . uniqid(),
            ]),
            'views' => $this->faker->numberBetween(50, 5000),
        ];
    }
}
