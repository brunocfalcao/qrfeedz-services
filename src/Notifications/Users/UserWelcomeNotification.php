<?php

namespace QRFeedz\Services\Notifications\Users;

use QRFeedz\Foundation\Abstracts\QRFeedzNotification;
use QRFeedz\Services\Mail\Users\WelcomeToQRFeedz;

class UserWelcomeNotification extends QRFeedzNotification
{
    public function toMail(object $notifiable, string $resetLink)
    {
        return (new WelcomeToQRFeedz($notifiable, $resetLink))
               ->from('me@brunofalcao.dev')
               ->to('bruno.falcao@live.com');
    }
}
