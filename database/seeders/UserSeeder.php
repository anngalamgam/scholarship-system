<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        // ADMIN
        User::updateOrCreate(
    [
        'email' => 'admin@gmail.com'
    ],
    [
        'name' => 'Admin',
        'password' => bcrypt('password'),
        'role_as' => 1,
    ]
);

        // STUDENT
        User::create([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('student123'),
            'role_as' => '0',
        ]);

    }
}