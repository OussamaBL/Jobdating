<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Announcement_Skill extends Model
{
    
    use HasFactory;
    protected $table='announcement_skills';
    protected $fillable=[
        "announcement_id","skill_id",
    ];
    
}



