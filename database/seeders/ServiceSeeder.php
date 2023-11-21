<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
// facades
use Illuminate\Support\Facades\Schema;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        Schema::withoutForeignKeyConstraints(function(){
            Service::truncate();
        });

        $service = [
            'Wi-fi',
            'Cucina',
            'Idromassaggio',
            'Balcone',
            'Parcheggio Privato',
            'Tv'
        ];

       foreach ($service as $singleService) {
            Service::create([
                'name' => $singleService
            ]);
       }
    }
}
