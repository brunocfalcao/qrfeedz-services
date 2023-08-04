<?php

namespace QRFeedz\Services;

class DomainPatternIdentifier
{
    public static function parts($url)
    {
        $parsedUrl = parse_url($url);

        // Extract the scheme (http or https)
        $httpType = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] : null;

        // Extract the subdomain using the existing subdomain() method
        $subdomain = self::subdomain($url);

        // Extract the domain (without subdomain)
        $domain = isset($parsedUrl['host']) ? self::extractDomain($parsedUrl['host']) : null;

        // Extract the port number
        $port = isset($parsedUrl['port']) ? $parsedUrl['port'] : null;

        // Extract the path
        $path = isset($parsedUrl['path']) ? self::extractPath($parsedUrl['path']) : null;

        return [
            'http_type' => $httpType,
            'subdomain' => $subdomain,
            'domain' => $domain,
            'port' => $port,
            'path' => $path,
        ];
    }

    public static function subdomain($url)
    {
        $host = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';

        // Split the host into parts
        $hostParts = explode('.', $host);
        $numParts = count($hostParts);

        // Handle scenarios with port numbers
        $domainParts = explode(':', $hostParts[0]);
        $subdomain = $domainParts[0];

        if ($numParts > 2) {
            // Handle subdomains
            for ($i = 1; $i < $numParts - 2; $i++) {
                $subdomain = $hostParts[$i] . '.' . $subdomain;
            }
        } elseif ($numParts == 2 && strpos($host, '.') !== false) {
            // Handle single-word hostnames
            $subdomain = null;
        }

        return $subdomain;
    }

    public static function extractDomain($host)
    {
        $hostParts = explode('.', $host);

        // Handle scenarios with port numbers
        $domainParts = explode(':', $hostParts[0]);

        return $domainParts[0];
    }

    public static function extractPath($path)
    {
        // Remove query parameters from the path
        $pathParts = explode('?', $path);
        return $pathParts[0];
    }
}
