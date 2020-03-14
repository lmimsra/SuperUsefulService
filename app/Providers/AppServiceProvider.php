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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // アクセスがhttpsの時の混在コンテンツ対策
        if (request()->isSecure()) {
            \URL::forceScheme('https');
        }
    }
}
