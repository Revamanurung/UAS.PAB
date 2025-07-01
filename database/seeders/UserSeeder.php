<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Delete existing user if exists
        $existingUser = User::where('email', 'admin@admin.com')->first();
        if ($existingUser) {
            $existingUser->delete();
        }

        // Create new admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
        ]);
    }
} 