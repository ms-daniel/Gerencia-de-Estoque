<?php

namespace App\Providers;

use App\Interfaces\IUsersProfileService;
use App\Services\UsersProfileService;
use App\Models\UsersProfile;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UsersProfileService::class, function($app){
            return new UsersProfileService($app->make(UsersProfile::class));
        });

        $this->app->bind(IUsersProfileService::class, UsersProfileService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
