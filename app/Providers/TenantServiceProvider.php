<?php

namespace App\Providers;

use App\Console\Commands\Tenant\Migrate;
use App\Console\Commands\Tenant\MigrateRollback;
use App\Console\Commands\Tenant\Seed;
use App\Tenant\Cache\TenantCacheManager;
use App\Tenant\Database\DatabaseManager;
use App\Tenant\Manager;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;


class TenantServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Manager::class, function() {
            return new Manager();
        });

        Request::macro('tenant', function($uuid = null) {
            if(isset($uuid)) {
                return app(Manager::class)->isTenant($uuid);
            }
            return app(Manager::class)->getTenant();
        });

        // blade

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Migrate::class, function($app) {
           return new Migrate($app->make('migrator'), $app->make(DatabaseManager::class));
        });

        $this->app->singleton(MigrateRollback::class, function($app) {
            return new MigrateRollback($app->make('migrator'), $app->make(DatabaseManager::class));
        });

        $this->app->singleton(Seed::class, function($app) {
            return new Seed($app->make('db'), $app->make(DatabaseManager::class));
        });

        $this->app->extend('cache', function() {
            return new TenantCacheManager($this->app);
        });
    }
}
