<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Recruteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function register(Request $request){
        // DB::beginTransaction();
        try{

            $registerUserData = $request->validate([
                'name'=>'required|string',
                'email'=>'required|string|email|unique:users',
                'password'=>'required|min:8',
                'role_id'=>'required',
            ]);

            $user = User::create($registerUserData);

           if($user->role_id == 1){

            $dataCandidat=$request->validate([
                'phone'=>'required',
                'adresse'=>'required',
                'bio'=>'required',
                ]);

            $dataCandidat['user_id'] = $user->id;


            $candidat = Candidat::create($dataCandidat);

           }elseif($user->role_id == 2){

            $dataRecruteur=$request->validate([
                'company_name'=>'required',
                'description'=>'required',
            ]);
            $dataRecruteur['user_id'] = $user->id;
            $recruteur = Recruteur::create($dataRecruteur);
           }
           return response()->json([
            'message' => 'User Registered',
            'user' => $user,
            'candidat' => $candidat ?? null,
            'recruteur' => $recruteur ?? null
        ],201);

        }catch(\Exception $e){
            // DB::rollBack();
            return response()->json([
                'message' => 'Error in User Registration',
                'error' => $e->getMessage()
            ],401);
    }
}

    public function login(Request $request){
        $loginUserData = $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|min:8'
        ]);

       if(!$token=Auth::attempt($loginUserData)){
        return response()->json([
            'erreur' => 'email or password incorrect',
        ], 401);
       };

        return response()->json([
            'access_token' =>$token,
            'message'=>'Log in'
        ]);
    }

    public function logout(){
        $token = Auth::logout();

        return response()->json([
          "message"=>"logged out"
        ]);

    }

    public function refresh()
    {
        return response()->json([
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(), //Crée un nouveau token JWT tout en invalidant l’ancien.Cela évite que l'ancien token soit utilisé après son expiration
                'type' => 'bearer',
            ]
        ]);
    }
}
