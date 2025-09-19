<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Property;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@titan-equity.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);

        // Create regular users (19 more users)
        User::factory(19)->create();

        // Create 6 blog posts
        Blog::factory(6)->create();

        // Create 6 properties
        $properties = Property::factory(6)->create();

        // Create reviews for properties (3-5 reviews per property)
        foreach ($properties as $property) {
            Review::factory(rand(3, 5))->create([ // Changed $this->faker to rand()
                'property_id' => $property->id,
            ]);
        }

        // Create some featured properties
        Property::factory(2)->featured()->create();

        // Create additional reviews for variety
        Review::factory(10)->create();

        // Call other seeders if needed
        $this->call([
            // AdminUserSeeder::class,
            // other seeders...
        ]);
    }
}