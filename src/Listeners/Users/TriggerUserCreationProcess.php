<?php

namespace QRFeedz\Services\Listeners\Users;

use Illuminate\Contracts\Queue\ShouldQueue;
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
        /**
         * Trigger notification to the user, welcoming him/her to QRFeedz.
         */
        $event->user->notify(new NotifyUserWelcome());
    }
}
