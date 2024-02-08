<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Announcement extends Model
{
   
    public function compagnie()
    {
        return $this->belongsTo(Compagnie::class);
    }
    public function users(){
        return $this->belongsToMany(User::class,'postuler');
    }
    public function skills(){
        return $this->belongsToMany(Skill::class,'announcement_skills');
    }
    
    use HasFactory;
    protected $table='announcements';
    protected $fillable=[
        "id","title","content","image","compagnie_id",
    ];
    
}



