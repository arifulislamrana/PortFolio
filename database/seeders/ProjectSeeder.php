<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Project::factory()->create([
            'name' => "eGarage",
            'title' => 'A motorbike Service center',
            'image' => "nei",
            'src' => "github/sdas/sdfs",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
