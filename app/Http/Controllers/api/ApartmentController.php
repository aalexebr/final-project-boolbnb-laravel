<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\User;
use App\Models\Service;
use App\Models\Image;
use App\Models\Message;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


//HELPERS
use Illuminate\Support\Facades\Auth;
// facades
use Illuminate\Support\Facades\Storage;


class ApartmentController extends Controller
{
    public function index() {

    $sponsoredApartments = Apartment::has('sponsorships')
    ->with(['sponsorships' => function ($query) {
        $query->whereDate('end_date', '>=', now());
    }])
    ->with('sponsorships', 'services', 'image')
    ->where('visible', 1);

    $nonSponsoredApartments = Apartment::doesntHave('sponsorships')
     ->with('sponsorships', 'services', 'image')
    ->where('visible', 1);

    $apartments = $sponsoredApartments->union($nonSponsoredApartments)->paginate(12);
    
    $apartments;
    if($apartments) {

        return response()->json([
            'code' => 200,
            'success' => true,
            'results' => $apartments
        ]);
    }
    else {

        return response()->json([
            'code' => 404,
            'success' => false,
            'message' => 'not found'
        ]);
    }

    }


    public function searchApartment(Request $request) {

        $data = $request->validate([
            'city' => 'nullable',
            'lat' => 'required',
            'lon' => 'required',
            'radius' => 'nullable'
        ]);

        $radius = $data['radius'] * 1000;

        $lat = $data['lat'];
        $lon = $data['lon'];

        $currentDate = Carbon::now(); 

        $apartments = Apartment::select('apartments.*')
        ->where('visible', 1)
        ->with('sponsorships', 'services', 'image')
        ->selectRaw("(6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lon) - radians(?)) + sin(radians(?)) * sin(radians(lat))) * 1000) AS distance", [$lat, $lon, $lat])
        ->havingRaw("distance < ?", [$radius])
        ->leftJoin('apartment_sponsorship', 'apartments.id', '=', 'apartment_sponsorship.apartment_id')
        ->where(function($query) use ($currentDate) {
            $query->whereNull('apartment_sponsorship.id') 
                ->orWhere(function($query) use ($currentDate) {
                    $query->where('apartment_sponsorship.end_date', '>=', $currentDate); 
                });
        })
        ->groupBy('apartments.id')
        ->orderByRaw('MAX(apartment_sponsorship.end_date) DESC')
        ->paginate(12);
    


        return response()->json([
                'success'=>true,
                'message'=> $data,
                'results' => $apartments,
                'lat' => $lat,
                'lon' =>  $lon,
                'radius' => $radius,
                'test' => $data['radius']
            ],200);
    
    }

    public function singleApt(string $id){
       
        $apartment = Apartment::where('id', $id)
                                ->where('visible', 1)
                                ->with('services','image','user')
                                ->first();

        if($apartment){
            return response()->json([
                'code' => 200,
                'success' => true,
                'results' => $apartment
            ]); 
        }
        else{
            return response()->json([
                'success'=>false,
                'message'=>'failed to find apartment'
            ],404);
        }
        
    }

    public function filterApt(Request $request) {
        $data = $request->validate([
            'numberOfBeds' => 'nullable|numeric',
            'numberOfRooms' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'selectedServices' => 'nullable|array',
            'lat' => 'required',
            'lon' => 'required',
            'radius' => 'nullable'
        ]);

        $radius = $data['radius'] * 1000;

        $lat = $data['lat'];
        $lon = $data['lon'];

        $currentDate = Carbon::now(); 

        if (!array_key_exists('numberOfBeds', $data) || $data['numberOfBeds'] == '' || $data['numberOfBeds'] == null) {
            $data['numberOfBeds'] = 0;
        }
        if (!array_key_exists('numberOfRooms', $data) || $data['numberOfRooms'] == '' || $data['numberOfRooms'] == null) {
            $data['numberOfRooms'] = 0;
        }
        if (!array_key_exists('price', $data)  || $data['price'] == '') {
            $data['price'] = 0;
        }
       

        // SERVICES QUERY
        if(isset($data['selectedServices'])) {

            $apartments = Apartment::select('apartments.*')
            ->where('bed', '>=' , $data['numberOfBeds'])
            ->where('room', '>=' , $data['numberOfRooms'])
            ->where('price', '>=' , $data['price'])
            ->where('visible', 1)
            ->whereHas('services', function ($query) use ($data) {
                $query->whereIn('service_id', $data['selectedServices']);
            }, '=', count($data['selectedServices']))
            ->with('sponsorships', 'services', 'image')
            ->selectRaw("(6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lon) - radians(?)) + sin(radians(?)) * sin(radians(lat))) * 1000) AS distance", [$lat, $lon, $lat])
            ->havingRaw("distance < ?", [$radius])
            ->leftJoin('apartment_sponsorship', 'apartments.id', '=', 'apartment_sponsorship.apartment_id')
            ->where(function($query) use ($currentDate) {
                $query->whereNull('apartment_sponsorship.id') 
                    ->orWhere(function($query) use ($currentDate) {
                        $query->where('apartment_sponsorship.end_date', '>=', $currentDate); 
                    });
            })
            ->orderBy('apartment_sponsorship.end_date', 'desc')
            ->paginate(12);
        
        }
        else{
            $apartments = Apartment::select('apartments.*')
            ->where('bed', '>=' , $data['numberOfBeds'])
            ->where('room', '>=' , $data['numberOfRooms'])
            ->where('price', '>=' , $data['price'])
            ->where('visible', 1)
            ->with('sponsorships', 'services', 'image')
            ->selectRaw("(6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lon) - radians(?)) + sin(radians(?)) * sin(radians(lat))) * 1000) AS distance", [$lat, $lon, $lat])
            ->havingRaw("distance < ?", [$radius])
            ->leftJoin('apartment_sponsorship', 'apartments.id', '=', 'apartment_sponsorship.apartment_id')
            ->where(function($query) use ($currentDate) {
                $query->whereNull('apartment_sponsorship.id') 
                    ->orWhere(function($query) use ($currentDate) {
                        $query->where('apartment_sponsorship.end_date', '>=', $currentDate); 
                    });
            })
            ->orderBy('apartment_sponsorship.end_date', 'desc')
            ->paginate(12);
        }
        
    
        return response()->json([
            'success'=>true,
            'response'=> $data,
            'results' => $apartments
            
        ],200);
    }
}
