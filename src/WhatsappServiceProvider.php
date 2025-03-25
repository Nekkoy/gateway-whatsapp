<?php

namespace Nekkoy\GatewayWhatsapp;

use Illuminate\Support\ServiceProvider;

/**
 *
 */
class WhatsappServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\Nekkoy\GatewayWhatsapp\Services\GatewayService::class, function ($app) {
            return new \Nekkoy\GatewayWhatsapp\Services\GatewayService();
        });

        $this->app->singleton('gateway-whatsapp', function ($app) {
            return new \Nekkoy\GatewayWhatsapp\Services\GatewayWhatsappService();
        });
    }

    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('gateway-whatsapp.php')], 'config');
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'gateway-whatsapp');
    }
}
