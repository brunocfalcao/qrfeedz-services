<?php

namespace QRFeedz\Services;

use QRFeedz\Foundation\Abstracts\QRFeedzServiceProvider;

class ServicesServiceProvider extends QRFeedzServiceProvider
{
    public function boot()
    {
        $this->loadViews();
        $this->overrideResources();
        $this->loadTranslations();
        $this->loadRoutes();
    }

    public function register()
    {
        //
    }

    protected function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'qrfeedz-services');
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

    protected function overrideResources()
    {
        $this->publishes([
            __DIR__.'/../resources/overrides/' => base_path('/'),
        ], 'qrfeedz-services-overrides');
    }
}
