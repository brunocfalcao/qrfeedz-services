<?php

namespace QRFeedz\Services\Facades;

use Illuminate\Support\Facades\Facade;

class QRFeedz extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'services-qrfeedz';
    }
}
