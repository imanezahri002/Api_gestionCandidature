<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruteur extends Model
{
    use HasFactory;

    protected $fillable=[
        'company_name',
        'description',
        'user_id',
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function offres(){
        return $this->hasMany(Offre::class);
    }

}
