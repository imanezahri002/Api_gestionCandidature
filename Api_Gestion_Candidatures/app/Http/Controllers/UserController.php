<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOffreRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function update(Request $request){

        $user=$request->user();
        // return $user;
        $validated=$request->validate([
            'name'=> 'sometimes',
            'email'=> ['sometimes','email',Rule::unique('users')->ignore($user->id)],
            'password'=>'sometimes',
        ]);

        $user->update($validated);

        return $user;
    }


}
