<?php

namespace Arapel\DatabaseExporter;

use Illuminate\Support\ServiceProvider;

class DatabaseExporterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'exporter');
        $this->publishes([
            __DIR__ . '/config.php' => config_path('exporter.php'),
        ]);
        $this->publishes([
            __DIR__ . '/assets' => public_path('assets/exporter'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config.php', 'exporter'
        );
    }
}
