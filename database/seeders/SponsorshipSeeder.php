<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Sponsorship;
use Illuminate\Database\Seeder;
// facades
use Illuminate\Support\Facades\Schema;


class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function(){
            Sponsorship::truncate();
        });

      
        Sponsorship::create([
            'price' => 2.99,
            'time' => 24
        ]);

        Sponsorship::create([
            'price' => 5.99,
            'time' => 72
        ]);

        Sponsorship::create([
            'price' => 9.99,
            'time' => 144
        ]);
       
    }
}
