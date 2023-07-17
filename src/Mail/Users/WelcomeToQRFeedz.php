<?php

namespace QRFeedz\Services\Mail\Users;

use QRFeedz\Cube\Models\User;
use QRFeedz\Foundation\Abstracts\QRFeedzMail;

class WelcomeToQRFeedz extends QRFeedzMail
{
    public function __construct(User $user)
    {
        $this->notifiable = $user;
        $this->subject = __('qrfeedz::users.onboard.subject') .'!';
        $this->preview = 'We are happy to have you onboard';
        $this->markdown = 'qrfeedz-services::mail.users.welcome';
        $this->data = [
            'header' => 'QRFeedz2'
        ];
    }

    public function attachments(): array
    {
        return [];
    }
}
