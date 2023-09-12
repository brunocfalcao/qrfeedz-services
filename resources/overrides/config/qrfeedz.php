<?php

return [

    'system' => [

        /**
         * For each array value, it's a directory that when you run the
         * command qrfeedz:publish, it will publish all the assets from the
         * <package-value>/resources/override to the respective folder that
         * is resources/<package-value>/assets. This way we can publish assets
         * that will then be used in different frontend scenarios.
         */
        'publish' => [
            'qrfeedz-admin',
            'qrfeedz-frontend',
            'qrfeedz-backend',
        ],

        /**
         * Setting to be deprecated. A new logic to detect the domain needs
         * to be created.
         */
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
            'backend' => false,
            'frontend' => false,
            'testing' => true,
        ],

        /**
         * Should QRFeedz send notifications, globally speaking.
         * If it's on, then it will send all possible notifications.
         */
        'allow_notifications' => env('QRFEEDZ_ALLOW_NOTIFICATIONS', false),

        'mails' => [

            /**
             * System emails. No option to reply, like a forgot password
             * notification email.
             */
            'no_reply' => [
                'name' => env('QRFEEDZ_NO_REPLY_EMAIL_NAME'),
                'email' => env('QRFEEDZ_NO_REPLY_EMAIL_MAIL'),
            ],

            /**
             * Transactional email, with the option to reply, like a payment
             * overdue notification.
             */
            'contact' => [
                'name' => env('QRFEEDZ_CONTACT_EMAIL_NAME'),
                'email' => env('QRFEEDZ_CONTACT_EMAIL_MAIL'),
            ],
        ],
    ],
];
