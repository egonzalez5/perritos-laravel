<?php

namespace App\Providers;

use Iluminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
/* use Illuminate\Routing\UrlGenerator; */

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
/*     if (env('REDIRECT_HTTPS')) {
        $this->app['request']->server->set('HTTPS', true);
    } */
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
    public function boot() 
    {
        if (env(key: 'APP_ENV') !== 'local') {
            URL::forceScheme(scheme: 'https');
        }
    }
}
