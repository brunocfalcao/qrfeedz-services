<?php

namespace QRFeedz\Services\Utils;

use Brunocfalcao\LaravelHelpers\Utils\DomainPatternIdentifier;

class QRFeedz
{
    public function __construct()
    {
        //
    }

    public function inFrontend()
    {
        return $this->context() == 'frontend';
    }

    public function inBackend()
    {
        return $this->context() == 'backend';
    }

    public function inAdmin()
    {
        return $this->context() == 'admin';
    }

    public function inLandingPage()
    {
        return $this->context() == 'landing-page';
    }

    public function context()
    {
        $subdomain = DomainPatternIdentifier::parseUrl()['subdomain'];

        switch ($subdomain) {
            case null:
                return 'landing-page';

            case 'admin':
                return 'admin';

            case 'backend':
                return 'backend';

            case 'qrcode':
                return 'frontend';
        }
    }

    public static function hasValidSessionId()
    {
        return true;
    }

    /**
     * The url, is a dynamic url return given the chosen context you prefer.
     * It replaces the subdomain on a fixed configurable url.
     *
     * @param  string  $path The path after the domain name
     * @param  string  $subdomain The domain if different from www
     * @return string
     */
    public function customURL(string $path, string $subdomain = 'www')
    {
        return str_replace(
            '{xxx}',
            $subdomain,
            request()->getHost()
        ).'/'.$path;
    }
}
