<?php

namespace Onwuasoanya\Contactify;

use  \Illuminate\Support\ServiceProvider;

class ContactifyServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__."/config/contactify.php" => config_path('contactify.php')
        ]);
        $this->loadRoutesFrom(__DIR__. "/routes/web.php");
        $this->loadViewsFrom(__DIR__."/views", "contactify");
        $this->loadMigrationsFrom(__DIR__."/database/migrations");
    }

    public function register()
    {
        
    }
}

?>