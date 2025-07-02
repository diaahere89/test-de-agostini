<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create admin users
        User::create([
            'username' => 'admin',
            'email' => 'admin@test-de-agostini.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);

        User::create([
            'username' => 'supervisor',
            'email' => 'supervisor@test-de-agostini.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);

        // Create 150 regular users
        for ($i = 1; $i <= 150; $i++) {
            $firstName = fake()->firstName();
            $lastName = fake()->lastName();
            $username = strtolower($firstName . $lastName . rand(1, 99));
            
            User::create([
                'username' => $username,
                'email' => strtolower($firstName . '.' . $lastName) . '@test-de-agostini.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'email_verified_at' => now(),
                'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            ]);
        }

        // Make some additional random users admins
        User::whereIn('id', range(3, 10))->update(['is_admin' => true]);
    }
}