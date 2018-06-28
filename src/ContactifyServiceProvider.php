<?php

namespace Onwuasoanya\Contactify;

use  \Illuminate\Support\ServiceProvider;

class ContactifyServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__. "/routes/web.php");
        $this->loadViewsFrom(__DIR__."/views", "contactify");
    }

    public function register()
    {
        
    }
}

?>