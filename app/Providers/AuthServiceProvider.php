<?php

namespace App\Providers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define('staf', function ($user) {
            if (auth::user()->role != null) {
                return true;
            }
        });

        Gate::define('lurah', function ($user) {
            if (auth::user()->role == 1) {
                return true;
            }
        });

        Gate::define('admin', function ($user) {
            if (auth::user()->role == 2) {
                return true;
            }
        });

        Gate::define('kaling', function ($user) {
            if (auth::user()->role == 3) {
                return true;
            }
        });
    }
}
