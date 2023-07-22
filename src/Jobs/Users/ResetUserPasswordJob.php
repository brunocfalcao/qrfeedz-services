<?php

namespace QRFeedz\Services\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use QRFeedz\Cube\Models\User;

class ResetUserPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user->withoutRelations();
    }

    public function handle(): void
    {
        $resetLink = $this->user->getPasswordResetLink(true, false);
        $user->notify(new UserWelcomeNotification($resetLink));
    }
}
