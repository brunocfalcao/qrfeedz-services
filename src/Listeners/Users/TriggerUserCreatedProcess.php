<?php

namespace QRFeedz\Services\Listeners\Users;

use Illuminate\Contracts\Queue\ShouldQueue;
use QRFeedz\Cube\Events\Users\UserCreated;

class TriggerUserCreatedProcess implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(UserCreated $event)
    {
        dd($event);

        /**
         * Send email notification about the course that was saved (created/updated).
         * In case we have a course_id, then we also mention the course data.
         */
        $event->course->notify(new CourseSavedNotification());
    }
}
