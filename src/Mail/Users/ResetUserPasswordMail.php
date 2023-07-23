<?php

namespace QRFeedz\Services\Mail\Users;

use QRFeedz\Cube\Models\User;
use QRFeedz\Foundation\Abstracts\QRFeedzMail;

class ResetUserPasswordMail extends QRFeedzMail
{
    public function __construct(User $user, array $data = [])
    {
        $this->localFilename = 'reset-user-password';
        $this->markdown = 'qrfeedz-services::mail.users.reset-user-password';

        parent::__construct($user, $data);
    }

    public function attachments(): array
    {
        return [];
    }
}
