<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//MODELS
use App\models\Apartment;

class Message extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'email',
        'object',
        'content',
        'apartment_id',
        'date'
    ];

    //RELATIONSHIPS

    public function apartment() {

        return $this->belongsTo(Apartment::class);
    }
}
