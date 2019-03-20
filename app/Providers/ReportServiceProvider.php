<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ReportServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // 注册 Api接口
        $this->app->singleton('Report',function($app) {
            return new \App\Services\Report\Report();
        });

        $this->app->singleton('Report\Api',function($app) {
            return new \App\Services\Report\Api($app['config']['report']);
        });
    }
}
