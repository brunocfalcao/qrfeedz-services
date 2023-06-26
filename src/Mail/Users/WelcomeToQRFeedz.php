<?php

namespace QRFeedz\Services\Mail\Users;

use QRFeedz\Foundation\Abstracts\QRFeedzMail;

class WelcomeToQRFeedz extends QRFeedzMail
{
    public function __construct()
    {
        $this->subject = 'This is a test mail';
        $this->markdown = 'qrfeedz-services::mail.users.welcome-to-qrfeedz';
    }

    public function attachments(): array
    {
        return [];
    }
}
