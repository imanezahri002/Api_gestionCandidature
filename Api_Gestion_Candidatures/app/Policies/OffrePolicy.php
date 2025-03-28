<?php

namespace App\Policies;

use App\Models\Offre;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OffrePolicy
{


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Offre $offre): bool
    {
        return $user->recruteurs->id == $offre->recruteur_id;


    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Offre $offre): bool
    {
        return $user->recruteurs->id == $offre->recruteur_id;
    }


}
