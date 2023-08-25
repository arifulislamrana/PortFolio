<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Contact::factory()->create([
            'name' => 'kudus',
            'email' => 'ariful.islam0683@gmail.com',
            'subject' => "jogajog kora",
            'message' => "sasd ashdbhajsd sadhasd asjhd sad sadhjas dsa dsajh dsadsahj dasjd asjhd asjh dsajhd asnd sajd sakdnsa;ldk;wbdehjkf nei",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
