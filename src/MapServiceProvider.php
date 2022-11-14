<?php

namespace Jmnn\Map;

use Illuminate\Support\ServiceProvider;

class MapServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('j-map',function () {
            return new Map();
        });
    }

    public function boot()
    {
    }
}
