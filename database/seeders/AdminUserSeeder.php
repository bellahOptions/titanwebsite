<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if users table has is_admin column
        $hasIsAdminColumn = Schema::hasColumn('users', 'is_admin');
        $hasRoleColumn = Schema::hasColumn('users', 'role');
        
        // Create or update the admin user
        $user = User::updateOrCreate(
            ['email' => 'muyiwa@gmail.com'],
            [
                'name' => 'Muyiwa Admin',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
            ]
        );

        // Set admin properties if columns exist
        if ($hasIsAdminColumn) {
            $user->is_admin = true;
        }
        
        if ($hasRoleColumn) {
            $user->role = 'admin';
        }
        
        $user->save();

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: muyiwa@gmail.com');
        $this->command->info('Password: 12345678');
    }
}