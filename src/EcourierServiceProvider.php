<?php

namespace Codeboxr\EcourierCourier;

use Illuminate\Support\ServiceProvider;
use Codeboxr\EcourierCourier\Apis\AreaApi;
use Codeboxr\EcourierCourier\Manage\Manage;
use Codeboxr\EcourierCourier\Apis\StoreApi;
use Codeboxr\EcourierCourier\Apis\OrderApi;

class EcourierServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . "/../config/ecourier.php" => config_path("ecourier.php")
        ]);
    }

    /**
     * Register application services
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/ecourier.php", "ecourier");

        $this->app->bind("ecourier", function () {
            return new Manage(new AreaApi(), new StoreApi(), new OrderApi());
        });
    }

}
