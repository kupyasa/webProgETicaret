<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use MailchimpMarketing\ApiClient;

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
        Model::unguard();
        Paginator::useBootstrap();

        Gate::define('customer', function (User $user) {
            return ((!($user->is_admin)) && $user->is_active);
        });

        Gate::define('admin', function (User $user) {
            return ($user->is_admin);
        });

        Blade::if('customer', function () {
            return request()->user()?->can('customer');
        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
    }
}
