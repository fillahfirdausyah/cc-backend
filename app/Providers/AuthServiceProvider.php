<?php

namespace App\Providers;

use App\Policies\ShowroomPolicy;
use App\Models\SR;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        SR::class => ShowroomPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Gate::define('Update-sr', function (User $user, SR $sr) {
            return $user->id === $sr->user_id;
        });

        Gate::define('Create-sr', function (User $user) {
            return $user->role === 'penjual';
        });
    }
}
