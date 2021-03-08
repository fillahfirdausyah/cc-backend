<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\ShowroomPolicy;
use Laravel\Passport\Passport;
use App\Models\CommentMerchandise;
use App\Models\CommentBengkel;
use App\Models\Merchandise;
use App\Models\Bengkel;
use App\Models\User;
use App\Models\SR;

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

        Gate::define('ud-sr', function (User $user, SR $sr) {
            return $user->id === $sr->user_id;
        });

        Gate::define('ud-bengkel', function (User $user, Bengkel $bengkel) {
            return $user->id === $bengkel->user_id;
        });

        Gate::define('ud-merchan', function (User $user, Merchandise $merchandise) {
            return $user->id === $merchandise->user_id;
        });     

        Gate::define('delcommer', function (User $user, Merchandise $merchandise) {
            return $user->id === $merchandise->comment->user_id;
        });   
    }
}
