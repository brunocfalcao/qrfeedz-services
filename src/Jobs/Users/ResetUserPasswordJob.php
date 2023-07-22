<?php

namespace QRFeedz\Services\Jobs\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use QRFeedz\Cube\Models\User;
use QRFeedz\Services\Mail\Users\PasswordResetMail;

class ResetUserPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function handle(): void
    {
        $user = User::find($this->userId);
        $resetLink = $user->getPasswordResetLink(true, false);

        Mail::to($user)
            ->send(new PasswordResetMail($user));
    }
}
