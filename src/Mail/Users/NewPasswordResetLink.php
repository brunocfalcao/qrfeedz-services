<?php

namespace QRFeedz\Services\Mail\Users;

use QRFeedz\Cube\Models\User;
use QRFeedz\Foundation\Abstracts\QRFeedzMail;

class NewPasswordResetLink extends QRFeedzMail
{
    public function __construct(User $user)
    {
        $this->notifiable = $user;
        $this->subject = __('qrfeedz::users.password-reset-requested');
        $this->markdown = 'qrfeedz-services::mail.users.password-reset-request';
        $this->data = [];
    }

    public function attachments(): array
    {
        return [];
    }
}
