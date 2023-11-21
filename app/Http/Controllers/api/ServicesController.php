<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServicesController extends Controller
{
    public function sendServices(){
        $services = Service::all();
        return response()->json([
            'data'=>$services
        ],200);
    }
}
