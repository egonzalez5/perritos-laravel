<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['request']->server->set('HTTPS', true);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    /* public function boot(UrlGenerator $url) */
/*     {
        if (env('REDIRECT_HTTPS')) {
            $url->formatScheme('https://');
        }
    } */

    public function boot(UrlGenerator $url)
    {
        if (config('app.force_https')) {
            $url->forceScheme('https');
        }
    }
}
