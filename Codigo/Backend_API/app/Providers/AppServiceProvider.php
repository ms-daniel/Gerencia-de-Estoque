<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Item;
use App\Models\PersonalAccessToken;
use App\Models\Stock;
use App\Models\Store;
use App\Models\Subcategory;
use App\Models\Supplier;
use App\Models\User;

use App\Interfaces\ICategoryService;
use App\Interfaces\IItemService;
use App\Interfaces\IStockService;
use App\Interfaces\IStoreService;
use App\Interfaces\ISubcategoryService;
use App\Interfaces\IUserService;
use App\Interfaces\ISupplierService;

use App\Services\AuthService;
use App\Services\CategoryService;
use App\Services\ItemService;
use App\Services\StockService;
use App\Services\StoreService;
use App\Services\SubcategoryService;
use App\Services\SupplierService;
use App\Services\UserService;


use Laravel\Sanctum\Sanctum;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UserService::class, function($app){
            return new UserService($app->make(User::class));
        });
        $this->app->singleton(StoreService::class, function($app){
            return new StoreService($app->make(Store::class));
        });
        $this->app->singleton(SupplierService::class, function($app){
            return new SupplierService($app->make(Supplier::class));
        });
        $this->app->singleton(ItemService::class, function($app){
            return new ItemService($app->make(Item::class));
        });
        $this->app->singleton(CategoryService::class, function($app){
            return new CategoryService($app->make(Category::class));
        });
        $this->app->singleton(SubcategoryService::class, function($app){
            return new SubcategoryService($app->make(Subcategory::class));
        });
        $this->app->singleton(StockService::class, function($app){
            return new StockService($app->make(Stock::class));
        });
        $this->app->singleton(AuthService::class, function($app){
            return new AuthService();
        });

        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IStoreService::class, StoreService::class);
        $this->app->bind(ISupplierService::class, SupplierService::class);
        $this->app->bind(IItemService::class, ItemService::class);
        $this->app->bind(ICategoryService::class, CategoryService::class);
        $this->app->bind(ISubcategoryService::class, SubcategoryService::class);
        $this->app->bind(IStockService::class, StockService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
