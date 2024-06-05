<?php

namespace YOS\FilamentExcel;

use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class ServiceProvider extends SupportServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'filamentexcel');
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('filamentexcel.php'),
        ], 'config');

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'filament-excel');

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/filament-excel'),
        ]);
    }
}
