<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidat;
class Competence extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
    ];
    public function candidats(){
        return $this->belongsToMany(Candidat::class,'user_competences');
    }
}
