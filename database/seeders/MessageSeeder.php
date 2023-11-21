<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    public function run(): void
    {   
        Message::truncate();

        for ($i=0; $i < 30; $i++) { 
            Message::create([
                'name' => fake()->firstName(),
                'object' => fake()->word(),
                'date' => fake()->date(),
                'content' => fake()->paragraphs(3, true),
                'email' => fake()->email(),
                'apartment_id' => rand(1, 28)
            ]);
        }
    }
}
