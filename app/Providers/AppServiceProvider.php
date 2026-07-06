<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Services\SettingsService;
use App\Models\Booking;
use App\Models\Review;
use App\Policies\BookingPolicy;
use App\Policies\ReviewPolicy;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        Gate::policy(Booking::class, BookingPolicy::class);
        Gate::policy(Review::class, ReviewPolicy::class);

        view()->composer('*', function ($view) {
            $view->with('settings', app(SettingsService::class)->all());
        });
    }
}