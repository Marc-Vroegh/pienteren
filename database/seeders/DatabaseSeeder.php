<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@test.com',
            'password' => bcrypt('password'), 
        ]);
        User::factory()->create([
            'first_name' => 'Marc',
            'last_name' => 'Vroegh',
            'email' => 'vroeghmarc@gmail.com',
            'password' => bcrypt('password'), 
        ]);

    }
}
