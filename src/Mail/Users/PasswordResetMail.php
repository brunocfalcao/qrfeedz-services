<?php

namespace QRFeedz\Services\Mail\Users;

use QRFeedz\Cube\Models\User;
use QRFeedz\Foundation\Abstracts\QRFeedzMail;

class PasswordResetMail extends QRFeedzMail
{
    public function __construct(User $user, array $data = [])
    {
        $this->subject = __('qrfeedz::users.password_request.subject').'!';
        $this->preview = 'Password reset requested';
        $this->markdown = 'qrfeedz-services::mail.users.password-reset-requested';

        parent::__construct($user, $data);
    }

    public function attachments(): array
    {
        return [];
    }
}
