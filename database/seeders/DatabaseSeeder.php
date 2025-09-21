<?php

namespace Database\Seeders;

use App\Models\Blog;
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
            'address' => 'Ijoke Ota',
            'phone' => '09031412454',
            'email' => 'admin@titan-equity.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);

        // Create 6 blog posts
        Blog::factory(6)->create();

        // Call other seeders if needed
        $this->call([
            // AdminUserSeeder::class,
            // other seeders...
        ]);
    }
}