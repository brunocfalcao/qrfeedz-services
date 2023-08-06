<?php

namespace QRFeedz\Services\Utils;

class QRFeedz
{
    public function __construct()
    {
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
            config('qrfeedz.system.url')
        ).'/'.$path;
    }
}