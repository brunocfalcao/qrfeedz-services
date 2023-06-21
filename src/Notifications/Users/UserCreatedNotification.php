<?php

namespace Eduka\Services\Notifications\Courses;

class UserCreatedNotification extends QRFeedzNotification
{
    public function toMail($notifiable)
    {
        dd($notifiable);

        return (new CourseSavedMail($notifiable))
                ->to($notifiable->user->email);
    }
}
