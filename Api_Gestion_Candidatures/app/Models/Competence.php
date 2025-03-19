<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
    ];
    public function userCompetences(){
        return $this->belongsToMany(Competence::class,'user_competences');
    }
}
