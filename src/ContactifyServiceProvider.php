<?php

namespace Onwuasoanya\Contactify;

use Illuminate\Support\Facades\Blade;
use  \Illuminate\Support\ServiceProvider;

class ContactifyServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->publishes([
            __DIR__ . "/config/contactify.php" => config_path('contactify.php')
        ]);
        $this->loadRoutesFrom(__DIR__ . "/routes/web.php");
        $this->loadViewsFrom(__DIR__ . "/views", "contactify");
        $this->loadMigrationsFrom(__DIR__ . "/database/migrations");

        // Register blade directives
        $this->bladeDirectives();
    }

    public function register()
    {

    }

    /**
     * Register the blade directives
     *
     * @return void
     */
    private function bladeDirectives()
    {
        // Call to Entrust::hasRole
        Blade::directive('contactifyEmbed', function () {
            return Blade::compileString(file_get_contents(__DIR__ . "/views/embed.blade.php"));
        });


        Blade::directive('contactifyFloatingButton', function () {
            return Blade::compileString(file_get_contents(__DIR__ . "/views/floating_button_for_modal.blade.php"));
        });
    }


}

?>