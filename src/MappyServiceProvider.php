<?php

namespace Scopefragger\Mappy;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Scopefragger\Mappy\Commands\PurgeCommand;
use Scopefragger\Mappy\Controllers\AppController;

/**
 * Class MappyServiceProvider
 *
 * Binds required resources to the application
 * - Routes
 * - Migrations
 * - Commands
 * - Config file
 *
 * @package Scopefragger\Mappy
 */
class MappyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        if ($this->app->runningInConsole()) {
            $this->commands([
                PurgeCommand::Class
            ]);
        }

        $this->publishes([
            __DIR__.'/Config/config.php' => config_path('mappy.php'),
        ],'mappy');
    }
}
