<?php

namespace App\Policies;

use App\Models\Competence;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CompetencePolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */

}
