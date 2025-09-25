<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SettingsService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SettingsService::class, function ($app) {
            return new SettingsService();
        });
    }

    public function boot(): void
    {
        // Share settings with all views (optional)
        view()->composer('*', function ($view) {
            $view->with('settings', app(SettingsService::class)->all());
        });
    }
}