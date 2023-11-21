<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//MODELS
use app\Models\Apartment;


class Service extends Model
{
    use HasFactory;


    //RELATIONSHIPS

    public function apartments() {

        return $this->belongsToMany(Aparment::class);
    }
}
