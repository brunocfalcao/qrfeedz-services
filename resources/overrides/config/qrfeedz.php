<?php

return [

    'system' => [

        'url' => env('QRFEEDZ_URL', 'https://{xxx}.qrfeedz.com'),

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
