<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate as FacadesGate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();
        // Gate::define('ticket_delete', fn(User $user) => $user->isAdmin);

        Gate::define('users/tickets', function (User $user) {
            return $user->isAdmin
                        ? Response::allow()
                        : Response::deny('You must be an administrator.');
        });
    }
}
