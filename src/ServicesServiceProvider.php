<?php

namespace QRFeedz\Services;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use QRFeedz\Cube\Events\Courses\UserCreated;

class ServicesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->overrideResources();
        $this->registerListeners();
    }

    public function register()
    {
        //
    }

    protected function registerListeners()
    {
        /*
        Event::listen(
            UserCreated::class,
            [SendUserCreatedNotification::class, 'handle']
        );
        */
    }

    protected function overrideResources()
    {
        $this->publishes([
            __DIR__.'/../resources/overrides/' => base_path('/'),
        ], 'qrfeedz-services-overrides');
    }
}
