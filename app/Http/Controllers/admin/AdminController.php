<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\User;
use App\Models\Service;
use App\Models\Image;
use App\Models\Message;
use App\Models\View;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Support\Facades\Http;
//HELPERS
use Illuminate\Support\Facades\Auth;
// facades
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function dashboard() {

        $user = Auth::user();
        $userId = Auth::id();
        $apartments = Apartment::where('user_id', $user['id'])->count();
       
     
       $mess = Message::join('apartments','messages.apartment_id','=','apartments.id')
          ->join('users','apartments.user_id','=','users.id')
          ->where('user_id', $userId)
          ->count();
     
        $sponsor = DB::table('apartment_sponsorship')
            ->join('apartments', 'apartment_sponsorship.apartment_id', '=', 'apartments.id')
            ->join('users','apartments.user_id','=','users.id')
            ->where('user_id', $userId)
            ->distinct('apartment_id')
            ->count();
      
        $viewCount = View::join('apartments','views.apartment_id','=','apartments.id')
        ->join('users','apartments.user_id','=','users.id')
        ->where('user_id', $userId)
        // ->selectRaw('* FROM ')
        ->distinct('views.date')
        ->count();  


        $countsByMonth = DB::table('views')
        ->join('apartments','views.apartment_id','=','apartments.id')
        ->join('users','apartments.user_id','=','users.id')
        ->where('user_id', $userId)
        ->selectRaw('DATE_FORMAT(date, "%m") as month, count(*) as count')
        ->groupBy('month')
        ->get();
        
		
		if(count($countsByMonth) >0 ){
			foreach ($countsByMonth as $count) {
          $arr[$count->month] = $count->count;
          }
		}
		else{
			$arr= [];
		}
        //   dd($arr);
		    
        $singleAptViews = View::select('apartments.id', 'apartments.name', DB::raw('count(apartment_id) as view_count'))
        ->join('apartments', 'views.apartment_id', '=', 'apartments.id')
        ->join('users', 'apartments.user_id', '=', 'users.id')
        ->where('user_id', $userId)
        ->groupBy('apartments.id', 'apartments.name')
        ->orderByDesc('view_count')
        ->first();

      
		if($singleAptViews){
			return view('admin.dashboard',compact('apartments', 'mess', 'sponsor','viewCount','arr', 'singleAptViews'));
		}
		else{
			return view('admin.dashboard',compact('apartments', 'mess', 'sponsor','viewCount','arr'));
		}
          
            
          
          
          
        
        
        
     }
}
