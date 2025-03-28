<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Competence;
use App\Models\Offre;
use App\Policies\CompetencePolicy;
use App\Policies\OffrePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Competence::class => CompetencePolicy::class,
        Offre::class => OffrePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

    }
}
