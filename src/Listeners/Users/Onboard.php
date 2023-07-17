<?php

namespace QRFeedz\Services\Listeners\Users;

use Illuminate\Contracts\Queue\ShouldQueue;
use QRFeedz\Cube\Events\Users\UserCreated;
use QRFeedz\Services\Notifications\Users\UserWelcomeNotification;

class Onboard implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(UserCreated $event)
    {
        /** ---------- USER ONBOARDING WORKFLOW ----------
         *
         * 1. Create a password reset link.
         * 2. Send a welcome + reset password notification email.
         **/
        $resetPasswordLink = $event->user->getPasswordResetLink(true);
        $event->user->notify(new UserWelcomeNotification($resetPasswordLink));
    }
}
