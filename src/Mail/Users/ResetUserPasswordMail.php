<?php

namespace QRFeedz\Services\Mail\Users;

use QRFeedz\Cube\Models\User;
use QRFeedz\Foundation\Abstracts\QRFeedzMail;

class ResetUserPasswordMail extends QRFeedzMail
{
    public function __construct(User $user, array $data = [])
    {
        // The locale filename. The locale itself is given from the user locale.
        $this->localePrefix = 'reset-user-password.email-reset-password-requested';

        // The markdown file. No need to use the 'qrfeedz-services::' prefix.
        $this->markdown = 'mail.users.reset-user-password';

        parent::__construct($user, $data);
    }

    public function attachments(): array
    {
        return [];
    }
}
