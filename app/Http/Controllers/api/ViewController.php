<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\View;

class ViewController extends Controller
{
    public function getIp(Request $request){
        $data = $request->validate([
            'ip'=>'required',
            'id'=>'required'
        ]);
        $date = date("Y-m-d");
        $x = View::where('ip_adress',$data['ip'])
            ->where('date', $date)
            ->where('apartment_id',$data['id'])->get();
        if(count($x) == 0){
                View::create([
                'ip_adress' => $data['ip'],
                'date'=> $date,
                'apartment_id'=>$data['id']
            ]);
        }
    }
}
