<?php

namespace Database\Seeders;


use App\Models\Apartment;
use App\Models\Sponsorship;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// facades
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Schema::withoutForeignKeyConstraints(function(){
            Apartment::truncate();
        });

        
        $addresses =  config('apt_addresses');

        Schema::withoutForeignKeyConstraints(function(){
            Apartment::truncate();
        });

        foreach($addresses as $singleAddress) { 
            
            Apartment::create([
                'bed'  => $singleAddress['bed'],
                'bathroom' => $singleAddress['bathroom'],
                'shared_bathroom' => $singleAddress['shared_bathroom'],
                'address' => $singleAddress['address'],
                'lat' => $singleAddress['lat'],
                'lon' => $singleAddress['lon'],
                'room' => $singleAddress['room'],
                'visible' => $singleAddress['visible'],
                'name' => $singleAddress['name'],
                'price' => $singleAddress['price'],
                'square_meter' => $singleAddress['square_meter'],
                'description' => $singleAddress['description'],
                'cover_img' => $singleAddress['cover_img'],
                'user_id' => rand(1, 2)
            ]);
        }

        $apt = Apartment::all();
        $serv = Service::all();
        $sponsor = Sponsorship::all();
        foreach ($apt as $singleapt){
            $randServ = $serv->random(rand(1, 3))->pluck('id')->toArray();
            $randspons = $sponsor->random(rand(1, 3))->pluck('id')->toArray();
            


            //$startDate = now();  // Sostituisci con la tua data di inizio desiderata
           // $endDate = now()->addDays(1);  // Sostituisci con la tua data di fine desiderata
        
            //$singleapt->sponsorships()->attach($randspons, ['start_date' => $startDate, 'end_date' => $endDate]);
            $singleapt->services()->sync($randspons);
            $singleapt->services()->sync($randServ);
        }

}}
