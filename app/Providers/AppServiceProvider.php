<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        'App\Services\Interfaces\UserServiceInterface' => 'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface' => 'App\Repositories\UserRepository',

        'App\Services\Interfaces\UserCatalogueServiceInterface' => 'App\Services\UserCatalogueService',
        'App\Repositories\Interfaces\UserCatalogueRepositoryInterface' => 'App\Repositories\UserCatalogueRepository',

        'App\Repositories\Interfaces\ProvinceRepositoryInterface' => 'App\Repositories\ProvinceRepository',
        'App\Repositories\Interfaces\DistrictRepositoryInterface' => 'App\Repositories\DistrictRepository',

        'App\Services\Interfaces\LanguageServiceInterface' => 'App\Services\LanguageService',
        'App\Repositories\Interfaces\LanguageRepositoryInterface' => 'App\Repositories\LanguageRepository',

        'App\Services\Interfaces\PostCatalogueServiceInterface' => 'App\Services\PostCatalogueService',
        'App\Repositories\Interfaces\PostCatalogueRepositoryInterface' => 'App\Repositories\PostCatalogueRepository',

        'App\Services\Interfaces\PostServiceInterface' => 'App\Services\PostService',
        'App\Repositories\Interfaces\PostRepositoryInterface' => 'App\Repositories\PostRepository',

        'App\Repositories\Interfaces\RouterRepositoryInterface' => 'App\Repositories\RouterRepository',

        'App\Services\Interfaces\PermissionServiceInterface' => 'App\Services\PermissionService',
        'App\Repositories\Interfaces\PermissionRepositoryInterface' => 'App\Repositories\PermissionRepository',
        
    ];


    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach($this->bindings as $key=>$value){
            $this->app->bind($key,$value);
        }
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
