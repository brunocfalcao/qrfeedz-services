<?php

namespace QRFeedz\Services;

use Illuminate\Support\ServiceProvider;
use QRFeedz\Services\Commands\PintCommand;

class ServicesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /*
        $this->commands([
            PintCommand::class
        ]);
        */
    }

    public function register()
    {
        //
    }
}
