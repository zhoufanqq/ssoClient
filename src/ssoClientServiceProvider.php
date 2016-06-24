<?php

namespace zhoufanqq\ssoClient;

use Illuminate\Support\ServiceProvider;

class ssoClientServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/route/routes.php';
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['ssoClient'] = $this->app->share(function ($app) {
            return new ssoClient();
        });
    }
}