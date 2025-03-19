<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{

    use HasFactory;
    protected $fillable=[
        'phone',
        'adresse',
        'bio',
        'user_id',
    ];
    
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function offres(){
        return $this->belongsToMany(Offre::class,'postulations');
    }

    public function competences(){
        return $this->belongsToMany(Competence::class,'user_competences');
    }


}
