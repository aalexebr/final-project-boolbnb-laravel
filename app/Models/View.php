<?php

namespace App\Models;

//MODELS
use App\models\Apartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    //RELATIONSHIPS

    protected $fillable = [
        'ip_adress',
        'date',
        'apartment_id'
    ];

    public function apartment() {

    return $this->belongsTo(Apartment::class);

    }
}
