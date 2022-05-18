<?php

namespace Akkurateio\LaravelPostman;

use Akkurateio\LaravelPostman\app\Console\Commands\PostmanGenerate;
use Illuminate\Support\ServiceProvider;


class LaravelPostmanServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/postman.php' => config_path('postman.php'),
            ], 'postman-config');
        }

        $this->commands(PostmanGenerate::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/postman.php', 'postman'
        );
    }
}