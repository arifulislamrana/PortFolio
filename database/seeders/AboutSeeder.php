<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\About::factory()->create([
                 'name' => env('ADMIN_NAME'),
                 'email' => env('ADMIN_EMAIL'),
                 'phone' => '0173423476',
                 'zip' => '7657',
                 'dob' => '12-12-9996',
                 'image' => 'nei re baba',
                 'address' => 'mone nai',
                 'created_at' => now(),
                 'updated_at' => now(),
            ]);
    }
}
