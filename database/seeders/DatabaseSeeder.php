<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
           // Admin user
    User::create([
        'name' => 'Bellah',
        'email' => 'bellahoptions@gmail.com',
        'password' => Hash::make('12345'),
        'is_admin' => 1,
    ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

         $this->call([
            PropertySeeder::class,
            BlogSeeder::class,
        ]);
    }
}
