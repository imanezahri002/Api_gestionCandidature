<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\User;
use Illuminate\Http\Request;

class PostulationController extends Controller
{
    public function store(Request $request){

            $request->validate([
                    'cv'=>'file|required',
                    'offre_id'=>'required|exists:offres,id',
                    'user_id'=>'required|exists:users,id',
            ]);

        $cv=$request->file('cv')->store('cvS');

        $user=User::find($request->user_id);

        $offre = Offre::find($request->offre_id);

        if ($user->postulations()->where('offre_id', $offre->id)->exists()) {
            return response()->json(['message' => 'Vous avez déjà postulé à cette offre'], 400);
        }
        $user->postulations()->attach($offre->id, ['CV' => $cv]);

        return response()->json(['message' => 'added'], 201);

    }

}
