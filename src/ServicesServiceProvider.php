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
        $this->loadViews();
        $this->overrideResources();
        $this->registerListeners();
        $this->loadTranslations();
        $this->loadRoutes();
    }

    public function register()
    {
        //
    }

    protected function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'qrfeedz');
    }

    protected function loadRoutes()
    {
        $this->loadRoutesFrom(
            __DIR__.'/../routes/services.php'
        );
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
