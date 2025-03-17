<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Http\Requests\UpdateOffreRequest;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offres=Offre::all();
        return $offres;

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'company_name'=>'required',
            'location'=>'required',
            'salary'=>'required',
            'employment_type'=>'required',
            'experience_level'=>'required',
            'required_skills'=>'required',
            'deadline'=>'required',
            'is_active'=>'required',
            'image'=>'required',
            'user_id' => 'required',

        ]);
        Offre::create($validated);
        return 'offre ajoutée avec succes';
    }

    /**
     * Display the specified resource.
     */
    public function show(Offre $offre)
    {
        return $offre;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offre $offre)
    {
        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'company_name'=>'required',
            'location'=>'required',
            'salary'=>'required',
            'employment_type'=>'required',
            'experience_level'=>'required',
            'required_skills'=>'required',
            'deadline'=>'required',
            'is_active'=>'required',
            'image'=>'required',
            'user_id' => 'required',


        ]);
        $offre->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offre $offre)
    {
        $offre->delete();
    }
}
