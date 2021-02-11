<?php

namespace App\Providers;

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
        // Models
        $this->app->bind('Album', function ($app) {
            return new \App\Models\Album;
        });
        $this->app->bind('Photo', function ($app) {
            return new \App\Models\Photo;
        });
        $this->app->bind('User', function ($app) {
            return new \App\Models\User;
        });
        // Services
        $this->app->bind('AlbumService', function ($app) {
            return new \App\Services\AlbumService;
        });
        $this->app->bind('PhotoService', function ($app) {
            return new \App\Services\PhotoService;
        });
        $this->app->bind('UserService', function ($app) {
            return new \App\Services\UserService;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
