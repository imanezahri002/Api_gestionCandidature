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
        'user_id',
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function postulations(){
        return $this->belongsToMany(User::class,'postulations');
    }

}
