<?php

namespace QRFeedz\Services\Mail\Utils;

use QRFeedz\Cube\Models\User;
use QRFeedz\Foundation\Abstracts\QRFeedzMail;

class TestTemplate extends QRFeedzMail
{
    public function __construct(string $template)
    {
        $this->subject = 'Test email - ' . $template;
        $this->markdown = 'qrfeedz-services::mail.templates.'.$template;
        $this->data = [];
    }

    public function attachments(): array
    {
        return [];
    }
}
