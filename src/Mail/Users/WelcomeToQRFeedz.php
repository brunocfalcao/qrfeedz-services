<?php

namespace QRFeedz\Services\Mail\Users;

use QRFeedz\Foundation\Abstracts\QRFeedzMail;

class WelcomeToQRFeedz extends QRFeedzMail
{
    public function __construct()
    {
        $this->subject = 'This is a test mail';
        $this->markdown = 'qrfeedz-services::mail.users.welcome-to-qrfeedz';
        $this->data = [
                        'url' => 'http://example.com',
                        'buttonText' => 'Visit our website',
                        'tableData' => [
                            ['First row', 'Data'],
                            ['Second row', 'More data'],
                            ['Third row', 'Even more data'],
                        ],
                    ];
    }

    public function attachments(): array
    {
        return [];
    }
}
