<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_EMAIL'),
            'password' => bcrypt(env('ADMIN_PASSWORD')),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->call([
            HomeSeeder::class,
            AboutSeeder::class,
            ResumeSeeder::class,
            ServiceSeeder::class,
            SkillSeeder::class,
            ProjectSeeder::class,
            BlogSeeder::class,
            ContactSeeder::class,
        ]);
    }
}
