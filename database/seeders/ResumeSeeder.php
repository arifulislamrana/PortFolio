<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Resume::factory()->create([
            'degree_name' => 'B.Sc. in CSE',
            'institute' => 'Pabna University of Science and Technology',
            'institute_src' => 'www.sdasda.com',
            'description' => 'sdsdhb shbdahjdb sandbhajdbsa dashjdbsahjd asdhjsabdajh dsandbashjc dsamnd ashjdbsakd sa,n dsandsajd aks dsa,mcd ashjc',
            'starting' => now(),
            'ending' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
