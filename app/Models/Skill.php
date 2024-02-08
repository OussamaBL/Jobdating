<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Announcement;
use App\Models\User;

class Skill extends Model
{
    use HasFactory;
    protected $table='skills';
    protected $fillable=[
        "name"
    ];

    public function users(){
        return $this->belongsToMany(User::class,'users_skills');
    }
    public function announcements(){
        return $this->belongsToMany(Announcement::class,'announcement_skills');
    }
    

    
    
}
