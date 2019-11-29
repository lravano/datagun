<?php

namespace Made\Datagun;

use Illuminate\Support\ServiceProvider;

class DatagunServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__.'/config/datagun.php' => config_path('datagun.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(){
       
        $this->app->bind('datagun_client',function() {
            return new \Made\Datagun\DatagunClient(config('datagun.server'),config('datagun.timeout'));
        });
        
    }
}
