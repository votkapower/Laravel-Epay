<?php

namespace Kondov\EpayWrapper;

use Illuminate\Support\ServiceProvider;
use Kondov\EpayWrapper\Helpers\EpayHelper;

class EpayWrapperServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //Bind the ePay helper class to the service container
        $this->app->bind('ePay', function() {
            return new EpayHelper();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {

        //load the routes file
        require __DIR__ . '/Http/routes.php';

        //define the path for the view files
        $this->loadViewsFrom(__DIR__ . '/../views', 'epay');

        //Set the paths to the config file
        $this->publishes([
            __DIR__ . '/../config.php' => config_path('config.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../config.php', 'config'
        );
    }
}