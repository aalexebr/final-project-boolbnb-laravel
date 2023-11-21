<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\View;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   

        View::truncate();
        
        for ($i=0; $i < 3000; $i++) { 
            View::create([
                'ip_adress' => fake()->ipv6(),
                'date' => fake()->date('2023-m-d'),
                'apartment_id' => rand(1,28)
            ]);
        }
    }
}
