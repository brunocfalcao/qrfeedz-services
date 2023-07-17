<?php

namespace QRFeedz\Services\Notifications\Users;

use QRFeedz\Foundation\Abstracts\QRFeedzNotification;
use QRFeedz\Services\Mail\Users\WelcomeToQRFeedz;

class UserWelcomeNotification extends QRFeedzNotification
{
    public $resetLink;

    public function __construct(string $resetLink)
    {
        $this->resetLink = $resetLink;
    }

    public function toMail(object $notifiable)
    {
        return (new WelcomeToQRFeedz($notifiable, ['url' => $this->resetLink]))
               ->from('me@brunofalcao.dev')
               ->to('bruno.falcao@live.com');
    }
}
