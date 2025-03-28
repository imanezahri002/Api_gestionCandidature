<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'company_name',
        'location',
        'salary',
        'employment_type',
        'experience_level',
        'required_skills',
        'deadline',
        'is_active',
        'image',
        'recruteur_id',
    ];

    public function candidats(){
        return $this->belongsToMany(Candidat::class,'postulations');
    }

    public function recruteurs(){
        return $this->belongsTo(Recruteur::class);
    }





}
