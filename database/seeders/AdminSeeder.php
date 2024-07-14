<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker; // Import Faker

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        User::create([
            'name' => $faker->firstName,
            'email' => $faker->unique()->safeEmail, // Generate a unique fake email
            'password' => bcrypt('12345678'),
            'role' => 'admin'
        ]);
    }
}
