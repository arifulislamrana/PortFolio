<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Service::factory()->create([
            'name' => "web Design",
            'icon' => 'nei',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
