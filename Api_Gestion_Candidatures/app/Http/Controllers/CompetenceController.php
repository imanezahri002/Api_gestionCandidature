<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Http\Requests\StoreCompetenceRequest;
use App\Http\Requests\UpdateCompetenceRequest;
use App\Models\Candidat;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Mockery\Expectation;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{

            $user = $request->user();
            $candidat=$user->candidats;
            $competences= $candidat->competences;

        }catch(Exception $e){
            return response()->json([
                'error' => $e
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $competences,
        ],200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompetenceRequest $request)
    {
        //################################
        $condidat = $request->candidate_id;

        $this->authorize('create', Competence::class);


        $validationCompetence =  $request->validated();
        $CompetenceList = explode(',',$validationCompetence['name']);
        $competenceWithId = [];
        foreach ($CompetenceList as $Competence) {
            $ifExists = Competence::where('name' ,$Competence)->pluck('id')->first();
            if($ifExists){
                $competenceWithId[] = $ifExists;
            }else{
                $newCompetence = Competence::create([
                    "name" => $Competence
                ])->pluck('id');
                $competenceWithId[] = $newCompetence;
            }
        }
        $condidat = Candidat::find($condidat);
        $condidat->competences()->sync($competenceWithId);
        return response()->json([
            'success' => true,
            'message' => 'Competences assigned successfully',
            'data' => $competenceWithId
        ], 201);


    }

    /**
     * Display the specified resource.
     */
    public function show(Competence $competence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competence $competence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competence $competence)
    {
        try {
            $user = request()->user();
            $candidat = $user->candidats;

            $competenceNames = explode(',', request()->name);
            $competencesToDetach = Competence::whereIn('name', $competenceNames)->get();

            foreach ($competencesToDetach as $competence) {
            $candidat->competences()->detach($competence->id);
            }

            return response()->json([
            'success' => true,
            'message' => 'Competences detached successfully',
            'data' => $competencesToDetach
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
            'success' => false,
            'message' => 'Failed to detach competences',
            'error' => $e->getMessage()
            ], 500);
        }
    }
}
