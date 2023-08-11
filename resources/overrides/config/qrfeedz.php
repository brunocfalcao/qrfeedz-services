<?php

return [

    'system' => [

        'url' => env('QRFEEDZ_URL', 'https://{xxx}.qrfeedz.com'),

        /**
         * No matter in what scenario we are (backend, frontend, etc) we will
         * always load the routes if the value is true. Mostly for testing
         * purposes, in production all keys should be false so the framework
         * will automatically load the right routes given the domain name.
         *
         * REMINDER: You shouldn't have backend and frontend routes loaded
         *           simultaneously.
         */
        'always_route' => [
            'backend' => true,
            'frontend' => false,
            'testing' => true,
        ],

        /**
         * Should QRFeedz send notifications, globally speaking.
         * If it's on, then it will send all possible notifications.
         */
        'allow_notifications' => env('QRFEEDZ_ALLOW_NOTIFICATIONS', false),

        'mails' => [

            'no_reply' => [
                'name' => env('QRFEEDZ_NO_REPLY_EMAIL_NAME'),
                'email' => env('QRFEEDZ_NO_REPLY_EMAIL_MAIL'),
            ],

            'contact' => [
                'name' => env('QRFEEDZ_CONTACT_EMAIL_NAME'),
                'email' => env('QRFEEDZ_CONTACT_EMAIL_MAIL'),
            ],
        ],
    ],
];
