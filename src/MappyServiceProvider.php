<?php

namespace scopefragger\mappy;


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use scopefragger\mappy\Commands\MappyCommands;
use scopefragger\mappy\Controllers\AppController;

class MappyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        if ($this->app->runningInConsole()) {
            $this->commands([
                MappyCommands::Class
            ]);
        }

        if (!Schema::hasTable('mytable')) {
            Artisan::call('migrate');
        }

        $this->publishes([
            __DIR__.'/Config/config.php' => config_path('mappy.php'),
        ],'mappy');
    }
}
