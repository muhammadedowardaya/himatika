<?php

namespace App\Providers;

use App\Models\{User, Post};
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
        'App\Models\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('admin', function (User $user) {
        //     return $user->is_admin;
        // });

        // Gate::define('user', function (User $user, Post $post) {
        //     return $user->id === $post->user_id;
        // });
    }
}