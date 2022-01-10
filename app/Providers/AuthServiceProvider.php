<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Work;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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
        /**
         * Определить, может ли пользователь создать пост.
         *
         * @param \App\Models\User $user
         * @return bool
         */
        $this->registerPolicies();

        Gate::define('create-work', function (User $user) {
            return $user->role == 'employer';
        });
        Gate::define('delete-work', function (User $user, Work $work) {
            return $user->role == 'employer'&& $work->employer_id==$user->id;
        });
        Gate::define('user-history', function (User $user) {
            return $user->role == 'user';
        });
    }
}
