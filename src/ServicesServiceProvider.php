<?php

namespace QRFeedz\Services;

use Illuminate\Support\Facades\Event;
use QRFeedz\Cube\Events\Users\UserCreated;
use QRFeedz\Foundation\Abstracts\QRFeedzServiceProvider;
use QRFeedz\Services\Listeners\Users\TriggerUserCreatedProcess;

class ServicesServiceProvider extends QRFeedzServiceProvider
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
        Event::listen(
            UserCreated::class,
            [TriggerUserCreatedProcess::class, 'handle']
        );
    }

    protected function overrideResources()
    {
        $this->publishes([
            __DIR__.'/../resources/overrides/' => base_path('/'),
        ], 'qrfeedz-services-overrides');
    }
}
