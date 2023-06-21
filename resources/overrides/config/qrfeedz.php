<?php

return [

    'system' => [

        /**
         * Should QRFeedz send notifications, globally speaking.
         * If it's on, then it will send all possible notifications.
         */
        'allow_notifications' => env('QRFEEDZ_ALLOW_NOTIFICATIONS', false),
    ],
];
