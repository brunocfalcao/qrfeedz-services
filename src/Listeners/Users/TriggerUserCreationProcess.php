<?php

namespace QRFeedz\Services\Listeners\Users;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Password;
use QRFeedz\Cube\Events\Users\UserCreated;
use QRFeedz\Services\Notifications\Users\NotifyUserWelcome;

class TriggerUserCreationProcess implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(UserCreated $event)
    {

        /** ---------- USER CREATION WORKFLOW ----------
         *
         * 1. Create a password reset link.
         * 2. Send a notification email.
         **/
        $user = $event->user;

        $link = $user->passwordReset();

        $token = Password::getRepository()->create($user);
        $resetLink = route('password.reset', ['token' => $token]);

        dd($resetLink);

        $user->notify(new NotifyUserWelcome());
    }
}
