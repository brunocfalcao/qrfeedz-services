<?php

namespace QRFeedz\Services;

use Illuminate\Console\Scheduling\Schedule;
use QRFeedz\Foundation\Abstracts\QRFeedzServiceProvider;
use QRFeedz\Services\Jobs\System\CleanLogs;
use QRFeedz\Services\Utils\QRFeedz;

class ServicesServiceProvider extends QRFeedzServiceProvider
{
    public function boot(Schedule $schedule)
    {
        // Schedule regular-executed jobs.
        $schedule->job(new CleanLogs)->daily();

        $this->loadViews();
        $this->overrideResources();
        $this->loadTranslations();
    }

    public function register()
    {
        $this->app->bind('services-qrfeedz', function ($app) {
            return new QRFeedz();
        });
    }

    protected function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'qrfeedz-services');
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
