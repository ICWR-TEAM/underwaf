<?php

namespace Icwrtech\Underwaf;

/*


    Author : Ahmad Dwiyan <ahmad.dwiyan14@gmail.com>
    
    Organization : ICWR - TECH Research And Development

    License : MIT


*/
    

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;


class UnderwafLaravelProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/FirewallConfig.php','underwaf');
        Route::aliasMiddleware('underwaf','Icwrtech\Underwaf\UnderwafLaravel');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     **/

    public function boot()
    {
        
        $this->publishes([
            __DIR__.'/Config/FirewallConfig.php'=>config_path('FirewallConfig.php')
        ],'config');

        $this->loadViewsFrom(__DIR__.'/views', 'underwaf');

    }
}
