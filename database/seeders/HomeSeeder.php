<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Home::factory()->create([
            'intro' => "I'm Nobody cz nobody is perfect",
            'designation' => 'ML ENgineer',
            'image' => 'RN no image',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
