<?php

namespace App\Providers;

use App\Interfaces\IStoreService;
use App\Interfaces\IUsersProfileService;
use App\Interfaces\ISupplierService;

use App\Services\UsersProfileService;
use App\Services\StoreService;
use App\Services\SupplierService;

use App\Models\Supplier;
use App\Models\Store;
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
        $this->app->singleton(StoreService::class, function($app){
            return new StoreService($app->make(Store::class));
        });
        $this->app->singleton(SupplierService::class, function($app){
            return new SupplierService($app->make(Supplier::class));
        });

        $this->app->bind(IUsersProfileService::class, UsersProfileService::class);
        $this->app->bind(IStoreService::class, StoreService::class);
        $this->app->bind(ISupplierService::class, SupplierService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
