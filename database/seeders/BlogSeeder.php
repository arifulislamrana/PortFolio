<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Blog::factory()->create([
            'title' => 'A motorbike Service center',
            'body' => 'sasd ashdbhajsd sadhasd asjhd sad sadhjas dsa dsajh dsadsahj dasjd asjhd asjh dsajhd asnd sajd sakdnsa;ldk;wbdehjkf',
            'image' => "nei",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
