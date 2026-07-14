<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'John Teacher',
                'email' => 'teacher@example.com',
                'contact_number' => '9800000001',
                'role' => 'teacher',
            ],
            [
                'id' => 2,
                'name' => 'Jane Student',
                'email' => 'student@example.com',
                'contact_number' => '9800000002',
                'role' => 'student',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'contact_number' => $user['contact_number'],
                    'role' => $user['role'],
                    'status' => true,
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                ]
            );
        }
    }
}
