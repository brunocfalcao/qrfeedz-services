<?php

namespace QRFeedz\Services\Mail\Users;

use QRFeedz\Cube\Models\User;
use QRFeedz\Foundation\Abstracts\QRFeedzMail;

class WelcomeToQRFeedz extends QRFeedzMail
{
    public function __construct(User $user)
    {
        $this->notifiable = $user;
        $this->subject = 'This is a test mail';
        $this->markdown = 'qrfeedz-services::mail.users.welcome';
        $this->data = [];
    }

    public function attachments(): array
    {
        return [];
    }
}
