<?php

namespace Mamun2074\ENotification\Providers;

use Illuminate\Support\ServiceProvider;

class ENotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/enotification-config.php',
            'enotification-config'
        );

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        if (config('enotification-config.do-migration')) {
            $this->loadMigrationsFrom(__DIR__ . '/../Database/migrations');
        }
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'enotification');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/enotification')
        ], 'enotification-views');

        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('vendor/enotification/assets')
        ], 'enotification-assets');

        $this->publishes([
            __DIR__ . '/../config/enotification-config.php' => config_path('enotification-config.php'),
        ], 'enotification-config');
        $this->publishes([
            __DIR__ . '/../Database/migrations' => database_path('migrations'),
        ], 'enotification-migration');
        $this->publishes([
            __DIR__ . '/../Database/seeders' => database_path('seeders'),
        ], 'enotification-seeder');
    }
}
