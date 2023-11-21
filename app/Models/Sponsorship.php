<?php

namespace App\Models;

//models
use app\Models\Apartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;


    //RELATIONSHIPS

    public function apartments() {

        return $this->belongsToMany(Aparment::class);
    }
}
