<?php

namespace QRFeedz\Services\Notifications\Users;

use QRFeedz\Foundation\Abstracts\QRFeedzNotification;
use QRFeedz\Services\Mail\Users\PasswordRequestLink;

class NewPasswordResetLink extends QRFeedzNotification
{
    public function toMail(object $notifiable)
    {
        return (new PasswordRequestLink($notifiable))
               ->from('me@brunofalcao.dev')
               ->to('bruno.falcao@live.com');
    }
}
