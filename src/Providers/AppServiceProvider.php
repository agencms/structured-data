<?php

namespace Agencms\StructuredData\Providers;

use Agencms\Core\Facades\Agencms;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Agencms\StructuredData\StructuredData;
use Illuminate\Support\Facades\Route as Router;
use Silvanite\Brandenburg\Traits\ValidatesPermissions;

class AppServiceProvider extends ServiceProvider
{
    use ValidatesPermissions;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadMigrationsFrom(__DIR__.'/../database/Migrations');

        $this->publishes([
            __DIR__.'/../config/agencms-structured-data.php' => config_path('agencms-structured-data.php'),
        ]);

        $this->bootViews();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/agencms-structured-data.php', 'agencms-structured-data');

        $this->registerFacades();
        $this->registerPermissions();
    }

    /**
     * Load Agencms views used for rendering content
     *
     * @return void
     */
    private function bootViews()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'agencms');
        $this->publishes([
            __DIR__.'/../views' => resource_path('views/vendor/agencms'),
        ], 'views');
    }

    /**
     * Register default package related permissions
     *
     * @return void
     */
    private function registerPermissions()
    {
        collect([
            'structured_data_create',
            'structured_data_read',
            'structured_data_update',
            'structured_data_delete',
        ])->map(function ($permission) {
            Gate::define($permission, function ($user) use ($permission) {
                if ($this->nobodyHasAccess($permission)) {
                    return true;
                }

                return $user->hasRoleWithPermission($permission);
            });
        });
    }

    /**
     * Register facades
     *
     * @param string $IoC name of the container
     * @return void
     */
    private function registerFacades()
    {
        $this->app->bind('agencms-structured-data', function () {
            return new StructuredData;
        });
    }
}
