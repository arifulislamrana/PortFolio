<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Skill::factory()->create([
            'name' => "web Design",
            'percentage' => '90',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
