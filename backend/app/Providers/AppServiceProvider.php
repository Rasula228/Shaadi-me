<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Railway terminates SSL at its load balancer and proxies HTTP to the app.
        // Force HTTPS so all generated URLs (assets, routes) use the correct scheme.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
