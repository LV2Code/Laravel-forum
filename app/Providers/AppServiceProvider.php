<?php

namespace App\Providers;

use View;

use App\Channel;

use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {

        Schema::defaultStringLength(191);

        View::share( 'channels', Channel::all() );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        

    }
}
