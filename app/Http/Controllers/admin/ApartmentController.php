<?php

namespace App\Http\Controllers\admin;

use App\Models\Apartment;
use App\Models\User;
use App\Models\Service;
use App\Models\Image;
use App\Models\Message;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

//HELPERS
use Illuminate\Support\Facades\Auth;
// facades
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        //$apartments = Apartment::all();
        $user = Auth::user();
        $userId = Auth::id();
        $apartments = Apartment::where('user_id', $user['id'])->get();
       

        return view('admin.apartment.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {     $service = Service::all();
        
       
        return view('admin.apartment.create', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApartmentRequest $request, Apartment $apartment)
    {   

       
        $userId = Auth::id();
        $formData = $request->validated();

        $response = Http::withoutVerifying()->get('https://api.tomtom.com/search/2/geocode/'.$formData['address'].'.json?&key='.env('API_KEY'));

            // Gestisci la risposta qui
            $data = $response->json();
       
            $lat = $data['results'][0]['position']['lat'];
            $lon =  $data['results'][0]['position']['lon'];

       

        if(isset($formData['cover_img'])){
            $img_path = Storage::put('uploads/Apartment',$formData['cover_img']);
        }
        else {
            $img_path = null;
        }

        if(!isset($formDAta['visible'])) {
            $formData['visible'] = null;
        }
        if(!isset($formDAta['shared_bathroom'])) {
            $formData['shared_bathroom'] = null;
        }
        if($formData['visible']) {
            $formData['visible'] = false;
        }
        else {
            $formData['visible'] = true;
        }

       
        $apartment = Apartment::create([
            'room' => $formData['room'],
           'bathroom' => $formData['bathroom'],
           'bed' => $formData['bed'],
           'shared_bathroom' => $formData['shared_bathroom'],
           'address' => $formData['address'],
           'visible' => $formData['visible'],
           'lat' => $lat,
           'lon' => $lon,
           'name' => $formData['name'],
           'price' => $formData['price'],
           'square_meter' => $formData['square_meter'],
           'description' => $formData['description'],
           'cover_img' => $img_path,
           'user_id' => $userId
        ]);

        if(isset($formData['service'])){
            foreach($formData['service'] as $serviceId){
                $apartment->services()->attach($serviceId);
            }
        }
        // adding more images
        // dd($formData['extra_imgs']);
        if(isset($formData['extra_imgs'])){
            foreach($formData['extra_imgs'] as $singleImg){
                $img = new Image();
                $img_path = Storage::put('uploads/Apartment',$singleImg);
                $img->path = $img_path;
                $img->apartment_id = $apartment->id;
                $img->save();
                
            }
        }

        return redirect()->route('admin.apartment.show', compact('apartment'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {   
        if ($apartment->user_id !== Auth::id()) {
           
            return abort(403, 'Unauthorized');
        }
        
        $todayDate = now()->setTimezone('Europe/Rome');
        return view('admin.apartment.show', compact('apartment', 'todayDate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {   
        if ($apartment->user_id !== Auth::id()) {
           
            return abort(403, 'Unauthorized');
        }
        
        $service = Service::all();
        $aptSrvices = [];
        foreach($apartment->services as $singleService){
            $aptSrvices[] = $singleService;
        }
        $extra_images = Image::where('apartment_id',$apartment->id)->get();
        // dd($extra_images);
        return view('admin.apartment.edit', compact('apartment', 'service', 'aptSrvices', 'extra_images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {   
        $img_path = $apartment->cover_img;
        $formData = $request->validated();
        
        // ELIMINAZIONE IMMAGINI EXTRA OLTRE LA COPERTINA
        if(isset($formData['delete_imgs'])){
            foreach($formData['delete_imgs'] as $key=>$value){
                $extraImage = Image::where('id',$key)->first();
                if($extraImage->path){
                   Storage::delete($extraImage->path); 
                   $extraImage->delete();
                }
                elseif($extraImage->src){
                    $extraImage->delete();
                }  
            };
        };
        //CONTROLLA SE COVER_IMG è SETTATO ,E SE LO è A TRUE ,RIMUOVE L'IMMAGINE
        if(isset($formData['cover_img'])){
            if($apartment->cover_img){
                Storage::delete($apartment->cover_img);
            }
            $img_path= Storage::put('uploads\Apartment',$formData['cover_img']);
        }

        if(!isset($formData['shared_bathroom'])) {
            $formData['shared_bathroom'] = null;
        }


        $response = Http::withoutVerifying()->get('https://api.tomtom.com/search/2/geocode/'.$formData['address'].'.json?&key='.env('API_KEY'));

            // Gestisci la risposta qui
            $data = $response->json();
       
            $lat = $data['results'][0]['position']['lat'];
            $lon =  $data['results'][0]['position']['lon'];
        
        $apartment->update([
            'room' => $formData['room'],
            'bathroom' => $formData['bathroom'],
            'bed' => $formData['bed'],
            'shared_bathroom' => $formData['shared_bathroom'],
            'address' => $formData['address'],
            'lat'=>$lat,
            'lon'=>$lon,
            'visible' => $formData['visible'],
            'name' => $formData['name'],
            'price' => $formData['price'],
            'square_meter' => $formData['square_meter'],
            'description' => $formData['description'],
            'cover_img' => $img_path,
        ]);

        // adding more images
        // dd($formData['extra_imgs']);
        if(isset($formData['extra_imgs'])){
            foreach($formData['extra_imgs'] as $singleImg){
                $img = new Image();
                $img_path = Storage::put('uploads/Apartment',$singleImg);
                $img->path = $img_path;
                $img->apartment_id = $apartment->id;
                $img->save();
                
            }
        }

        // dd($formData['service']);
        if(isset($formData['service'])){
            $apartment->services()->sync($formData['service']);
        }
        else{
            $apartment->services()->detach();
        }
        return redirect()->route('admin.apartment.show', compact('apartment'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        $extra_images = Image::where('apartment_id',$apartment->id)->get();
        if($extra_images){
           foreach($extra_images as $img){
            if($img->path != null){
                Storage::delete($img->path);
             }
           };
        };
        if(!str_starts_with($apartment->cover_img,'uploads') && $apartment->covet_img != null){
           Storage::delete($apartment->cover_img); 
        }
        
        $apartment->delete();
        return redirect()->route('admin.apartment.index');
    }

}




