<?php

namespace QRFeedz\Services;

use Illuminate\Support\Facades\Event;
use QRFeedz\Cube\Events\Users\UserCreated;
use QRFeedz\Foundation\Abstracts\QRFeedzServiceProvider;
use QRFeedz\Services\Listeners\Users\TriggerUserCreationProcess;

class ServicesServiceProvider extends QRFeedzServiceProvider
{
    public function boot()
    {
        $this->overrideResources();
        $this->registerListeners();
        $this->loadViews();
    }

    public function register()
    {
        //
    }

    protected function loadViews()
    {
        $this->loadViewsFrom(
            __DIR__.'/../resources/views',
            'qrfeedz-services'
        );
    }

    protected function registerListeners()
    {
        Event::listen(
            UserCreated::class,
            [TriggerUserCreationProcess::class, 'handle']
        );
    }

    protected function overrideResources()
    {
        $this->publishes([
            __DIR__.'/../resources/overrides/' => base_path('/'),
        ], 'qrfeedz-services-overrides');
    }
}
