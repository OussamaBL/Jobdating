<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Postuler extends Model
{
    
    use HasFactory;
    protected $table='postuler';
    protected $fillable=[
        "user_id","announcement_id",
    ];
    
}



