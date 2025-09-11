<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Blog; // make sure this is your model
use Faker\Factory as Faker;
// Generate 30 more posts via factory
\App\Models\Blog::factory()->count(30)->create();

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Generate 15 dummy posts
        for ($i = 0; $i < 15; $i++) {
            Blog::create([
                'title' => $faker->sentence(6),
                'excerpt' => $faker->paragraph(2),
                'content' => $faker->paragraphs(5, true),
                'slug' => $faker->unique()->slug,
                'author_id' => 1, // assuming admin user is ID 1
                'status' => 'publish',
                'featured_image' => 'https://source.unsplash.com/800x600/?real-estate,' . uniqid(),
                'additional_images' => json_encode([
                    'https://source.unsplash.com/600x400/?house,' . uniqid(),
                    'https://source.unsplash.com/600x400/?apartment,' . uniqid(),
                ]),
                'views' => $faker->numberBetween(50, 5000),
            ]);
        }

        // A few specific posts
        $posts = [
            [
                'title' => 'Top 10 Home Renovation Tips',
                'content' => 'Full content about home renovation tips...',
                'slug' => Str::slug('Top 10 Home Renovation Tips'),
                'author_id' => 1,
                'status' => 'publish',
                'views' => 120,
                'excerpt' => 'Learn the best renovation tips to increase your property value...',
                'featured_image' => 'https://picsum.photos/800/400?random=1',
            ],
            [
                'title' => 'Real Estate Market Trends 2025',
                'content' => 'Full content about market trends...',
                'slug' => Str::slug('Real Estate Market Trends 2025'),
                'author_id' => 1,
                'status' => 'publish',
                'views' => 250,
                'excerpt' => 'A deep dive into housing and investment opportunities this year...',
                'featured_image' => 'https://picsum.photos/800/400?random=2',
            ],
            [
                'title' => 'First-Time Buyer’s Guide',
                'content' => 'Full content for first-time buyers...',
                'slug' => Str::slug('First-Time Buyer’s Guide'),
                'author_id' => 1,
                'status' => 'publish',
                'views' => 95,
                'excerpt' => 'Step-by-step guide to buying your first home successfully...',
                'featured_image' => 'https://picsum.photos/800/400?random=3',
            ],
            [
                'title' => 'Luxury Apartments in Lagos',
                'content' => 'Full content about luxury apartments...',
                'slug' => Str::slug('Luxury Apartments in Lagos'),
                'author_id' => 1,
                'status' => 'publish',
                'views' => 300,
                'excerpt' => 'Discover top-rated luxury apartments available right now...',
                'featured_image' => 'https://picsum.photos/800/400?random=4',
            ],
        ];

        foreach ($posts as $post) {
            Blog::updateOrCreate(['slug' => $post['slug']], $post);
        }
        // Generate bulk dummy posts
Blog::factory()->count(30)->create();
    }
}
