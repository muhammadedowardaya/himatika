<?php

namespace App\Providers;

use App\Models\{User, Post};
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // Gate::define('admin', function (User $user) {
        //     return $user->is_admin;
        // });

        // Gate::define('user', function (User $user, Post $post) {
        //     return $user->id === $post->user_id;
        // });
    }
}