<?php

namespace Sandy\ApiResponse;

use Illuminate\Support\ServiceProvider;

class ApiResponseServiceProvider extends ServiceProvider
{


    public function register()
    {

        $this->app->singleton('api-response', function ($app) {
            return new ApiResponse();
        });
        $this->mergeConfigFrom(
            __DIR__ . '/config/api-response.php',
            'api-response'
        );
    }

    public function boot()
    {
        // Optional: Publish configuration file

        $this->publishes([
            __DIR__ . '/config/api-response.php' => config_path('api-response.php'),
        ]);
    }
}
