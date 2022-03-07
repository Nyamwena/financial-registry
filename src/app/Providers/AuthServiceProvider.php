<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('logged-in', function($user){
            return $user;
        });

        Gate::define('is-admin', function($user){
            return $user->hasAnyRole('Admin');
        });

        Gate::define('is-bursar', function($user){
            return $user->hasAnyRoles(['Bursar','Admin']);
        });

        Gate::define('is-chief', function($user){
            return $user->hasAnyRoles(['Chief Accountant','Admin']);
        });
        Gate::define('is-clerk', function($user){
            return $user->hasAnyRoles(['Clerk','Admin']);
        });
        Gate::define('is-registrar', function($user){
            return $user->hasAnyRoles(['Registrar','Admin']);
        });
    }
}
